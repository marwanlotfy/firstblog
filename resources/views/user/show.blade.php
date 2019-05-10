@extends('layout')
@section('title')
add Post 
@endsection('title')
@section('content')
@if(auth()->id()==$user->id)
<a href="/user/{{$user->id}}/edit">edit profile</a>
@endif
@foreach($user->posts as $post)
<a href="/post/{{$post->id}}">
    <div class="container">
    <div><a href="/user/{{$post->user_id}}">{{$user->username}}</a></div>
    <div class="mydiv">{{$post->content}} </div>
    @foreach($post->comments as $comment)
    <div><a href="/user/{{$comment->user_id}}">{{$comment->user->username}}</a></div>
    <div>{{$comment->body}}</div>
    @endforeach
    <form action="/comment/create/{{$post->id}}" method="post">{{csrf_field()}}<input type="text" name="comment" required><input type="submit" value="add Comment"></form>
    <form action="/like/{{$post->id}}" method="post">
    {{csrf_field()}}
    <input type="submit" value={{auth()->user()->like_this($post->id) ? "DisLike" : "like" }} >{{$post->count_mylikes()}} Liked this
    </form><br>
    </div>
</a>
@endforeach
@endsection('content')