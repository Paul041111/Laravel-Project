@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
    <h1>Edit Article</h1>

    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" />
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <br/><br/>

        <label for="content">Content</label><br>
        <textarea id="content" name="content" rows="10" cols="60">{{ old('content', $article->content) }}</textarea>
        @error('content')
            <p>{{ $message }}</p>
        @enderror

        <br/><br/>

        <button type="submit">Save Changes</button>
    </form>
@endsection
