<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }

    public function store(RegisterStoreRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if(!isset($data['profile_picture']) || is_null($data['profile_picture'])){
            $data['profilePictureURI'] = url('/profile_pictures/placeholder.jpg');
        }
        else{
            $data['profilePictureURI'] = $data['profile_picture']->store('profile_pictures');
        }
        User::create($data);
        return back();
    }
}
