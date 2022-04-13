<?php
    $img = \Intervention\Image\Facades\Image::make("img/f.png")->fit(280);
    $img->save('img/cardf.png')
?>
@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluid py-3">
        {{-- Profil header --}}
        <div class="row">
            <div class="col-9 mx-auto" id="header">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
{{--                        <img src="{{ asset($pfp) }}" alt="" class="mx-auto my-3 d-block img-fluid" id="pfp">--}}
                        <img src="{{ asset("img/f.png") }}" alt="" class="mx-auto my-3 d-block img-fluid" id="pfp">
                        <h3 class="text-center">{{ $username }}</h3>
                    </div>
                    <div class="col-sm-12 col-lg-8 py-3">
                        <h3 class="sm-text-center">About {{ $username }}</h3>
                        {{--                <form>--}}
                        {{--                    <textarea name="" id="" style="height: 100%;" class="form-control" disabled readonly>asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda--}}
                        {{--                    </textarea>--}}
                        {{--                </form>--}}
                        <p class="text-break">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque maximus lacus lacus, dignissim pretium risus laoreet a. Curabitur tincidunt urna a dui pulvinar, ut pellentesque tortor facilisis. Vestibulum ac sodales nunc. Phasellus dignissim venenatis lacinia. Nam scelerisque ornare nibh et fusce.                         </p>
                        <div class="row my-3">
                            <div class="col-12 col-lg-3"><p>27 products listed</p></div>
                            <div class="col-12 col-lg-3"><p>12 products sold</p></div>
                        </div>
                        <p>718 likes<br>4,3 rating</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Termekek --}}
        @foreach($products as $p)
            <div class="row" style="background: rgba(51,36,199,0.44)">
                <div class="col-9 my-4 mx-auto">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-3">
                                <img src="{{ asset($p->imageConnection->first()->imageURI) }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 280px;">
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body" style="height: 100%;">
                                    <div class="row" style="height: 100%;">
                                        <div class="col-10 d-flex flex-column align-items-start" style="height: 100%">
                                            <h4 class="card-title">{{ $p->name }}</h4>
                                            <p class="card-text">{{ $p->getDescription() }}</p>
                                            <p class="card-text">Size: {{ $p->getSize() }}</p>
                                            <button type="button" class="btn btn-primary mt-auto">Contact seller</button>
                                        </div>
                                        <div class="col-2 d-flex align-items-end flex-column justify-content-between" style="max-height: 100%">
                                            <div class="fs-5">7 Likes</div>
                                            <div class="fs-5 mb-0">{{ $p->price }}$</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection