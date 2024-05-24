@extends('layout.master')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset($product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title " style="font-size: 24px;">{{ $product->name }}</h5>
                            <div class="d-flex">
                                <div>
                                    <p class="card-text my-lg-3"><strong>Stock:</strong> {{ $product->stock }}</p>
                                    <p class="card-text"><strong>Condition:</strong> {{ $product->condition }}</p>
                                </div>
                                <div class="ms-auto">
                                    <p class="card-text my-lg-3 bg-info my-auto rounded py-1 px-2"><strong>Price:</strong> Rp. {{ $product->price }}</p>
                                    <p class="card-text"><strong>Weight:</strong> {{ $product->weight }} gr</p>
                                </div>
                            </div>
                            <p class="card-text mt-4" style="margin-right: 20%;">{{ $product->description }}</p>
                            <div class="text-center"> <!-- Added text-center class -->
                                <a href="#" class="btn btn-success mt-3">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
