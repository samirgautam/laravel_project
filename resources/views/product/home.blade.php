@extends('layouts.app')
@section('content') 

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
    <a href="#" class="btn btn-primary">Add To Cart</a>
      </div>
    </div>
</div>
</div>

  @endforeach
</div>
  
@endsection