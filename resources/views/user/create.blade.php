@extends('layout')
@section('title')
Sign Up
@endsection('title')
@section('content')
<form action="/user" method="post"><br>
@csrf
    user name:<input type="text" name="username" required><br><br><br>
    first name:<input type="text" name="firstname" required   ><br><br><br>
    last name:<input type="text" name="lastname" required><br><br><br>
    email:<input type="text" name="email" required   ><br><br><br>
    password:<input type="password" name="password" required><br><br><br>
    confirm password:<input type="password" name="password_confirmation" required  ><br><br><br>
    <input type="submit" value="Sign up"><br><br><br>
</form><br>
@include('/partial/errors')
@endsection('content')