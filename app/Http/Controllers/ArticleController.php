<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        $articles->load('author');

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

}
