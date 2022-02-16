<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'img', 'slug'];
    protected $guarded = [];
    public $PageCountItem = 12;

    public function  comments() {
        return $this->hasMany(Comment::class);
    }

    public  function state() {
        return $this->hasOne(State::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    public function createdAtForHumans() {
        return $this->created_at->diffForHumans();
    }
    public function getBodyPreview(){
        return Str::limit($this->body, 100);
    }
    public function scopeAllPaginate($query) {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($this->PageCountItem);
    }
    public function scopeFindBySlug($query, $slug) {
        return $query->with('comments','tags', 'state')->where('slug', $slug)->firstOrFail();
    }
    public function scopeFindByTag($query, $tag) {
        return $query->with('tags', 'state')
            ->join('article_tag', 'articles.id', '=', 'article_tag.article_id')
            ->join('tags', 'tags.id', '=', 'article_tag.tag_id')
            ->join('states', 'states.article_id', '=', 'articles.id')
            ->where('tags.label', $tag)
            ->orderBy('created_at', 'desc')
            ->paginate($this->PageCountItem);
    }
    public function scopeLastLimit($query, $numbers) {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($numbers)->get();
    }
}
