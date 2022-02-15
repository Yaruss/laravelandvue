<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::allPaginate();
        return view('app.article', compact('articles'));
    }
    public function showSlag($slug) {
        $article = Article::FingBySlag($slug);
        return view('app.article', compact('article'));
    }
    public function byTag(Tag $tag) {
        $articles = $tag->articles()->findByTag();
        return view('app.article', compact('articles'));
    }
}
