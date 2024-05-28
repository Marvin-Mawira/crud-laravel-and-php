@extends('layouts.app')

@section('content')
    <h3>Edit Posts</h3>
    <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">
        @csrf
        @method('PUT') <!-- Use PUT method for editing -->

        <!-- Title Field -->
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $post->title) }}" >
            
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
            >{{ old('body', $post->body) }}</textarea> <!-- Use old function to retain input if validation fails, else use post body -->
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Cover Image Field -->
        <div class="form-group">
            <label for="cover_image">{{ __('Cover Image') }}</label>
            <input
                type="file"
                id="cover_image"
                name="cover_image"
                class="form-control @error('cover_image') is-invalid @enderror"
            >
            @error('cover_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">
            {{ __('Update') }} 
        </button>
    </form>
@endsection
