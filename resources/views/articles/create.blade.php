@extends('layouts.app')

@section('title', 'New Article')

@section('content')
    <h1>New Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}" />
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <br/>

        <label for="content">Content</label><br>
        <textarea id="content" name="content" rows="10" cols="60">{{ old('content') }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <br/>

        <button type="submit">Publish</button>
    </form>
@endsection
