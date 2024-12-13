<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\CreateArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  ArticleResource::collection(Article::published()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request)
    {
        $article = Article::create($request->all());

        return  ArticleResource::make($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): ArticleResource|JsonResponse
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                "message" => "Article not found"
            ]);
        }

        return  ArticleResource::make($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, int $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                "message" => "Article not found"
            ]);
        }

        $article->update($request->all());

        return  ArticleResource::make($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return response()->json([
                "message" => "Article not found"
            ]);
        }

        $article->delete();

        return response()->json([
            "message" => "Article Deleted successfully"
        ]);
    }
}
