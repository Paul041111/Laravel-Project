@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
    <h1>Articles</h1>

    @forelse ($articles as $article)
        <x-article-card :article="$article" />
    @empty
        <p>No articles have been published yet.</p>
    @endforelse

    {{ $articles->links() }}
@endsection