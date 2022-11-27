  @extends('layouts.app')
  @section('content')
 
<div class="container">
@if(Session::has("success"))
    <div class="alert alert-success">
      {{Session::get("success")}}
    </div>
 @endif

<div class="card card-body border-0 shadow mb-3">
  
  <h5>List of Products</h5>

<a href="{{route('product.create')}}" class="btn btn-primary w-25 ms-auto mb-5">Insert Product</a>

  <table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Product Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Rate</th>
        <th scope="col">Discount</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
      @php
          $i =0;
      @endphp
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td>{{$product->pName}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->rate}}</td>
        <td>{{$product->discount}}</td>
        <td class="d-flex justify-content-around">
          <form action="{{route('product.edit',$product->id)}}">
            @csrf
            <td> <button type="submit" class="btn btn-info" >Edit</button></td>
          </form>
  
          <form method="POST" action="{{route('product.delete',$product->id)}}">
            @csrf
            <td><button type="submit" class="btn btn-danger">Delete</button></td>
          </form>
  
        </td>
       

      
        
      </tr>
      @endforeach
    </tbody>

</div>
  </div>






  @endsection
