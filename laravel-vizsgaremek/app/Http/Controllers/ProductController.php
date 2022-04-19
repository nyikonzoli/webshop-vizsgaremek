<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edit(ProductStoreRequest $request, Product $product) {
        $data = $request->validated();
        $product->update($data);
        return redirect()->back();
    }
}
