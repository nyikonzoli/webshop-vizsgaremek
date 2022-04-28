@extends('layouts.main')

@section('title', $title)

@section('header')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="container-fluid py-3 col-lg-10 mx-auto">
        {{-- Profile header --}}
        <div class="row">
            <div class="col-9 mx-auto" id="header">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <img src="{{ asset($pfp) }}" alt="" class="mx-auto my-3 d-block img-fluid" id="pfp">
                        <h3 class="text-center">{{ $user->name }}</h3>
                    </div>
                    <div class="col-sm-12 col-lg-8 py-3 d-flex flex-column align-items-start">
                        <div class="row">
                            <div class="col">
                                <h3 class="sm-text-center">About {{ $user->name }}</h3>
                                <p class="text-break mb-4">{{ $user->getDescription() }}</p>
                                <p class="mb-4">{{ $products->count() }} products listed</p>
                                <p>TODO rating</p>
                            </div>
                        </div>
                        @can('user-views', $user->id)
                        <div class="row my-auto">
                            <div class="col">
                                <a class="btn btn-success" href="{{ route('profile.dashboard', ['id' => $user->id]) }}" role="button">Dashboard</a>
                                <a class="btn btn-success ms-3" href="{{ route('settings.index') }}" role="button">Settings</a>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        <div id="section-select-buttons" class="col-9">
            <button class="section-select section-select-active" onclick="products();" id="profile-products-button"><b>Products for sale</b></button>
            <button class="section-select" onclick="reviews();" id="profile-reviews-button"><b>Reviews</b></button>
        </div>
        {{-- Reviews --}}
        <div class="row" id="profile-reviews">
            <div class="col">
                @foreach($user->reviewsSellerConnection as $r)
                    <div class="row">
                        <div class="col-9 mt-4 mx-auto testreview" style="margin: 5px; border: 2px solid seagreen; border-radius: 20px;">
                            <div class="row">
                                <div class="col-12 my-2 d-flex justify-content-between">
                                    <h4>{{ $r->buyerConnection->name }}</h4>
                                    <div class="d-flex align-items-center">
                                        {{ $r->rating }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill align-self-center ms-1" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    </div>
                                </div>
                                @if(!is_null($r->content))
                                <div class="col-12 mb-2">
                                    {{ $r->content }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Products --}}
        <div class="row" id="profile-products">
            <div class="col">
                @foreach($products as $p)
                    <div class="row">
                        <div class="col-9 mt-4 mx-auto">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-lg-3" style="overflow: hidden">
                                        <a href="{{ asset($p->images->first()->imageURI) }}" data-lightbox="imageset{{ $p->id }}" >
                                            <img src="{{ asset($p->images->first()->imageURI) }}" alt="" class="img-fluid product-image" style="object-fit: cover; width: 100%; height: 280px;">
                                        </a>
                                        @for($i = 1; $i < $p->images->count(); ++$i)
                                        <a href="{{ asset($p->images[$i]->imageURI) }}" data-lightbox="imageset{{ $p->id }}">
                                            <img src="{{ asset($p->images[$i]->imageURI) }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 280px; display: none">
                                        </a>
                                        @endfor
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="card-body" style="height: 100%;">
                                            <div class="row" style="height: 100%;">
                                                <div class="col-10 d-flex flex-column justify-content-between" style="height: 100%">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4 class="card-title">{{ $p->name }}</h4>
                                                            <p class="card-text">{{ $p->getDescription() }}</p>
                                                            @if(!is_null($p->size))
                                                                <p class="card-text">Size: {{ $p->size }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col d-flex align-items-center">
                                                            @auth
                                                                @can('edit-product', $p)
                                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal_{{ $p->id }}">Edit product</button>
                                                                @else
                                                                    @if($p->iced)
                                                                        <button type="button" class="btn btn-success" onclick="contactSeller({{ $user->id }}, {{ $p->id }})" disabled>Contact seller</button>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-snow ms-3 me-1 text-info" viewBox="0 0 16 16">
                                                                            <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 1 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 1 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-3.4-1.963v3.927l1.353 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
                                                                        </svg>
                                                                        <p>Product frozen</p>
                                                                    @else
                                                                        <button type="button" class="btn btn-success" onclick="contactSeller({{ $user->id }}, {{ $p->id }})">Contact seller</button>
                                                                    @endif
                                                                @endcan
                                                            @else
                                                                <button type="button" class="btn btn-success" onclick="contactSeller({{ $user->id }}, {{ $p->id }})" disabled>Contact seller</button>
                                                                @if($p->iced)
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-snow ms-3 me-1 text-info" viewBox="0 0 16 16">
                                                                        <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 1 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 1 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-3.4-1.963v3.927l1.353 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
                                                                    </svg>
                                                                    <p>Product frozen</p>
                                                                @endif
                                                            @endauth
                                                        </div>
                                                    </div>
                                                </div>
                                                @auth
                                                    <div class="col-2 d-flex align-items-end flex-column justify-content-between">
                                                        <button class="product-report" title="Report" onclick="report('{{ $p->id }}');"><i class="fa fa-flag-o"></i><i class="fa fa-flag"></i></button>
                                                        <div class="fs-5">${{ $p->price }} USD</div>
                                                    </div>
                                                @else
                                                    <div class="col-2 d-flex align-items-end flex-column justify-content-end">
                                                        <div class="fs-5">${{ $p->price }} USD</div>
                                                    </div>
                                                @endauth

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" tabindex="-1" id="editModal_{{ $p->id }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        {{ Form::open(['route' => ['product.edit', 'product' => $p], 'id' => 'editForm']) }}
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
                                                    {{ Form::text('name', $p->name, ['class' => 'form-control']) }}
                                                </div>
                                                <div class="mb-3">
                                                    {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                                                    {{ Form::text('description', $p->description, ['class' => 'form-control']) }}
                                                </div>
                                                <div class="mb-3">
                                                    {{ Form::label('size', 'Size', ['class' => 'form-label']) }}
                                                    {{ Form::text('size', $p->size, ['class' => 'form-control']) }}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                {{ Form::submit('Save', ['class' => 'btn btn-success']) }}
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        window.onload = function() {
            document.getElementById("profile-reviews").style.display = "none";
        }

        function contactSeller(userId, productId){
            data = {
                sellerId: userId,
                productId: productId,
            }
            axios.post("{{ route('conversation.store') }}", data).then(function (response){
                console.log(response);
            });
        }
        
        function products(){
            document.getElementById("profile-products").style.display = "block";
            document.getElementById("profile-products-button").classList.add("section-select-active");
            document.getElementById("profile-reviews").style.display = "none";
            document.getElementById("profile-reviews-button").classList.remove("section-select-active");
        }

        function reviews(){
            document.getElementById("profile-products").style.display = "none";
            document.getElementById("profile-products-button").classList.remove("section-select-active");
            document.getElementById("profile-reviews").style.display = "block";
            document.getElementById("profile-reviews-button").classList.add("section-select-active");
        }

        function report(id){
            if (confirm("Are you sure that you want to report this product?") == true) {
                url = "{{ route('report.product', ['id' => '*']) }}";
                url = url.replace("*", id);
                axios.post(url).then(function (then){
                    alert('The product has been reported!')
                });
            }
        }
    </script>
@endsection