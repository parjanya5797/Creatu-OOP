@extends('layouts.admin')
@section('content')
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible">
      <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Data Inserted Successfully</strong>
{{Session::get("message", '')}}
    </div>
    @elseif(Session::has('updatesuccess'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Data Updated Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @elseif(Session::has('deletesuccess'))
      <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Deleted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
  @endif
    <h1 class="text text-center">View Products</h1>
    <a href="{{url('product/create')}}"><button class="btn btn-primary">Add Product</button></a>
    <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
                <tr>
                <th>{{$product->id}}</th>
                <td>{{$product->product_name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                <a href="{{url('/edit/'.$product->id)}}"><button class="btn btn-primary">Edit</button></a>
                </td>
                <td>
              <form action="{{url('/delete/'.$product->id)}}" method="get">
                  {{-- @method('DELETE') --}}
                  @csrf
                <a href="{{url('/delete/'.$product->id)}}"><button class="btn btn-danger">Delete</button></a>
              </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection