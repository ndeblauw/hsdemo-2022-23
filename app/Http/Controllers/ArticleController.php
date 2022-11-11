<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required',
        ]);

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'published_at' => now(),
            'author_id' => 1,
            'tag_id' => 1,
        ]);

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id);

        $validated = $request->validate([
            'title' => 'required|min:5|max:255|ends_with:haha,hihi,.',
            'body' => 'required',
        ]);

        $article->update($validated);

        return redirect()->route('articles.show', $article->id);
    }

}
