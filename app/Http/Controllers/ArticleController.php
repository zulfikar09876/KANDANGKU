<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = Article::latest()->paginate(15);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:100',
            'slug' => 'required|string|max:255|unique:articles,slug',
            'published_at' => 'nullable|date',
        ]);

        Article::create($validated);
        return redirect()->route('articles.index')->with('status', 'Artikel berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:100',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $article->id,
            'published_at' => 'nullable|date',
        ]);

        $article->update($validated);
        return redirect()->route('articles.index')->with('status', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles.index')->with('status', 'Artikel berhasil dihapus');
    }

    /**
     * Public index for published articles.
     */
    public function publicIndex(): View
    {
        $articles = Article::whereNotNull('published_at')->latest('published_at')->paginate(10);
        return view('articles.public_index', compact('articles'));
    }

    /**
     * Public show for published articles.
     */
    public function publicShow(Article $article): View
    {
        // Ensure article is published
        if (!$article->published_at) {
            abort(404);
        }
        return view('articles.public_show', compact('article'));
    }
}
