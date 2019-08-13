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
    <h1 class="text text-center">View Employee</h1>
    <a href="{{url('employee/create')}}"><button class="btn btn-primary">Add Employee</button></a>
    <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Post</th>
                <th scope="col">Phone No.</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($emp as $emp)
                <tr>
                <th>{{$emp->id}}</th>
                <td>{{$emp->name}}</td>
                <td>{{$emp->post}}</td>
                <td>{{$emp->phone_no}}</td>
                <td>{{$emp->address}}</td>
                <td><img src="{{url('/uploads/'.$emp->image)}}" alt="image"style="height: 50px; width:50px; border-radius:50%;"></td>
                <td>
                <a href="{{url('employee/edit/'.$emp->id)}}"><button class="btn btn-primary">Edit</button></a>
                </td>
                <td>
              <form action="employee/delete/{{$emp->id}}" method="get">
                  {{-- @method('DELETE') --}}
                  @csrf
                <a href="{{url('/delete/'.$emp->id)}}"><button class="btn btn-danger">Delete</button></a>
              </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection