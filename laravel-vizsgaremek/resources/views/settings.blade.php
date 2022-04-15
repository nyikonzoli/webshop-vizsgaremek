@extends('layouts.main')

@section('title', 'Settings')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endsection

@section('content')
    <div class="wrapper col-lg-6 mx-auto">
        <div class="menu col-lg-4">

        </div>
        <div class="settings col-lg-8">
            <div id="profile-picture" class="active">
                <h2 class="title">Change your profile picture</h2>
                <div>
                    <div class="image">
                        <img src="{{ $user->getProfilePictureURI() }}" alt="" whidth="200px" height="200px">
                        <button class="delete-image">Delete</button>
                    </div>
                    <div id="form-wrapper">
                        <div class="form">
                            {{ Form::open(['route' => 'user.profile-picture.update', 'method' => 'put']) }}
                                <div id="input-wrapper">
                                    {{ Form::file('image', ['id' => 'image-upload']) }}
                                    <p>Drag your new profile picture here or click in this area.</p>
                                </div>
                                {{ Form::submit('Upload', ["id" => "submit-button"]) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection