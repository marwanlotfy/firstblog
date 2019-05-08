@extends('layout')
@section('title')
Log In
@endsection('title')
@section('content')
<form action="/login" method="post"><br>
@csrf
  
    email:<input type="text" name="email" required   ><br><br><br>
    password:<input type="password" name="password" required><br><br><br>
   
    <input type="submit" value="Log In"><br><br><br>
</form><br>
@include('/partial/errors')
@endsection('content')