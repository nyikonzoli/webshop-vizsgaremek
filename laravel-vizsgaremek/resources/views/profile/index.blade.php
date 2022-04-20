@extends('layouts.main')

@section('header')
    <link rel="stylesheet" href="{{ asset("css/profile.css") }}">
@endsection

@section('title', $title)

@section('content')
    <div class="container-fluid py-3 col-lg-10 mx-auto">
        {{-- Profil header --}}
        <div class="row">
            <div class="col-9 mx-auto" id="header">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <img src="{{ $pfp }}" alt="" class="mx-auto my-3 d-block img-fluid" id="pfp">
                        <h3 class="text-center">{{ $user->name }}</h3>
                    </div>
                    <div class="col-sm-12 col-lg-8 py-3 d-flex flex-column align-items-start">
                        <h3 class="sm-text-center">About {{ $user->name }}</h3>
                        <p class="text-break mb-4">{{ $user->getDescription() }}</p>
                        <p class="mb-4">{{ $products->count() }} products listed</p>
                        <p>TODO rating</p>
                        @can('view-dashboard_settings', $user->id)
                            <a class="btn btn-success mt-auto" href="{{ route('profile.dashboard', ['id' => $user->id]) }}" role="button">Dashboard</a>
                            <a class="btn btn-success mt-auto" href="{{ route('settings.index') }}" role="button">Settings</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        {{-- Termekek --}}
        @foreach($products as $p)
            <div class="row">
                <div class="col-9 my-4 mx-auto">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-lg-3">
                                <img src="{{ asset($p->images->first()->imageURI) }}" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 280px;">
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body" style="height: 100%;">
                                    <div class="row" style="height: 100%;">
                                        <div class="col-10 d-flex flex-column align-items-start" style="height: 100%">
                                            <h4 class="card-title">{{ $p->name }}</h4>
                                            <p class="card-text">{{ $p->getDescription() }}</p>
                                            <p class="card-text">Size: {{ $p->getSize() }}</p>
                                            @auth
                                                @can('edit-product', $p)
                                                    <button type="button" class="btn btn-success mt-auto" data-bs-toggle="modal" data-bs-target="#editModal_{{ $p->id }}">Edit product</button>
                                                @else
                                                    <button type="button" class="btn btn-success mt-auto" onclick="contactSeller({{ $user->id }}, {{ $p->id }})">Contact seller</button>
                                                @endcan
                                            @else
                                                <button type="button" class="btn btn-success mt-auto" onclick="contactSeller({{ $user->id }}, {{ $p->id }})" disabled>Contact seller</button>
                                            @endauth
                                        </div>
                                        <div class="col-2 d-flex align-items-end flex-column justify-content-end">
                                            <div class="fs-5">{{ $p->price }}$</div>
                                        </div>
                                    </div>
                                </div>
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
        @endforeach

    </div>
@endsection

@section('script')
    <script>
        function contactSeller(userId, productId){
            data = {
                sellerId: userId,
                productId: productId,
            }
            axios.post("{{ route('conversation.store') }}", data).then(function (response){
                console.log(response);
            });
        }
    </script>
@endsection