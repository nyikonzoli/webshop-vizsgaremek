@extends('layouts.main')

@section('title', 'Registration')

@section('content')
    <div>
        <div>
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
                    {{ Form::file('profile_picture', ['class' => 'form-control']) }}
                </div>   
                <div class="mb-3">
                    {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
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