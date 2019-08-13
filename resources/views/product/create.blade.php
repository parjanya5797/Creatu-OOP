@extends('layouts.admin')
@section('content')
    <h1 class="text text-center">Create Product Here</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{url('/product/store')}}" method="POST">
        @csrf
    <div class="form-group">
        <label for="product_name">Product Name</label>
    <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="{{old('product_name')}}">
    </div>
    <div class="form-group">
            <label for="price">Price</label>
    <input type="number" name="price" class="form-control" placeholder="Enter Price of Product" value="{{old('price')}}">
    </div>
    <div class="form-group">
            <label for="price">Quantity</label>
    <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity of Product" value="{{old('quantity')}}">
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
@endsection