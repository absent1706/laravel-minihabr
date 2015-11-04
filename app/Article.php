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
        return $this->hasOne('App\Comment')->selectRaw('article_id, count(*) as comments_count')
        ->groupBy('article_id');
    }

    // public function commentsCountRelation()
    // {
    //     return $this->hasOne('App\Comment')->selectRaw('article_id, count(*) as count')
    //     ->groupBy('article_id');
    // }

    // /* for getting comments count like $article->comments_count*/
    public function getCommentsCountAttribute()
    {
        return $this->commentsCountRelation ?
        $this->commentsCountRelation->comments_count : 0;
    }

    // public function likeCountRelation()
    // {
    //     //We use "hasOne" instead of "hasMany" because we only want to return one row.
    //     return $this->hasOne('Like')->select(DB::raw('id, count(*) as count'))->groupBy('id');
    // }

    // //This is got via a magic method whenever you call $this->likeCount (built into Eloquent by default)
    // public function getLikeCountAttribute()
    // {
    //     return $this->likeCountRelation->count;
    // }

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
