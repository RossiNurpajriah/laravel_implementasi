@extends ('layout.master')

@section('home')
<div class="container">
    <div class="row my-lg-5" style="height:600px">
        <div class="col-md-8 flex my-auto ">
            <h3 class="fw-semibold">Discover. Connect. Thirve</h3>
            <h1 class="fw-bold" style="font-size: 50px;">Transform Your Shopping Experience</h1>
                <p class="fw-semibold mt-3m text-secondary mt-3">Welcom to Amandemy Shopping,where your disires meet their perfect match.Immerse your self in a wordl of endless possibilite,curated just for you.Whether you're hunting for enique finds, everyday essentials, extraordinary gifts, we've got you covered. </p>
                <a href="{{route ('products.product')}}" class="btn btn-lg btn-info text-black fw-bold">Buy now</a>
        </div>
        <div class="col-md-4 d-flex justify-content-between align-items-center">
            <img src="https://i.pinimg.com/564x/ad/c3/54/adc3540460e71089f2d716a188f02576.jpg" class="img-fluid" alt="Gambar Shopping">
        </div>
    </div>
</div>
@endsection