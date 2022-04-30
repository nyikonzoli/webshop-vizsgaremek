<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Resources\ReviewAdminResource;

class ReviewController extends Controller
{
    public function showMade($userId){
        $reviews = Review::where('buyerId', '=', $userId)->get();
        $resources = [];
        foreach ($reviews as $review) {
            $resources[] = new ReviewAdminResource($review);
        }
        return $resources;
    }

    public function showReceived($userId){
        $reviews = Review::where('sellerId', '=', $userId)->get();
        $resources = [];
        foreach ($reviews as $review) {
            $resources[] = new ReviewAdminResource($review);
        }
        return $resources;
    }

    public function store(Request $request) {
        return Review::create([
            'sellerId' => $request['sellerId'],
            'buyerId' => $request['buyerId'],
            'content' => null,
            'rating' => null,
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'content' => 'nullable|string',
        ]);
        $review = Review::findOrFail($id);
        $review->update($data);
        return redirect()->back();
    }

    public function destroy($id){
        $review = Review::findOrFail($id);
        return $review->delete();
    }
}
