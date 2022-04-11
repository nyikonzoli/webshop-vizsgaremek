<?php
    $img = \Intervention\Image\Facades\Image::make("img/f.png")->fit(280);
    $img->save('img/cardf.png')
?>
@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-9 mx-auto" id="header">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        {{--                <img src="{{ $user->getProfilePictureURI() }}" alt="" class="mx-auto my-3 d-block img-fluid" id="pfp">--}}
                        <img src="{{ asset("img/f.png") }}" alt="" class="mx-auto my-3 d-block img-fluid" id="pfp">
                        <h3 class="text-center">{{ $username }}</h3>
                    </div>
                    <div class="col-sm-12 col-md-8 py-3">
                        <h3 class="sm-text-center">About {{ $username }}</h3>
                        {{--                <form>--}}
                        {{--                    <textarea name="" id="" style="height: 100%;" class="form-control" disabled readonly>asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda--}}
                        {{--                    </textarea>--}}
                        {{--                </form>--}}
                        <p class="text-break">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec suscipit erat, nec fermentum nisl. Etiam leo lorem, condimentum vitae pretium vitae, vestibulum sit amet sem. Nulla auctor convallis congue. Praesent sollicitudin felis nisi, non consectetur eros iaculis ut. Duis et nisl sed augue lacinia porttitor. Duis quis maximus diam. In massa purus, fringilla vehicula quam vel, tempor faucibus enim. Sed quis pharetra sapien. Nunc et nibh cursus, viverra justo vitae, iaculis lorem. Sed nunc. </p>
                        <div class="row my-3">
                            <div class="col-12 col-md-3"><p>27 products listed</p></div>
                            <div class="col-12 col-md-3"><p>12 products sold</p></div>
                        </div>
                        <p>718 likes<br>4,3</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="background: rgba(51,36,199,0.44)">


            <div class="col-9 my-4 mx-auto">
                <div class="card" style="max-height: 280px;">
                    <div class="row g-0">
                        <div class="col-md-3">
                            {{--<span style="background-image: url('{{asset("img/f.png")}}'); background-size: contain; display: block; width: 20px; height: 20px"></span>--}}
                            <img src="{{ asset("img/cardf.png") }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 280px;">
                            {{--Intervention io--}}
                        </div>
                        <div class="col-md-9">
                            <div class="card-body" style="height: 100%; max-height: 280px;">
                                <div class="row" style="height: 100%; max-height: 280px;">
                                    <div class="col-10">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec turpis diam, porttitor facilisis sagittis eu, egestas ac erat. Ut posuere venenatis hendrerit. Donec leo risus, bibendum ac lectus vel, fringilla posuere libero. In posuere tortor sit amet lacus ornare, at dapibus massa venenatis. Nunc ultricies scelerisque felis non sodales. Nam iaculis gravida metus, sed tincidunt odio semper id. Vivamus volutpat consectetur enim sit amet aliquet. Curabitur efficitur leo tellus, eu eleifend nullam. </p>
                                    </div>
                                    <div class="col-2 d-flex align-items-end flex-column justify-content-between" style="max-height: 100%">
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