<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author', 'keywords')->paginate(20);

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->load('media', 'author', 'keywords');

        return view('articles.show', compact('article'));
    }
}
