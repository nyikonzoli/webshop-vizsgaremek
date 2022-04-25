<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Product;
use App\Models\Conversation;
use App\Models\Review;

class ReportController extends Controller
{
    public function productReport($id){
        $user = auth()->user();
        $object = Product::findOrFail($id);
        return Report::create([
            "type" => "product",
            "objectId" => $object->id,
            "userId" => $user->id,
        ]);
    }

    public function conversationReport($id){
        $user = auth()->user();
        $object = Conversation::findOrFail($id);
        return Report::create([
            "type" => "conversation",
            "objectId" => $object->id,
            "userId" => $user->id,
        ]);
    }

    public function reviewReport($id){
        $user = auth()->user();
        $object = Review::findOrFail($id);
        return Report::create([
            "type" => "review",
            "objectId" => $object->id,
            "userId" => $user->id,
        ]);
    }

    public function incoming(){

    }

    public function outgoing(){
        
    }
}
