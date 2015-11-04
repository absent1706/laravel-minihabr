<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
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


    // /* for eager loading like Article::with(['commentsCountRelation']) */
    public function commentsCountRelation()
    {
        // return $this->commentsCountRelation();
        return $this->hasOne('App\Comment')->selectRaw('article_id, count(*) as comments_count_field')
        ->groupBy('article_id');
    }

    // /* for getting comments count like $article->comments_count_field*/
    public function getCommentsCountAttribute()
    {
        return $this->commentsCountRelation ?
        $this->commentsCountRelation->comments_count_field : 0;
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeMostViewed($query)
    {
        // HARDCODE
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeMostCommented($query)
    {
        return $query->select(\Illuminate\Support\Facades\DB::raw('articles.*, COUNT(comments.article_id) as comments_count_aggregated'))
            ->leftJoin('comments', 'comments.article_id' , '=', 'articles.id')
            ->groupBy('articles.id')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('COUNT(comments.article_id)'), 'desc');
    }

    public function scopeMostRated($query)
    {
        // HARDCODE
        return $query->orderBy('created_at', 'desc');
    }
}
