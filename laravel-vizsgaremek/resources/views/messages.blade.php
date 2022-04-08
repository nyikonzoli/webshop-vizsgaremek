@extends('layouts.main')

@section('title', 'Your messages')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
@endsection

@section('content')
    <h1>Messages</h1>
    <button class="btn btn-primary" onclick="showConversations('sales')">Sales</button>
    <button class="btn btn-primary" onclick="showConversations('buys')">Buys</button>
    <div id="conversations"></div>
    <div id="messages"></div>
    <div>
        <div class="mb-3">
            <input type="text" id="messageInput" class="form-control" placeholder="Type your message...">
        </div>
        <button class="btn btn-primary" id="sendMessage" onclick="sendMessage()">Send</button>
    </div>
@endsection

@section('templates')
    <template id="conversationTemplate">
        <div class="conversations">
            <img>
            <h5></h5>
        </div>
    </template>

    <template id="messageTemplate">
        <div class="message">
            <p class="message-content"></p>
        </div>
    </template>
@endsection

@section('script')
    <script>
        currentConversationId = 0;

        async function getConversations(route){
            if(route == "sales") return await fetch('{{ route("conversation.sales") }}').then(response => response.json());
            else if(route == "buys") return await fetch('{{ route("conversation.buys") }}').then(response => response.json());
        }

        async function showConversations(route){
            div = document.getElementById('conversations');
            div.innerHTML = "";
            template = document.getElementById("conversationTemplate");
            conversations = await getConversations(route);
            conversations.forEach(conversation => {
                clone = template.content.cloneNode(true);
                clone.querySelector("div>img").src = conversation["partnerProfilepictureURI"];
                clone.querySelector("div>h5").innerHTML = conversation["partnerName"];
                clone.querySelector('div').onclick = function() { openChat(conversation["id"]) };
                div.appendChild(clone);
            });
        }

        async function openChat(id){
            currentConversationId = id;
            url = '{{ route('conversation.show', ['id' => 'id']) }}';
            url = url.replace('id', id);
            messages = await fetch(url).then(response => response.json());
            div = document.getElementById('messages');
            div.innerHTML = "";
            messages["data"]["messages"].forEach(message => {
                addMessage(message);
            });
        }

        function sendMessage(){
            data = {
                content: document.getElementById("messageInput").value,
                conversationId: currentConversationId,
                userId: {{ \Illuminate\Support\Facades\Auth::user()->id }}
            };
            axios.post("{{ route('message.store') }}", data).then(function (response){
                addMessage(response["data"]["data"]);
            });
            document.getElementById("messageInput").value = "";
        }

        function addMessage(data){
            div = document.getElementById('messages');
            template = document.getElementById('messageTemplate')
            clone = template.content.cloneNode(true);
            clone.querySelector('div>p').innerHTML = data["content"];
            if(data["userId"] == {{ \Illuminate\Support\Facades\Auth::user()->id }}) clone.querySelector('div').classList.add("own");
            else clone.querySelector('div').classList.add("partner");
            div.appendChild(clone);
        }
    </script>
@endsection