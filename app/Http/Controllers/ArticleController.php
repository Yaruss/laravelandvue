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
    public function showSlug($slug) {
        $article = Article::FindBySlug($slug);
        return view('app.article', compact('article'));
    }
    public function byTag($tag) {
        $tags = Tag::all();
        $articles = Article::FindByTag($tag);
        return view('app.articlefromtag', compact('articles', 'tags'));
    }
}
