<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use App\Http\Requests\MessageStoreRequest;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    public function store(MessageStoreRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();
        Conversation::where(function ($query) use ($user){
            $query->where('sellerId', '=', $user->id)->orWhere('buyerId', '=', $user->id);
        })->where('id', '=', $data["conversationId"])->firstOrFail(); //Makes sure that the user has access to that conversation
        if($user->id !=  $data["userId"]) abort(403); //Makes sure that the user sends the message with it's own ID
        $data["date"] = date('Y-m-d H:i:s');
        $message = Message::create($data);
        return new MessageResource($message);
    }
}
