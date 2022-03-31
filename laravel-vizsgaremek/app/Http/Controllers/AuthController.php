<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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
}
