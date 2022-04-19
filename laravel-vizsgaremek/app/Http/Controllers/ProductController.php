<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function edit(ProductStoreRequest $request, Product $product) {
        $data = $request->validated();
        $product->update($data);
        return redirect()->back();
    }

    public function showByUserId($id){
        $user = User::findOrFail($id);
        $products = $user->products;
        $resources = [];
        foreach ($products as $product) {
            $resources[] = new ProductResource($product);
        }
        return response()->json($resources);
    }
}
