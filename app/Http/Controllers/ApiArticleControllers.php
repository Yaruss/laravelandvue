<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResorce;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\ArticleService;

class ApiArticleControllers extends Controller
{
    protected $service;
    public  function __construct(ArticleService $service) {
        $this->service = $service;
    }
    public function show(Request $request) {
        $article = $this->service->getArticleBySlug($request);
        return new ArticleResorce($article);
    }
    public function viewsIncrement(Request $request) {
        $article = $this->service->getArticleBySlug($request);
        $article->state->increment('views');
        return new ArticleResorce($article);
    }
    public function likesIncrement(Request $request) {
        $article = $this->service->getArticleBySlug($request);
        $inc = $request->get('increment');
        $inc ? $article->state->increment('likes') : $article->state->decrement('likes');
        return new ArticleResorce($article);
    }
}
