<?php

namespace App\Http\Controllers;

use App\Mail\AdminWelcome;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(Admin::class, 'admin');
    }
    public function index()
    {
        $admins = Admin::all();
        return response()->view('cms.admin.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return response()->view('cms.admin.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins',
            'active' => 'required | boolean',
            'role_id' => 'required|numeric|exists:roles,id',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->status = $request->input('active');
            $password = Str::random(8);
            $admin->password = Hash::make($password);

            if ($request->hasFile('image')) {
                $imagetitle =  time() . '_' . str_replace(' ', '', $admin->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('admins', $imagetitle, ['disk' => 'public']);
                $admin->image = 'admins/' . $imagetitle;
            }

            $isSaved = $admin->save();

            if ($isSaved) {
                $admin->syncRoles(Role::findById($request->get('role_id')));
                Mail::to([$admin])->send(new AdminWelcome($admin, $password));
            }
            return response()->json(
                ['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return response()->view('cms.admin.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'active' => 'required|boolean',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {

            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->status = $request->input('active');


            if ($request->hasFile('image')) {
                Storage::delete($admin->image);
                $imagetitle =  time() . '_' . str_replace(' ', '', $admin->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('admins', $imagetitle, ['disk' => 'public']);
                $admin->image = 'admins/' . $imagetitle;
            }
            $isSaved = $admin->save();
            if ($isSaved) {
                $admin->syncRoles(Role::findById($request->get('role_id')));
            }
            return response()->json(
                ['message' => $isSaved ? __('cms.Updated_success') : __('cms.Updated_failed')],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if (!auth('admin')->user()->id != $admin->id) {
            $deleted = $admin->delete();
            if ($deleted) {
                Storage::delete($admin->image);
            }
            return response()->json(
                ['message' => $deleted ? __('cms.Deleted_successfully') : __('cms.Delete_failed!')],
                $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => 'You Can\'t Delete Your Self '],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
