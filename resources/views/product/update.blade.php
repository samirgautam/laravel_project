
@extends('layouts.app')
@section('content')
<form method="post" class="container-fluid" action="{{route('product.save')}}">
    @csrf
    <div class="row">
      <div class="col-sm"></div>
      <div class="col-sm">
        <label for="pName"> Product Name:</label><br>
      <input value="{{$product->pName}}" name="pName" type="text" placeholder="Product Name"> <br>
    
      <label for="Quantity"> Quantity</label><br>
      <input value="{{$product->quantity}}" type="text" name="quantity" placeholder="quantity"> 
      <br>
      
      <label for="Rate"> Rate</label><br>
      <input value="{{$product->rate}}" type="text" name="rate" placeholder="Rate"> <br>
      <label for="Discount"> Discount</label><br>
      <input value="{{$product->discount}}" type="text" name="discount" placeholder="Enter Discount"> <br>
    
    <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="col-sm"></div>
    </div>
    </form>
@endsection
