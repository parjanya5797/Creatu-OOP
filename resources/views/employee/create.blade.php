@extends('layouts.admin')
@section('content')
    <h1> <div class="text text-center">Enter Employee Information</div></h1>
    <form action="/employee/store" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="name">Employee Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Employee name">
    </div>
    <div class="form-group">
            <label for="post">Post</label>
            <input type="text" class="form-control" name="post" placeholder="Enter Post">
        </div>
    <div class="form-group">
            <label for="phone_no">Phone no</label>
            <input type="number" class="form-control" name="phone_no" placeholder="Enter Phone no.">
        </div>
    <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control"  name="address" placeholder="Enter Address">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control"  name="image">
</div>
    <input type="submit" name="submit" value="submit" class="btn btn-primary">
    </form>
@endsection