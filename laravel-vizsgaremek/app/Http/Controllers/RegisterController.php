<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Category;

class RegisterController extends Controller
{
    public function show(){
        $categories = Category::all();
        return view('register')->with('categories', $categories);
    }

    public function store(RegisterStoreRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if(!is_null($data['profile_picture'])){
            $data['profilePictureURI'] = $data['profile_picture']->store('profile_pictures');
        }
        $user = User::create($data);
        foreach ($request->categories as $category) {
            $user->categories()->attach($category);
        }
        return back();
    }
}
