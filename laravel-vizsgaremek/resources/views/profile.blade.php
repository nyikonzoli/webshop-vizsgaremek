<?php
    $user = \Illuminate\Support\Facades\Auth::user();
?>
@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container py-5">
        <div class="row" id="header">
            <div class="col-sm-12 col-md-3">
                {{-- <img src="{{ $user->getProfilePictureURI() }}" alt="" class="mx-auto my-3 d-block img-fluid" style="border-radius: 50%"> --}}
                <img src="{{ asset("img/f.png") }}" alt="" class="mx-auto my-3 d-block img-fluid" id="pfp">
                <h3 class="text-center">User</h3>
            </div>
            <div class="col-sm-12 col-md-9 py-3">
                <h3>About User</h3>
{{--                <form>--}}
{{--                    <textarea name="" id="" style="height: 100%;" class="form-control" disabled readonly>asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda--}}
{{--                    </textarea>--}}
{{--                </form>--}}
                <p class="text-break">

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec suscipit erat, nec fermentum nisl. Etiam leo lorem, condimentum vitae pretium vitae, vestibulum sit amet sem. Nulla auctor convallis congue. Praesent sollicitudin felis nisi, non consectetur eros iaculis ut. Duis et nisl sed augue lacinia porttitor. Duis quis maximus diam. In massa purus, fringilla vehicula quam vel, tempor faucibus enim. Sed quis pharetra sapien. Nunc et nibh cursus, viverra justo vitae, iaculis lorem. Sed nunc. </p>
                <div class="row my-3">
                    <div class="col-12 col-md-3"><p>27 products listed</p></div>
                    <div class="col-12 col-md-3"><p>12 products sold</p></div>
                </div>
                <p>718 likes<br>4,3</p>
            </div>
        </div>
        <div class="row" style="background: rgba(51,36,199,0.44)">


            <div class="col-9 my-4 mx-auto">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-3 y-2">
                            {{--<span style="background-image: url('{{asset("img/f.png")}}'); background-size: contain; display: block; width: 20px; height: 20px"></span>--}}
                            <img src="{{asset("img/f.png")}}" alt="" class="img-fluid" style="object-fit: cover;">
                            {{--Intervention io--}}
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                    <div class="col-2 d-flex align-items-end flex-column align-content-between">
                                        <div class="fs-5">7 Likes</div>
                                        <div class="fs-5 mb-0">149.99$</div>
                                    </div>
                                </div></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection