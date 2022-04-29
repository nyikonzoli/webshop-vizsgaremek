@extends('layouts.main')

@section('title', 'Registration')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="col-lg-5 col-md-8 col-sm-10 col-10 mx-auto" id="wrapper">
        <div>
            <h3>Register</h3>
            <div>
                @if($errors->any)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger my-1">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            </div>
            {{ Form::open(['route' => 'register.store', 'files' => true]) }}
                <div class="mb-3">
                    <div style="display: inline">
                        {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
                        <span style="color: #f85149; margin-left: -4px">*</span>
                    </div>
                    {{ Form::text('name', '', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    <div style="display: inline">
                        {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                        <span style="color: #f85149; margin-left: -4px">*</span>
                    </div>
                    {{ Form::email('email', '', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                     <div style="display: inline">
                        {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
                        <span style="color: #f85149; margin-left: -4px">*</span>
                    </div>
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                     <div style="display: inline">
                        {{ Form::label('password_confirmation', 'Password confirmation', ['class' => 'form-label']) }}
                        <span style="color: #f85149; margin-left: -4px">*</span>
                    </div>
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    <div style="display: inline">
                        {{ Form::label('birthdate', 'Birthdate', ['class' => 'form-label']) }}
                        <span style="color: #f85149; margin-left: -4px">*</span>
                    </div>
                    {{ Form::date('birthdate', '',['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('profile_picture', 'Profile picture', ['class' => 'form-label']) }}
                    <div id="input-wrapper">
                        <p class="input-text">Drag your profile picture here or click in this area. Max 2MB!</p>
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
    </div>
@endsection