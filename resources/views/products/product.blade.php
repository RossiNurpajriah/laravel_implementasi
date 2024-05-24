@extends ('layout.master')

@section('product')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mx-lg-5 mt-lg-4 mb-lg-3">
                <div class="rounded pt-3 pb-3">
                        <div class="row">
                                <div class="col-md-4 offset-4">
                                    <h2 class="text-center fw-bold mt-2">PRODUCTS</h2>
                                </div>
                        </div>
                        <div class="mt-3 bg-dark mx-auto rounded" style="height: 3px; width: 75px;"></div>
                        <div class="grid mx-3 mt-4">
                            <div class="row row-gap-4">
                                @foreach($products as $product)
                                <div class="col-3">
                                    <div class="card bg-white w-100">
                                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height:350px;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between my-2">
                                                <p class="card-title fw-bold my-auto" style="font-size: 24px;">{{ $product->name }}</p>
                                                <p class="my-auto rounded py-1 bg-success px-2 fw-semivold text-white">{{ $product->condition }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between my-2">
                                                <p class="my-auto rounded py-1 bg-success px-2 text-white fw-semibold" style="font-size: 16px;">{{ $product->stock }}</p>
                                                <p class="my-auto rounded py-1 bg-info px-2 fw-semibold" style="font-size: 16px;">Rp. {{ $product->price }}</p>
                                                <p class="my-auto rounded py-1 bg-secondary px-2 text-white fw-semibold" style="font-size: 16px;">{{ $product->weight }} gr</p>
                                            </div>
                                            <p style="overflow: hidden; max-width: 400px; margin: 10px auto;">{{ $product->description }}</p>
                                            <a class="btn btn-primary w-100" href="{{route('products.detailproduct', $product->id)}}">Pesan Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>
        </div>
@endsection
