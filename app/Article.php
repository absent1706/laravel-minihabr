<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); //user_id in Art-s table
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // public function scopeMostViewed($query)
    // {
    //     // HARDCODE
    //     return $query->orderBy('created_at', 'desc');
    // }

    public function scopeMostCommented($query)
    {
        return $query->select(\Illuminate\Support\Facades\DB::raw('articles.*, COUNT(comments.article_id) as comments_count_aggregated'))
            ->leftJoin('comments', 'comments.article_id' , '=', 'articles.id')
            ->groupBy('articles.id')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('COUNT(comments.article_id)'), 'desc');
    }

    // public function scopeMostRated($query)
    // {
    //     // HARDCODE
    //     return $query->orderBy('created_at', 'desc');
    // }
}
