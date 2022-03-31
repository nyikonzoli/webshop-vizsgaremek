@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3"></div>
            <div class="col-sm-12 col-md-9">
                <div class="col-sm-12"></div>
            </div>
        </div>
        <div class="row" style="background: black">


        <div class="col-12 my-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-3 y-2" style="background: gray">
                        {{--<span style="background-image: url('{{asset("img/f.png")}}'); background-size: contain; display: block; width: 20px; height: 20px"></span>--}}
                        <img src="{{asset("img/f.png")}}" alt="" class="img-fluid" style="object-fit: cover; height: 400px; width: 400px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
@endsection