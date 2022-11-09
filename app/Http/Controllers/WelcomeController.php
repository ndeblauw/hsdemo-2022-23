<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::all();

        return view('welcome', compact('articles'));
    }
}
