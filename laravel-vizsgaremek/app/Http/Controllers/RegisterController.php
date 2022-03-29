<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }

    public function store(RegisterStoreRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if(is_null($data['profile_picture'])){
            $data['profile_picture'] = Storage::url('profile_pictures/placeholder.jpg');
        }
        else{
            $data['profile_picture'] = $data['profile_picture']->store('profile_pictures');
        }
    }
}
