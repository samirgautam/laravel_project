@extends('layouts.app')
@section('content') 
@if(Session::has("success"))
    <div class="alert alert-success">
      {{Session::get("success")}}
    </div>
 @endif


@if(\App\Models\Cart::getCartCount() >0)
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
        <td>
          <a href="{{route('cart.decreaseQuantity',$cart_item->id)}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square-fill" viewBox="0 0 16 16">
              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm2.5 7.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1z"/>
            </svg>
            </a>
            {{$cart_item->quantity}}
          <a href="{{route('cart.increaseQuantity',$cart_item->id)}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg>
            </a> </td>
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
  <div class="row">
    <div class="column">
      
    </div>
  </div>
  <h4>Final Amount: {{ $cart_items->sum('net_amount') }}</h4>


@else
  <h4>No Products in Cart</h4>

@endif

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