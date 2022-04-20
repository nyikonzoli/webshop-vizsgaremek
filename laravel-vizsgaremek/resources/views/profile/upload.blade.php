@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Termék feltöltése</h1>
                {{ Form::open(['files' => true]) }}
                <div class="mb-3">
                    {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
                    {{ Form::text('name', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('pictures', 'Pictures', ['class' => 'form-label']) }}
                    {{ Form::file('pictures', ['class' => 'form-control', 'multiple' => true]) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                    {{ Form::textarea('description', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('category', 'Category', ['class' => 'form-label']) }}
                    {{ Form::select('category', ['class' => 'form-select'], null, ['placeholder' => 'Select a category'])}}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection