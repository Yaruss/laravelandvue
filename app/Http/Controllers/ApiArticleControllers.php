<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResorce;
use App\Models\Article;
use Illuminate\Http\Request;

class ApiArticleControllers extends Controller
{
    public function show(){
        $article = Article::with('comments', 'tags', 'state')->first();
        return new ArticleResorce($article);
    }
}
