@extends('layouts.main')

@section('title', 'Your messages')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
@endsection

@section('content')

    <div id="stuff" class="col-lg-6 mx-auto">
        <div class="conversation-container">
            <h1>Messages</h1>
            <div class="conversation-buttons">
                <button class="conv-button" onclick="showConversations('sales')" id="sales-button"><b>Sales</b></button>
                <button class="conv-button conv-button-active" onclick="showConversations('buys')" id="buys-button"><b>Purchases</b></button>
            </div>
            <div id="conversations"></div>
        </div>
        <div class="messages-container">
            <div id="messages"></div>
            <div>
                <div class="mb-3 send">
                    <input type="text" id="messageInput" class="form-control" placeholder="Type your message...">
                    <button class="btn btn-primary send-button" id="sendMessage" onclick="sendMessage()">Send</button>
                </div>
               
            </div>
        </div>
    </div>


@endsection

@section('templates')
    <template id="conversationTemplate">
        <div class="conversation">
            <img id="user-image">
            <div>
                <h5></h5>
                <p></p>
            </div>
            <img id="product-image">
        </div>
    </template>

    <template id="messageTemplate">
        <div class="message-wrapper">
            <div class="message">
                <p class="message-content"></p>
            </div>
        </div>
    </template>
@endsection

@section('script')
    <script>
        currentConversationId = 0;

        async function getConversations(route){
            if(route == "sales") {
                document.getElementById('buys-button').classList.remove('conv-button-active');
                document.getElementById('sales-button').classList.add('conv-button-active');
                return await fetch('{{ route("conversation.sales") }}').then(response => response.json());
            }
            else if(route == "buys") {
                document.getElementById('buys-button').classList.add('conv-button-active');
                document.getElementById('sales-button').classList.remove('conv-button-active');
                return await fetch('{{ route("conversation.buys") }}').then(response => response.json());
            }
        }

        async function showConversations(route){
            div = document.getElementById('conversations');
            div.innerHTML = "";
            template = document.getElementById("conversationTemplate");
            conversations = await getConversations(route);
            conversations.forEach(conversation => {
                clone = template.content.cloneNode(true);
                clone.querySelector("div>img#user-image").src = conversation["partnerProfilepictureURI"];
                clone.querySelector("div>div>h5").innerHTML = conversation["partnerName"];
                clone.querySelector("div>div>p").innerHTML = conversation["productName"];
                clone.querySelector("div>img#product-image").src = conversation["productPictureURI"];
                clone.querySelector("div").id = conversation["id"];
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
            clone.querySelector('div>div>p').innerHTML = data["content"];
            if(data["userId"] == {{ \Illuminate\Support\Facades\Auth::user()->id }}) clone.querySelector('div').classList.add("own");
            else clone.querySelector('div').classList.add("partner");
            div.appendChild(clone);
        }

        async function loadChatOnLoad(){
            await showConversations("buys");
            id = document.getElementById("conversations").querySelectorAll("div")[0].id;
            openChat(id);
        }

        window.onload = function() {
            loadChatOnLoad();
        }
    </script>
@endsection