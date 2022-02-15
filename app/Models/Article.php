<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function scopeAllPaginate($query) {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($this->PageCountItem);
    }
    public function scopeFindBySlag($query, $slug) {
        return $query->with('comments','tags', 'state')->where('slug', $slug)->firstOrFail();
    }
    public function scopeFindByTag($query) {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($this->PageCountItem);
    }

}
