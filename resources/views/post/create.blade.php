@extends('layout')
@section('title')
add Post 
@endsection('title')
@section('content')

<form action="/post" method="post">
{{csrf_field()}}
<textarea name="content" cols="30" rows="10" placeholder="what's on your mind?" required ></textarea>
<br>
<input type="submit" value="Create Post">
</form>
@endsection('content')