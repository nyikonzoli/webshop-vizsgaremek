<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $categories = [];
        foreach (Category::all() as $c) {
            $categories[$c->id] = $c->name;
        }

        return view('home', [
            'title' => 'ArtShop',
            'products' => Product::all(),
            'categories' => $categories,
        ]);
    }
}
