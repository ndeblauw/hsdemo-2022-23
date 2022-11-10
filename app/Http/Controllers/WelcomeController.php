<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $articles = Article::latest()->take(2)->get();
        $articles_count = Article::count();

        return view('welcome', compact('articles', 'articles_count'));
    }
}
