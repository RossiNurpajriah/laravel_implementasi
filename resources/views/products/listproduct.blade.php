@extends('layout.master')

@section('content')
<div class="container my-4">
    <h2>List Product</h2>
    <div class="d-flex justify-content-between my-3">
        <div>
            <button class="btn btn-primary">Lihat Profile</button>
            <a href="{{ route('products.create') }}" class="btn btn-success">Tambah Product</a>
            <button class="btn btn-warning">Import Product</button>
            <button class="btn btn-info">Export Product</button>
        </div>
        <div>
            <select id="conditionFilter" class="form-select" onchange="filterByCondition()">
                <option value="">Kondisi Barang</option>
                <option value="baru">Baru</option>
                <option value="bekas">Bekas</option>
            </select>
        </div>
    </div>

    <div class="d-flex justify-content-between my-3">
        <div>
            <label for="showEntries">Show entries</label>
            <select id="showEntries" class="form-select" style="width: auto;">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div>
            <input type="text" id="searchBarang" class="form-control" placeholder="Search barang" onkeyup="searchProduct()">
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Condition</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="productTable">
            @foreach($products as $product)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->weight }}</td>
                <td>Rp. {{ $product->price }}</td>
                <td>{{ $product->condition }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Update</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function filterByCondition() {
        const condition = document.getElementById('conditionFilter').value;
        const searchParams = new URLSearchParams(window.location.search);
        searchParams.set('condition', condition);
        window.location.search = searchParams.toString();
    }

    function searchProduct() {
        const search = document.getElementById('searchBarang').value;
        const searchParams = new URLSearchParams(window.location.search);
        searchParams.set('search', search);
        window.location.search = searchParams.toString();
    }
</script>
@endsection
