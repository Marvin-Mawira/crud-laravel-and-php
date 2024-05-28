@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary custom-button float-right">Go Back</a>
    <h2>{{$post->title}}</h2>
    <br>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>Written on{{$post->created_at}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-default">Edit</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="pull-right" id="delete-post-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger float-right">Delete</button>
    </form>


@endsection