@extends('layouts.main')

@section('title', $title)

@section('header')
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-10 col-10 mx-auto" id="wrapper">
                <h3>Termék feltöltése</h3>
                {{ Form::open(['route' => "product.upload", 'novalidate', 'files', 'class' => 'needs-validation', 'enctype' => 'multipart/form-data']) }}
                <div class="mb-3">
                    {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}
                    <div class="invalid-feedback">
                        Please provide a name.
                    </div>
                </div>
                <div class="mb-3">
                    {{ Form::label('images[]', 'Pictures', ['class' => 'form-label']) }}
                    {{ Form::file('images[]', ['class' => 'form-control', 'required' => true, 'multiple' => true]) }}
                    <div class="invalid-feedback">
                        Please upload at least one picture.
                    </div>
                </div>
                <div class="mb-3">
                    {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('size', 'Size', ['class' => 'form-label']) }}
                    {{ Form::text('size', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('category', 'Category', ['class' => 'form-label']) }}
                    {{ Form::select('category', [], null, ['placeholder' => 'Select a category', 'class' => 'form-select', 'required' => true])}}
                    <div class="invalid-feedback">
                        Please select a category.
                    </div>
                </div>
                <div class="mb-3">
                    {{ Form::label('price', 'Price', ['class' => 'form-label']) }}
                    {{ Form::text('price', null, ['class' => 'form-control', 'required' => true]) }}
                    <div class="invalid-feedback">
                        Please provide a price in USD.
                    </div>
                </div>
                <div class="mb-3">
                    {{ Form::submit('Upload', ['class' => 'submit-button']) }}
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

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    </script>
@endsection