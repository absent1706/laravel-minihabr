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


    public function commentsCountRelation()
    {
        return $this->hasOne('App\Comment')->selectRaw('article_id, count(*) as count')
        ->groupBy('article_id');
    }

    public function getCommentsCountAttribute()
    {
        return $this->commentsCountRelation ?
        $this->commentsCountRelation->count : 0;
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
        // HARDCODE
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeMostRated($query)
    {
        // HARDCODE
        return $query->orderBy('created_at', 'desc');
    }
}
