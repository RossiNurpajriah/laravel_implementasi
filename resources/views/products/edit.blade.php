@extends ('layout.master')

@section ('content')
<div class="container my-lg-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input id="image" type="file" class="form-control" name="image">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100">
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">{{ __('Price') }}</label>
                            <input id="price" type="number" class="form-control" name="price" value="{{ $product->price }}" required>
                        </div>

                        <div class="form-group">
                            <label for="stock">{{ __('Stock') }}</label>
                            <input id="stock" type="number" class="form-control" name="stock" value="{{ $product->stock }}" required>
                        </div>

                        <div class="form-group">
                            <label for="weight">{{ __('Weight') }}</label>
                            <input id="weight" type="number" class="form-control" name="weight" value="{{ $product->weight }}" required>
                        </div>

                        <div class="form-group">
                            <label for="condition">{{ __('Condition') }}</label>
                            <select id="condition" class="form-control" name="condition" required>
                                <option value="baru" {{ $product->condition == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="bekas" {{ $product->condition == 'bekas' ? 'selected' : '' }}>Bekas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control" name="description" required>{{ $product->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Product') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
