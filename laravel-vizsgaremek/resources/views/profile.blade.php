@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container py-5">
        <div class="row" style="background: #718096">
            <div class="col-sm-12 col-md-3" style="background: red">
                <img src="{{asset("img/f.png")}}" alt="" class="mx-auto my-3 d-block img-fluid" style="border-radius: 50%">
                <p class="text-center fs-3">User</p>
            </div>
            <div class="col-sm-12 col-md-9 py-3">
                <p class="text-break">asdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasdaasdasdasda</p>
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