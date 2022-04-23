@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Termék feltöltése</h1>
                {{ Form::open(['route' => "product.upload", 'files' => true]) }}
                <div class="mb-3">
                    {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('pictures', 'Pictures', ['class' => 'form-label']) }}
                    {{ Form::file('pictures', ['class' => 'form-control', 'required' => true, 'multiple' => true]) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('category', 'Category', ['class' => 'form-label']) }}
                    {{ Form::select('category', [], null, ['placeholder' => 'Select a category', 'class' => 'form-select', 'required' => true])}}
                </div>
                <div class="mb-3">
                    {{ Form::submit('Upload', ['class' => 'btn btn-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        "use strict"

        fetch("{{route('category.index')}}")
        .then(response => response.json())
        .then(data => {
            let out = ""
            for (let i = 0; i < data.length; ++i) {
                out += `
                    <option value="${data[i].id}">${data[i].name}</option>
                `
            }
            document.querySelector("#category").innerHTML += out
        })
    </script>
@endsection