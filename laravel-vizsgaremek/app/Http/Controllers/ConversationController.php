<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConversationStoreRequest;
use App\Http\Resources\ConversationBuysResource;
use App\Http\Resources\ConversationSalesResource;
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
        $validated = $request->validated();
        $conversation = Conversation::create($validated);
        return new ConversatoinResource($conversation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conversation = Conversation::findOrFail($id);
        return new ConversationResource($conversation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validated();
        $conversation = Conversation::findOrFail($id);
        $conversation->update($validated);
        return new ConversationResource($conversation);
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
