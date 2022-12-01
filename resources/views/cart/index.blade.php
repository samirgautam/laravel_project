@extends('layouts.app')
@section('content') 
@if(Session::has("success"))
    <div class="alert alert-success">
      {{Session::get("success")}}
    </div>
 @endif




 <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Rate</th>
      <th scope="col">Discount</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Net Amount</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i = 1;
    @endphp

    @foreach ($cart_items as $cart_item)
    <tr>
      <td>{{$i++}}</td>
      <td>{{ucfirst($cart_item->product->pName)}}</td>
      <td>{{$cart_item->quantity}}</td>
      <td>{{$cart_item->rate}}</td>
      <td>{{$cart_item->discount}}</td>
      <td>{{$cart_item->total_amount}}</td>
      <td>{{$cart_item->net_amount}}</td>
      <td>
        <form action="{{route('cart.delete',$cart_item->id)}}">
          @csrf
          <td> <button type="submit" class="btn btn-info" >Delete</button></td>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<h4>Final Amount: {{ $cart_items->sum('net_amount') }}</h4>
 {{-- <h5 class="card-title">{{ucfirst($cart_item->product->pName)}}</h5>
<div class="col-md-3" >
<div class="card-group">
    <div class="card"  >
      <img  src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top">
      <div class="card-body">
        
        <h5 class="card-title">{{ucfirst($cart_item->product->pName)}}</h5>
        <h5 class="card-title">{{ucfirst($cart_item->product->pName)}}</h5>
        {{-- <h5 class="card-title">Rs {{number_format($product->rate,2)}}</h5>
        <h5 class="card-title">Rs {{number_format($product->discount,2)}}</h5>
    {{-- <a href="{{route('cart.addToCart',$product->id)}}" class="btn btn-primary">Add To Cart</a> --}}
      {{-- </div>
    </div> --
</div>
</div> -- --}}
  
@endsection