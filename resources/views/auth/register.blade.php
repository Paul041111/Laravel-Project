@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
    <h1>Sign Up</h1>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <label for="name">Name</label><br/>
        <input type="text" id="name" name="name" value="{{ old('name') }}" />
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <br/><br/>

        <label for="email">Email</label><br/>
        <input type="email" id="email" name="email" value="{{ old('email') }}" />
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <br/><br/>

        <label for="password">Password</label><br/>
        <input type="password" id="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <br/><br/>

        <label for="password_confirmation">Confirm Password</label><br/>
        <input type="password" id="password_confirmation" name="password_confirmation" />

        <br/><br/>

        <button type="submit">Create Account</button>
    </form>

    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
@endsection
