@extends('layouts.app')

@section('content')
    <div class="button-container">
        <a href="/posts/create" class="btn btn-primary custom-button float-right">Create Posts</a>
        <h1>Posts</h1>
        @if(count($posts) > 0)
            @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width: 50%; height: 50% ;" src="/storage/images/{{$post->cover_image}}" alt="">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h4> <a href="/posts/{{$post->id}}"> {{$post->title}} </a></h4>
                        <small>Written on {{$post->created_at}}</small>
                    </div>
                </div>
            </div>
            @endforeach
            {{$posts->links()}}
        @else
            <p>No Posts</p>
        @endif
    </div>

@endsection