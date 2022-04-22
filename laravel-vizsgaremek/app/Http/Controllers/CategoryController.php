<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        return Category::all();
    }

    public function update(CategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        $data = $request->validated();
        $category->update($data);
        return $category;
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();
        return Category::create($data);
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'success'], 200);
    }
}
