<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class SettingsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $categories = Category::all();
        return view('settings')->with('user', $user)->with('categories', $categories);
    }
}
