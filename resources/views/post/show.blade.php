@extends('layout')
@section('title')
edit Post 
@endsection('title')
@section('content')
<p>created on {{$post->created_at}}</p>
<p>{{$post->content}}</p>
@foreach($post->comments as $comment)
    <div><a href="/user/{{$comment->user_id}}">{{$comment->user->username}}</a></div>
    <div>{{$comment->body}}</div>
@endforeach
    <form action="/comment/create/{{$post->id}}" method="post">{{csrf_field()}}<input type="text" name="comment" required><input type="submit" value="add Comment"></form>
    <form action="/like/{{$post->id}}" method="post">
    {{csrf_field()}}
    <input type="submit" value={{auth()->user()->like_this($post->id) ? "Dislike" : "Like" }} >{{$post->count_mylikes()}} Liked this
    </form><br><br><br>
@if(auth()->id()==$post->user_id)
<a href="/post/{{$post->id}}/edit">edit this post</a>
@endif
@endsection('content')