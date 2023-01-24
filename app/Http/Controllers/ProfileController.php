<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
class ProfileController extends Controller
{
      public function EditProfile()
    {
        $countries =  Country::all();
$cities=City::all();
        return response()->view('cms.profile.profile_view', ['countries'=> $countries , 'cities' =>$cities]);
    }
    public function profileUpdate(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'image' => 'image|mimes:png,jpg,jpeg',
            'country_id' => 'required',
            'city_id' => 'required',
            'region' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $user = auth()->user();
            $user->name = $request->input('name');
            $user->country_id = $request->input('country_id');
            $user->city_id = $request->input('city_id');
            $user->region = $request->input('region');
            if ($request->hasFile('image')) {
                Storage::delete($user->image);
                $imagetitle =  time() . '_'. str_replace(' ','',$user->name).'.'. $request->file('image')->extension();
                if( auth('admin')->check()){
                    $request->file('image')->storePubliclyAs('admins', $imagetitle,['disk'=>'public']);
                    $user->image = 'admins/'.$imagetitle;
                }else{
                    $request->file('image')->storePubliclyAs('users', $imagetitle,['disk'=>'public']);
                    $user->image = 'users/'.$imagetitle;
                }
            }
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? __('cms.Updated_success') : __('cms.Updated_failed')],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
}
