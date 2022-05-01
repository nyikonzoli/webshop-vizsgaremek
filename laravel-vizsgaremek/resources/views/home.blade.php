@extends('layouts.main')

@section('title', $title)

@section('header')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        @foreach($products->where('sold', false) as $p)
            <div class="row" id="product_{{ $p->id }}">
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
                                                            @if($p->iced)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-snow ms-3 me-1 text-info" viewBox="0 0 16 16">
                                                                    <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 1 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 1 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-3.4-1.963v3.927l1.353 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
                                                                </svg>
                                                                <p class="my-auto">Product frozen</p>
                                                            @endif
                                                        @else
                                                            @if($p->iced)
                                                                <button type="button" class="btn btn-success" disabled>Contact seller</button>
                                                                <button type="button" class="btn btn-success ms-3" disabled>Buy product</button>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-snow ms-3 me-1 text-info" viewBox="0 0 16 16">
                                                                    <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 1 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 1 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-3.4-1.963v3.927l1.353 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
                                                                </svg>
                                                                <p class="my-auto">Product frozen</p>
                                                            @else
                                                                <button type="button" class="btn btn-success" onclick="contactSeller({{ $p->user->id }}, {{ $p->id }})">Contact seller</button>
                                                                <button type="button" class="btn btn-success ms-3" onclick="buyProduct({{ $p->id }}, {{ \Illuminate\Support\Facades\Auth::id() }}, {{ $p->user->id }})">Buy product</button>
                                                            @endif
                                                        @endcan
                                                    @else
                                                        <button type="button" class="btn btn-success" disabled>Contact seller</button>
                                                        <button type="button" class="btn btn-success ms-3" disabled>Buy product</button>
                                                        @if($p->iced)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-snow ms-3 me-1 text-info" viewBox="0 0 16 16">
                                                                <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 1 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 1 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-3.4-1.963v3.927l1.353 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
                                                            </svg>
                                                            <p class="my-auto">Product frozen</p>
                                                        @endif
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 d-flex align-items-end flex-column justify-content-end">
                                            @can('user-privileges', \Illuminate\Support\Facades\Auth::id())
                                                @if($p->user->id != \Illuminate\Support\Facades\Auth::id())
                                                    <button class="product-report mb-auto" title="Report" onclick="report('{{ $p->id }}');"><i class="fa fa-flag-o"></i><i class="fa fa-flag"></i></button>
                                                @endif
                                            @endcan
                                            <div class="fs-5">${{ $p->price }} USD</div>
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
                                {{ Form::open(['route' => ['product.edit', 'product' => $p], 'novalidate', 'files', 'id' => 'editForm', 'class' => 'needs-validation', 'enctype' => 'multipart/form-data']) }}
                                <div class="modal-body">
                                    <div class="mb-3">
                                        {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
                                        {{ Form::text('name', $p->name, ['class' => 'form-control', 'required' => true]) }}
                                        <div class="invalid-feedback">
                                            Please provide a name.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        {{ Form::label('images[]', 'Pictures (please select all the images you would like to upload)', ['class' => 'form-label']) }}
                                        {{ Form::file('images[]', ['class' => 'form-control', 'required' => true, 'multiple' => true]) }}
                                        <div class="invalid-feedback">
                                            Please upload at least one picture.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                                        {{ Form::textarea('description', $p->description, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="mb-3">
                                        {{ Form::label('size', 'Size', ['class' => 'form-label']) }}
                                        {{ Form::text('size', $p->size, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="mb-3">
                                        {{ Form::label('category', 'Category', ['class' => 'form-label']) }}
                                        {{ Form::select('category', $categories, $p->categoryId, ['class' => 'form-select', 'required' => true])}}
                                        <div class="invalid-feedback">
                                            Please select a category.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        {{ Form::label('price', 'Price (in USD)', ['class' => 'form-label ']) }}
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            {{ Form::text('price', null, ['class' => 'form-control', 'required' => true, 'aria-describedby' => "usd"]) }}
                                            <div class="invalid-feedback">
                                                Please provide a price in USD.
                                            </div>
                                        </div>
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

        async function buyProduct(productId, buyerId, sellerId){
            var product = document.getElementById(`product_${productId}`)
            product.style.filter = 'grayscale(80%)'
            product.querySelectorAll('button').forEach(b => b.setAttribute('disabled', true))

            await axios.patch("{{ route('product.buy') }}", {
                id: productId,
            })
            .then(function (response) {
                console.log(response)
            })

            await axios.post("{{ route('review.store') }}", {
                buyerId: buyerId,
                sellerId: sellerId,
            })
            .then(function (response) {
                console.log(response)
            })

            document.getElementById(`product_${productId}`).style.display = 'none'
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

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    </script>
@endsection