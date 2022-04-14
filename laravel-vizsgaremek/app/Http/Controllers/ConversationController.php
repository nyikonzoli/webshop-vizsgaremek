<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConversationStoreRequest;
use App\Http\Resources\ConversationBuysResource;
use App\Http\Resources\ConversationSalesResource;
use App\Http\Resources\ConversationMessagesResource;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function messages(){
        return view('messages');
    }

    public function sales(){
        $user = auth()->user();
        $conversations = $user->salesConversations;
        $conversationsReturn = [];
        foreach ($conversations as $conversation) {
            $conversationsReturn[] = new ConversationSalesResource($conversation);
        }
        return $conversationsReturn;
    }

    public function buys(){
        $user = auth()->user();
        $conversations = $user->buysConversations;
        $conversationsReturn = [];
        foreach ($conversations as $conversation) {
            $conversationsReturn[] = new ConversationBuysResource($conversation);
        }
        return $conversationsReturn;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::all();
        $retval = [];
        foreach ($conversations as $conversation) {
            $retval[] = new ConvsersationResource($conversation);
        }
        return $retval;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConversationStoreRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        $data["buyerId"] = $user->id;
        if(Conversation::where('sellerId', '=', $data['sellerId'])
                       ->where('buyerId', '=', $data['buyerId'])
                       ->where('productId', '=', $data['productId'])
                       ->first() != null) abort(400);
        $conversation = Conversation::create($data);
        return $conversation;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $conversation = Conversation::where(function ($query) use ($user){
            $query->where('sellerId', '=', $user->id)->orWhere('buyerId', '=', $user->id);
        })->where('id', '=', $id)->firstOrFail();
        return new ConversationMessagesResource($conversation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
