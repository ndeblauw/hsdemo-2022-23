<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);

        $articles->load('author');

        return view('home.articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('home.articles.show', compact('article'));
    }

    public function create()
    {
        return view('home.articles.create')->with('title', 'test');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'body' => 'required',
            'image' => ['nullable', 'file'],
        ]);

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'published_at' => now(),
            'author_id' => 1,
            'tag_id' => 1,
        ]);

        $article->addMediaFromRequest('image')->toMediaCollection();

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::find($id);

        return view('home.articles.edit', compact('article'));
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id);

        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'body' => 'required',
        ]);

        $article->update($validated);

        return redirect()->route('articles.show', $article->id);
    }
}
