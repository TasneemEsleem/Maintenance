<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Mail\UserForgetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class AuthApiControllers extends Controller
{
    public function register(Request $request){

        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' =>  [
                'required', 'string',
                 Password::min('8')->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            'image'=>'nullable',

        ]);
        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->input('name');
            $user->user_type='customers';
            $user->email = $request->input('email');
   
            $user->password = Hash::make($request->input('password'));
            $isSaved = $user->save();
            if($isSaved){
                $role= Role::where('name','customers')->first();
                 $user->assignRole($role);
             }
            return response()->json(
             ['status'=>$isSaved,'message' => $isSaved ? 'register successfully' : 'register failed!'],
              $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,);
        }
    }
    public function login(Request $request){
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:3',
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', '=', $request->input('email'))->first();
            if (Hash::check($request->input('password'), $user->password)) {
                $token = $user->createToken('User-API');
                $user->setAttribute('token', $token->accessToken);
                return response()->json([
                    'status' => true,
                    'message' => 'Logged in successfully',
                    'object' => $user,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Wrong credentials, check password!',
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }
    public function logout(Request $request){
        $revoked = $request->user('user-api')->token()->revoke();
        return response()->json(
            ['message' => $revoked ? 'Logged out successfully' : 'Logout failed!'],
            $revoked ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );

    }
    public function changePassword(Request $request){
        $validator = Validator($request->all(), [
            'current_password' => 'required|string|current_password:user-api',
            'new_password' => ['required', 'confirmed', 
           Password::min('8')->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
       
        ]);

        if (!$validator->fails()) {
            $user = $request->user();
            $user->password = Hash::make($request->input('new_password'));
            $isSaved = $user->save();
            return response()->json([
                'status' => $isSaved,
                'message' => $isSaved ? 'Password updated successfully' : 'Password update failed!',
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function forgetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', '=', $request->input('email'))->first();
            $randomCode = random_int(1000, 9999);
            $user->verification_code = Hash::make($randomCode);
            $isSaved = $user->save();
            if($isSaved){
                Mail::to($user)->send(new UserForgetPasswordEmail($user,$randomCode));
            }
            return response()->json([
                'status' => $isSaved,
                'message' => $isSaved ? 'Code sent successfully' : 'Code sending failed!',
                'code' => $randomCode,
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email|exists:users,email',
            'code' => 'required|numeric|digits:4',
            'new_password' => ['required', 'confirmed', 
            Password::min('8')->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
        ]);

        if (!$validator->fails()) {
            $user = User::where('email', '=', $request->input('email'))->first();
            if (!is_null($user->verification_code)) {
                if (Hash::check($request->input('code'), $user->verification_code)) {
                    $user->password = Hash::make($request->input('new_password'));
                    $user->verification_code = null;
                    $isSaved = $user->save();
                    return response()->json([
                        'status' => $isSaved,
                        'message' => $isSaved ? 'Password reset successfully' : 'Password reset failed!',
                    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                }
                else {
                    return response()->json([
                        'status' => false,
                        'message' => 'verification code is not correct!',
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Reset process rejected, no verification code!',
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
