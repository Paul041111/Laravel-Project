<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Show every article, newest first. Public page, full width list.
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show a single article. Public page.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form to write a new article. Requires login (see routes/web.php).
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Save a new article, owned by the currently logged in user.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $request->user()->articles()->create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article published.');
    }

    /**
     * Show the edit form. Only the owner is allowed (see ArticlePolicy).
     */
    public function edit(Article $article)
    {
        Gate::authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update an article. Only the owner is allowed (see ArticlePolicy).
     */
    public function update(Request $request, Article $article)
    {
        Gate::authorize('update', $article);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article updated.');
    }

    /**
     * Delete an article. Only the owner is allowed (see ArticlePolicy).
     */
    public function destroy(Article $article)
    {
        Gate::authorize('delete', $article);

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article deleted.');
    }
}
