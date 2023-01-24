<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AdminProfileConroller extends Controller
{
    public function EditProfile()
    {
        return response()->view('cms.admin.admin_profile_view');
    }
    public function profileUpdate(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {
            $user = auth()->user();
            $user->name = $request->input('name');
            if ($request->hasFile('image')) {
                //Delete admin previous image.
                Storage::delete($user->image);
                //Save new image.
                $file = $request->file('image');
                $imageName = time() . '_admin_image.' . $file->getClientOriginalExtension();
                $request->file('image')->storePubliclyAs('images/admins', $imageName);
                $imagePath = 'images/admins/' . $imageName;
                $user->image = $imagePath;
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