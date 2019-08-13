
@extends('layouts.admin')
@section('content')
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Mail Sent Successfully</strong>
      {{Session::get("message", '')}}
          </div>
        @endif
    <h1 class="text text-center">Send Mail</h1>
   
    <form action="{{url('mail/store')}}" method="post">
        @csrf
    <div class="form-group">
        <label for="email_id">Email Id</label>
    <input type="email" name="email_id" class="form-control" placeholder="Enter Email Id" value="{{old('email_id')}}">
    <div> {{$errors->first('email_id')}}</div>
    </div>
    <div class="form-group">
            <label for="subject">Subject</label>
    <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="{{old('subject')}}">
    </div>
    <div> {{$errors->first('subject')}}</div>
  
    <div class="form-group">
            <label for="message">Message</label>
    <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Enter Message Here" value="{{old('message')}}"></textarea>
    <div> {{$errors->first('message')}}</div>
</div>
        
    <input type="submit" name="submit" value="Send Mail" class="btn btn-primary">
</form>
@endsection