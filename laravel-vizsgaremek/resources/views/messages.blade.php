@extends('layouts.main')

@section('title', 'Your messages')

@section('content')
    <h1>Messages</h1>
    <button class="btn btn-primary" onclick="sales()">Sales</button>
    <button class="btn btn-primary" onclick="buys()">Buys</button>
    <div id="conversations">

    </div>

    <script>
        async function sales(){
            div = document.getElementById('conversations');
            div.innerHTML = "";
            conversations = await fetch('{{ route("conversation.sales") }}').then(response => response.json());
            conversations.forEach(conversation => {
                img = document.createElement('img');
                img.src = conversation["partnerProfilepictureURI"];
                h3 = document.createElement('h3');
                h3.innerHTML = conversation["partnerName"];
                div.appendChild(img);
                div.appendChild(h3);
            });
        }

        async function buys(){
            div = document.getElementById('conversations');
            div.innerHTML = "";
            conversations = await fetch('{{ route("conversation.buys") }}').then(response => response.json());
            conversations.forEach(conversation => {
                img = document.createElement('img');
                img.src = conversation["partnerProfilepictureURI"];
                h3 = document.createElement('h3');
                h3.innerHTML = conversation["partnerName"];
                div.appendChild(img);
                div.appendChild(h3);
            });
        }
    </script>
@endsection