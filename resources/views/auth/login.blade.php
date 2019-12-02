@extends('layouts.app')

@section('content')
    <form id="login" class="mx-auto box w-8/12" method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="text-blue-500 text-center text-2xl">Login</h1>
        <div class="flex flex-wrap -mx-2">
            <div class="w-full px-2">
                <label for="email">
                    Email
                </label>
                <input id="email" name="email" type="text" placeholder="example@example.com" value="admin@admin.com" class="placeholder-gray-500 @error('email') error-form-input @enderror">
                @error('email')
                    <p class="error-form-text">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full px-2">
                <label for="password">
                    Password
                </label>
                <input id="password" name="password" type="password" placeholder="********" value="password" class="placeholder-gray-500 @error('password') error-form-input @enderror">
                @error('password')
                    <p class="error-form-text">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <button type="submit">
            Login
        </button>
    </form>
@endsection


