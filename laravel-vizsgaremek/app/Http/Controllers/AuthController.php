<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authentication(LoginRequest $request)
    {
        $data = $request->validated();
        if (!Auth::attempt($data)){
            $request->session()->flash("danger", "Incorrect email or password!");
            return redirect()->back();
        }
        $request->session()->flash("success", "You are now logged in!");
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function adminAuthentication(AdminLoginRequest $request){
        $data = $request->validated();
        $user = User::where('email', '=', $request["email"])->first();
        if(!is_null($user) && Hash::check($request["password"], $user->password) && !is_null($user->admin)){
            $bytes = random_bytes(32);
            $token = bin2hex($bytes);
            $user->admin->token = $token;
            $user->admin->save();
            return response()->json([
                "status" => "success",
                "token" => $token,
            ]);
        } 
        else return response()->json([
            "status" => "failed",
            "token" => "",
        ]);
    }
}
