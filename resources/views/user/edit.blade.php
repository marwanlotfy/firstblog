@extends('layout')
@section('title')
Edit Profile
@endsection('title')
@section('content')
<form action="/user/{{$user->id}}" method="post"><br><br><br>
@csrf
{{method_field('PATCH')}}
    user name:<input type="text" name="username" value="{{$user->username}}" required><br><br><br>
    first name:<input type="text" name="firstname" value="{{$user->firstname}}" required><br><br><br>
    Last name:<input type="text" name="lastname" value="{{$user->lastname}}" required><br><br><br>
   
    Old Password:<input type="password" name="old-password"  required><br><br><br>
    New Password:<input type="password" name="password"  required><br><br><br>
    Confirm New Password:<input type="password" name="password_confirmation"  required><br><br><br>
    <input type="submit" value="Edit Profile">
</form>
<form action="/user/{{$user->id}}" method="post">
{{csrf_field()}}
{{method_field('DELETE')}}
<input type="submit" value="Deactivate"></form>
@include('/partial/errors')
@endsection('content')