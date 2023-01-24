<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;
use \Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function showForgotPassword(Request $request)
    {

        $request->merge(['guard' => $request->guard]);

        $validator = Validator(['guard' => $request->guard], [
            'guard' => 'required|string|in:admin,user'
        ]);
        $request->session()->put('guard', $request->input('guard'));


        if (!$validator->fails()) {
            return response()->view('cms.auth.reset-password', ['guard' => $request->input('guard')]);
        } else {
            abort(Response::HTTP_NOT_FOUND, 'The Page Not Found');
        }
    }
    public function emailForgetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'guard' => 'required|in:admin,user|string',
        ]);
        if (!$validator->fails()) {
            if ($request->get('guard') == 'admin') {
                $email =  Admin::where('email', $request->get('email'))->first();
                $broker = 'admins';
            }elseif($request->get('guard') == 'user') {
                $email =  User::where('email', $request->get('email'))->first();
                $broker = 'users';
            }
            if (!is_null($email)) {
                $status = Password::broker($broker)->sendResetLink(
                    $request->only('email')
                );
                return $status === Password::RESET_LINK_SENT
                    ? response()->json(['message' => __($status)], Response::HTTP_OK)
                    : response()->json(['message' => __($status)], Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => 'The entered email is not registered in the system, check and try again'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(
                ["message" => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    public function showResetPassword(Request $request, $token)
    {
        return view('cms.auth.new-password', ['token' => $token, 'email' => $request->input('email')]);
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
        ]);

        if (!$validator->fails()) {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
                    $user->save();
                    event(new PasswordReset($user));
                }
            );
            return $status === Password::PASSWORD_RESET
                ? response()->json(['message' => __($status)], Response::HTTP_OK)
                : response()->json(['message' => __($status)], Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}