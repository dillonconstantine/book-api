@extends('layouts.app')

@section('content')
    @include('includes.message')

    <form id="delete" class="mx-auto box w-8/12" method="POST" action="{{ route('processDelete') }}">
        @csrf
        <div class="flex flex-wrap -mx-2">
            <div class="w-full px-2">
                <label for="id">
                    ID
                </label>
                <input id="id" name="id" type="text" placeholder="10" value="{{ old('id') }}" class="placeholder-gray-500 @error('delete') error-form-input @enderror">
                @error('id')
                    <p class="error-form-text">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit">
            Delete
        </button>
    </form>
@endsection
