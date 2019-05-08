@extends('layout')
@section('title')
edit Post 
@endsection('title')
@section('content')

<form action="/post/{{$post->id}}" method="post">
{{csrf_field()}}
{{method_field('PATCH')}}
<textarea name="content" cols="30" rows="10"  required >{{$post->content}}</textarea>
<br>
<input type="submit" value="edit Post">
</form><br><br>
<form action="/post/{{$post->id}}" method="post">
{{csrf_field()}}
{{method_field('DELETE')}}
<input type="submit" value="delete this post">
</form>
@endsection('content')