@extends('layouts.main')


@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col" id="productsTable">
                <div class="text-center">
                    <div class="spinner-grow text-success mt-5" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        "use strict"

        fetch('{{ route('product.indexOf', ['id' => $user->id]) }}')
        .then(response => response.json())
        .then(data => {
            console.log(data.length)
            let out = `
                <table class="table table-striped" id="productsTable">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Size</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>`

            for (let i = 0; i < data.length; ++i) {
                out += `
                    <tr>
                        <td>${data[i].name}</td>
                        <td>${data[i].price}</td>
                        <td>${data[i].size}</td>
                        <td>
                            <button type="button" class="btn btn-success">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="deleteProduct(${data[i].id})">Delete</button>
                        </td>
                    </tr>
                `
            }

            out += `</tbody></table>`

            document.querySelector("#productsTable").innerHTML = out
        })

        function deleteProduct(id) {
            axios.delete("{{route('product.destroy')}}", {
                params: {
                    id: id
                }
            })
            .then(function (response){
                console.log(response)
                window.location.replace("{{route('profile.dashboard', ['id' => \Illuminate\Support\Facades\Auth::user()->id])}}")
            })
        }
    </script>
@endsection