<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResorce;
use App\Models\Article;
use Illuminate\Http\Request;

class ApiArticleControllers extends Controller
{
    public function show(Request $request){
        $slug = $request->get('slug');
        $article = Article::FindBySlug($slug);
        return new ArticleResorce($article);
    }
    public function viewsIncrement(Request $request) {
        $slug = $request->get('slug');
        $article = Article::FindBySlug($slug);
        $article->state->increment('views');
        return new ArticleResorce($article);
    }
    public function likesIncrement(Request $request) {
        $slug = $request->get('slug');
        $article = Article::FindBySlug($slug);

        $inc = $request->get('increment');
        $inc ? $article->state->increment('likes') : $article->state->decrement('likes');
        return new ArticleResorce($article);
    }
}
