<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ShowByNameRequest;
use App\Http\Requests\UpdateProductByAdminRequest;
use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Product::all();
    }

    public function indexOf($id) {
        return Product::all()
            ->where('userId', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        return Product::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }

    public function updateAdmin(UpdateProductByAdminRequest $request, $id){
        $product = Product::findOrFail($id);
        $data = $request->validated();
        $product->update($data);
        $notWantedImages = Image::where('productId', '=', $product->id)->whereNotIn('id', $request["imageIds"])->delete();
        return new ProductResource($product);
    }

    public function showByName(ShowByNameRequest $request){
        $data = $request->validated();
        $products = Product::where('name', 'like', '%' . $data['name'] . '%')->get();
        $resources = [];
        foreach ($products as $product) {
            $resources[] = new ProductResource($product);
        }
        return response()->json($resources);
    }
}
