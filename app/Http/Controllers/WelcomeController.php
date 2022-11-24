<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $users = Cache::remember('welcome.users', config('app.cache_ttl'), function () {
            return User::has('articles')->with('articles')->inRandomOrder()->take(3)->get();
        });

        $articles = Cache::remember('welcome.articles', config('app.cache_ttl'), function () {
            return Article::with('media')->latest()->take(4)->get();
        });

        $articles_count = Cache::remember('welcome.articles_count', config('app.cache_ttl'), function () {
            return Article::count();
        });

        return view('welcome', compact('users', 'articles', 'articles_count'));
    }
}
