@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}" />
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <br/><br/>

        <label for="password">Password</label><br>
        <input type="password" id="password" name="password">

        <br/><br/>

        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>

        <br/><br/>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
@endsection
