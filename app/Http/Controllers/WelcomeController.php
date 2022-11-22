<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = User::has('articles')->with('articles')->inRandomOrder()->take(3)->get();

        $articles = Article::latest()->take(4)->get();
        $articles_count = Article::count();

        return view('welcome', compact('users', 'articles', 'articles_count'));
    }
}
