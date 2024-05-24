@extends ('layout.master')

@section ('form')
        <div class="container my-lg-5">
        <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card">
                        <div class="card-header">{{ __('Add Product') }}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"> <!-- Corrected route -->
                        @csrf

                                <div class="form-group">
                                <label for="image">{{ __('Image') }}</label>
                                <input id="image" type="file" class="form-control" name="image" required autofocus>
                                </div>

                                <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" required>
                                </div>

                                <div class="form-group">
                                <label for="price">{{ __('Price') }}</label>
                                <input id="price" type="number" class="form-control" name="price" required>
                                </div>

                                <div class="form-group">
                                <label for="stock">{{ __('Stock') }}</label>
                                <input id="stock" type="number" class="form-control" name="stock" required>
                                </div>

                                <div class="form-group">
                                <label for="weight">{{ __('Weight') }}</label>
                                <input id="weight" type="number" class="form-control" name="weight" required>
                                </div>

                                <div class="form-group">
                                <label for="condition">{{ __('Condition') }}</label>
                                <select id="condition" class="form-control" name="condition" required>
                                <option value="baru">Baru</option>
                                <option value="bekas">Bekas</option>
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea id="description" class="form-control" name="description" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary ">
                                {{ __('Add Product') }}
                                </button>
                        </form>
                        </div>
                </div>
                </div>
        </div>
        </div>
@endsection
