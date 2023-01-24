<?php

namespace App\Http\Controllers;

use App\Mail\UserWelcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Str;

class UserController extends Controller
{



    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }


    public function index()
    {
        $users = User::all();
        return response()->view('cms.users.index', ['users' => $users]);
    }
    public function create()
    {
        $roles = Role::where('guard_name', 'user')->get();

        $countries =  DB::table('countries')->get();
        return response()->view('cms.users.create', ['countries' => $countries, 'roles' => $roles]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('user_role'));
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'region' => 'required|string|min:3',
            'user_role' => 'required|numeric|exists:roles,id',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->user_type = $request->input('user_type');
            $user->country_id = $request->input('country_id');
            $user->city_id = $request->input('city_id');
            $user->region = $request->input('region');
            $password = Str::random(8);
            $user->password = Hash::make($password);
            $user->admin_id = auth()->user()->getAuthIdentifier();
            if ($request->hasFile('image')) {
                $imagetitle =  time() . '_' . str_replace(' ', '', $user->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('users', $imagetitle, ['disk' => 'public']);
                $user->image = 'users/' . $imagetitle;
            }
            $isSaved = $user->save();
            if ($isSaved) {
                $role = Role::where('id', $request->get('user_role'))->first();
                $user->assignRole($role);
                Mail::to([$user])->send(new UserWelcome($user,$password));
            }
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }
    public function edit(User $user)

    {

        $roles = Role::where('guard_name', 'user')->get();

        $countries =  DB::table('countries')->get();
        $cities = DB::table('cities')->get();
        return response()->view('cms.users.edit', ['user' => $user, 'countries' => $countries, 'cities' => $cities, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            // 'name' => 'nullable|string|min:3',
            // 'email' => 'nullable|email|unique:users,email,' ,
            // 'user_type' => 'required',
            // 'country_id' => 'required',
            // 'city_id' => 'required',
            // 'region' => 'required|string|min:3',
            // 'image' => 'nullable', 'image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->user_type = $request->input('user_type');
            $user->country_id = $request->input('country_id');
            $user->city_id = $request->input('city_id');
            $user->region = $request->input('region');
            $user->admin_id = auth()->user()->getAuthIdentifier();


            if ($request->hasFile('image')) {
                Storage::delete($user->image);
                $imagetitle =  time() . '_' . str_replace(' ', '', $user->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('users', $imagetitle, ['disk' => 'public']);
                $user->image = 'users/' . $imagetitle;
            }

            $isSaved = $user->save();
            if ($isSaved) {
                $role = Role::where('id', $request->get('user_role'))->first();
                $saved = $user->syncRoles($role);
                // $user->assignRole(Role::findById($request->get('role_id')))->first();

            }
            return response()->json(
                ['message' => $isSaved ? 'Updated Successfully' : 'Update failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function UserActive($id)
    {
        $user = User::Where('id', '=', $id)->first();

        $user->status = !$user->status;
        $user->save();
        return response()->json(
            ['message' => $user ? 'Change Status successfully' : 'Change Status failed!'],
            $user ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
    public function destroy(User $user)
    {
        $deleted = $user->delete();
        if ($deleted && $user->image != null) {
            Storage::delete($user->image);
        }
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
