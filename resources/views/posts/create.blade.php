@extends('layouts.app')

@section('content')
    <h3>Create Posts</h3>
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Title Field -->
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}"
                placeholder="{{ __('Enter title') }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    
        <!-- Body Field -->
        <div class="form-group">
            <label for="message">{{ __('Body') }}</label>
            <textarea
                id="message"
                name="message"
                placeholder="{{ __('Body Text') }}"
                class="form-control @error('body') is-invalid @enderror"
            >{{ old('body') }}</textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <!-- Image Field -->
        <div class="form-group">
            <label for="cover_image">{{ __('Image') }}</label>
            <input
                type="file"
                id="cover_image"
                name="cover_image"
                class="form-control-file @error('cover_image') is-invalid @enderror"
            >
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">
            {{ __('Post') }}
        </button>
    </form>
    
    
@endsection