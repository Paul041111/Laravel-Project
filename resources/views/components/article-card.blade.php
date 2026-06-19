
bash

# Fix 4 — create the article-card as a proper Blade anonymous component
mkdir -p /tmp/articles-laravel-fixed/resources/views/components
cat > /tmp/articles-laravel-fixed/resources/views/components/article-card.blade.php
{{--
    Anonymous Blade component — article card.
    Usage: <x-article-card :article="$article" />
    The $article variable is passed as a prop.
--}}

@props(['article'])

<article>
    <h2>
        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
    </h2>

    <p>
        By <strong>{{ $article->user->name }}</strong>
        &mdash;
        {{ $article->created_at->format('M d, Y') }}
    </p>

    {{-- Short preview: first 200 characters of content --}}
    <p>{{ Str::limit($article->content, 200) }}</p>

    <p>
        <a href="{{ route('articles.show', $article) }}">Read more &rarr;</a>

        @auth
            @if (auth()->id() === $article->user_id)
                &nbsp;|&nbsp;
                <a href="{{ route('articles.edit', $article) }}">Edit</a>
                &nbsp;|&nbsp;
                <form action="{{ route('articles.destroy', $article) }}"
                      method="POST"
                      style="display:inline"
                      onsubmit="return confirm('Delete this article?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        @endauth
    </p>

    <hr>
</article>