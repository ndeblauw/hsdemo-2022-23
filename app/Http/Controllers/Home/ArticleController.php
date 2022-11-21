<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::editableByLoggedInUser()->paginate(10);

        $articles->load('author');

        return view('home.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->load('media', 'author', 'keywords');

        ray($article);
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

        if($request->has('image')) {
            $article->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect()->route('home.articles.index');
    }

    public function edit($id)
    {
        $article = Article::find($id);

        //abort_if(!$article->canEdit(), 403);

        if(! $article->canEdit() ) {
            return redirect()->back();
        }

        return view('home.articles.edit', compact('article'));
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id);

        if(! $article->canEdit() ) {
            return redirect()->back();
        }


        $validated = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'body' => 'required',
        ]);

        $article->update($validated);

        // deal with keywords
        $validated = $request->validate([
            'keywords' => ['nullable', 'string'],
        ]);

        $keywords = collect(explode(',',$validated['keywords']))->map( fn($k) => ucfirst(trim($k)));

        $key_list = [];
        foreach($keywords as $keyword) {
            $key_list[] = \App\Models\Keyword::firstOrCreate(['name' => $keyword]);
        }
        $key_list = collect($key_list);

        $article->keywords()->sync($key_list->pluck('id'));

        // deal with media file
        $validated = $request->validate([
            'image' => ['nullable', 'file', 'image'],
        ]);

        // Replace the article image if a new one is uploaded
        if($request->has('image')) {
            $article->media()->first()?->delete();
            $article->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect()->route('home.articles.show', $article->id);
    }
}
