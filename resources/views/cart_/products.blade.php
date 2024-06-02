@extends('cart.shop')
   
@section('content')
    
<div class="row">
    @foreach($menus as $menu)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{ $menu->gambar }}" alt="{{ $menu->nama }}" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">{{ $menu->nama }}</h4>
                    <p>{{ $menu->deskripsi }}</p>
                    <p class="card-text"><strong>Price: </strong> ${{ $menu->harga }}</p>
                    <p class="btn-holder"><a href="{{ route('addmenu.to.cart', $menu->id) }}" class="btn btn-outline-danger">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
    
@endsection