<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(3);
        //$articles = Article::select(['uuid', 'title'])->get();

        //return $articles;

        return ArticleResource::collection($articles);
    }

    public function store(ArticleRequest $request)
    {
        /*
        $article = Article::create([
            'title' => $request->title,
        ]);
        */

        $article = Article::create($request->validated());

        return response($article,201);

    }

    /**
     * Display the specified-> resource.
     *
     * @param  int  $id
     * @return ArticleResource|Response
     */
    public function show(Article $article)
    {
        //return $article;
        //return $article->toJson();
        //return $article->toArray();

        //return response($article->toJson(), 200)->header('Content-Type', 'application/json');
        //return response($article->title, 200)->header('Content-Type', 'application/json');

        $article->load('author');

        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
