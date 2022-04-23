@extends('layouts.main')


@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table table-striped" id="productsTable">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Size</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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
            let out = ""
            for (let i = 0; i < data.length; ++i) {
                out += `
                    <tr>
                        <td>${data[i].name}</td>
                        <td>${data[i].price}</td>
                        <td>${data[i].size}</td>
                        <td>
                            <button type="button" class="btn btn-success">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                `
            }
            document.querySelector("#productsTable>tbody").innerHTML = out
        })
    </script>
@endsection