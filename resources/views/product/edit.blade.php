@extends('layouts.admin')
@section('content')
    <h1 class="text text-center">Edit Product Here</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{url('/update/'.$products['id'])}}" method="POST">
    @method("PATCH")
        @csrf
   
    <div class="form-group">
        <label for="product_name">Product Name</label>
    <input type="text" name="product_name" class="form-control" value="{{($products['product_name'])}}" placeholder="{{old('product_name')}}"> 
    </div>
    <div class="form-group">
            <label for="price">Price</label>
    <input type="number" name="price" class="form-control" value="{{($products['price'])}}" placeholder="{{old('price')}}">
    </div>
    <div class="form-group">
            <label for="price">Quantity</label>
    <input type="number" name="quantity" class="form-control" value="{{($products['quantity'])}}" placeholder="{{old('quantity')}}">
    </div>
   
<button class="btn btn-primary">Update</button>   
</form>
@endsection