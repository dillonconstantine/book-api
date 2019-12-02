@extends('layouts.app')

@section('content')
    @include('includes.message')

    <form id="create" class="mx-auto box w-8/12" method="POST" action="{{ route('processCreate') }}">
        @csrf
        <div class="flex flex-wrap -mx-2">
            <div class="w-full px-2">
                <label for="title">
                    Title
                </label>
                <input id="title" name="title" type="text" placeholder="Cat Gif" value="{{ old('title') }}" class="placeholder-gray-500 @error('title') error-form-input @enderror">
                @error('title')
                    <p class="error-form-text">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full px-2">
                <label for="url">
                    Url
                </label>
                <input id="url" name="url" type="text" placeholder="http://example.com/" value="{{ old('url') }}" class="placeholder-gray-500 @error('url') error-form-input @enderror">
                @error('url')
                    <p class="error-form-text">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit">
            Create
        </button>
    </form>
@endsection
