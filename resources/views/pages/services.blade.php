@extends('layouts.app')

@section('content')
    <h2>{{$title}}</h2>
    @if (count($services) > 0)
        <ul class="list-group">
            @foreach ($services as $services)
                <li class="list-group-item">{{$services}}</li>   
            @endforeach
        </ul>  
    @endif
    <h2>services</h2>
    <p>welcome to providing services</p>
@endsection