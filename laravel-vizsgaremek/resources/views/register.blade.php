@extends('layouts.main')

@section('title', 'Registration')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="col-lg-5 col-md-8 col-sm-10 col-10 mx-auto" id="wrapper">
        <div>
            <h3>Register</h3>
            {{ Form::open(['route' => 'register.store', 'files' => true]) }}
                <div class="mb-3">
                    {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
                    {{ Form::text('name', '', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                    {{ Form::email('email', '', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('password_confirmation', 'Password confirmation', ['class' => 'form-label']) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('birthdate', 'Birthdate', ['class' => 'form-label']) }}
                    {{ Form::date('birthdate', '',['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('profile_picture', 'Profile picture', ['class' => 'form-label']) }}
                    <div id="input-wrapper">
                        <p class="input-text">Drag your profile picture here or click in this area.</p>
                        {{ Form::file('profile_picture', ['class' => 'form-control input']) }}
                    </div>
                </div>
                {{ Form::label('categories-div', 'Prefered categories', ['class' => 'form-label']) }}
                <div name="categories-div" id="categories-div">
                    @foreach($categories as $category)
                        <div class="category">
                            {{ Form::label('categories[' . $category->id . ']', $category->name, ['class' => 'form-label']) }}
                            {{ Form::checkbox('categories[' . $category->id . ']', $category->id) }}
                        </div>   
                    @endforeach
                </div>
                <div class="mb-3">
                    {{ Form::submit('Register', ['class' => 'submit-button']) }}
                </div>
            {{ Form::close() }}
        </div>
        <div>
            @if($errors->any)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger my-1">
                        {{$error}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection