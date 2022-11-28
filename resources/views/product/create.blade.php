@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" class="container-fluid" action="{{route('product.save')}}">
    @csrf
    <div class="row">
      <div class="col-sm"></div>
      <div class="col-sm">
        <label for="pName"> Product Name:</label><br>
      <input name="pName" type="text" placeholder="Product Name"> <br>
    
      <label for="Quantity"> Quantity</label><br>
      <input type="text" name="quantity" placeholder="Quantity"> <br>
      
      <label for="Rate"> Rate</label><br>
      <input type="text" name="rate" placeholder="Rate"> <br>
      <label for="Discount"> Discount</label><br>
      <input type="text" name="discount" placeholder="Enter Discount"> <br>
    
    <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="col-sm"></div>
    </div>
    </form>
@endsection
