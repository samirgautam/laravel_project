@extends('layouts.app')
@section('content') 
@if(Session::has("success"))
    <div class="alert alert-success">
      {{Session::get("success")}}
    </div>
 @endif

<div class="row" >
 @foreach ($products as $product)
 
<div class="col-md-3" >
<div class="card-group">
    <div class="card"  >
      <img  src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">{{ucfirst($product->pName)}}</h5>
        <h5 class="card-title">Rs {{number_format($product->rate,2)}}</h5>
        <h5 class="card-title">Rs {{number_format($product->discount,2)}}</h5>
        <form  method="get" action="{{route('cart.addToCart',$product->id)}}">
          @csrf
          <button type="submit" class="btn btn-primary">Add to Cart</button>
      </form>
     <form method="get" action="{{route('cart.buyNow',$product->id)}}">
      @csrf
      <button type="submit" class="btn btn-success">Buy Now</button>
    </form>
    {{-- <a href="{{route('cart.addToCart',$product->id)}}" class="btn btn-primary">Add To Cart</a> --}}
      </div>
    </div>
</div>
</div>

  @endforeach
</div>
  
@endsection