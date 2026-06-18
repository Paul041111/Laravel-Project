@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <article>
        <h1>{{ $article->title }}</h1>

        <p>
            By {{ $article->user->name }}
            on {{ $article->created_at->format('M d, Y') }}
        </p>

        <p>{{ $article->content }}</p>
    </article>

    <a href="{{ route('articles.index') }}">Back to all articles</a>
@endsection
