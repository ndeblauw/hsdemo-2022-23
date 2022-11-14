<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        ray('hello from controller');

        $articles = Article::latest()->take(4)->get();
        $articles_count = Article::count();

        return view('welcome', compact('articles', 'articles_count'));
    }
}
