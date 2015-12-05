<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Filterable;

class Article extends Model
{
    use Filterable;

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

    public function views()
    {
        return $this->hasMany('App\View');
    }

    public function stars()
    {
        return $this->hasMany('App\Star');
    }

    public function scopeRecentlyViewedBy($query, $user)
    {
        return $query->select(\Illuminate\Support\Facades\DB::raw('articles.*'))
            ->join('views', 'views.article_id' , '=', 'articles.id')
            ->where('views.user_id', '=', $user->id)
            ->groupBy('articles.id')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('max(views.created_at)'), 'desc');
    }

    public function scopeStarredBy($query, $user)
    {
        return $query->select(\Illuminate\Support\Facades\DB::raw('articles.*'))
            ->join('stars', 'stars.article_id' , '=', 'articles.id')
            ->where('stars.user_id', '=', $user->id)
            ->groupBy('articles.id')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('stars.created_at'), 'desc');
    }

    public function scopeMostViewed($query)
    {
        return $query->select(\Illuminate\Support\Facades\DB::raw('articles.*, COUNT(views.article_id) as views_count_aggregated'))
            ->leftJoin('views', 'views.article_id' , '=', 'articles.id')
            ->groupBy('articles.id')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('COUNT(views.article_id)'), 'desc');
    }

    public function scopeMostCommented($query)
    {
        return $query->select(\Illuminate\Support\Facades\DB::raw('articles.*, COUNT(comments.article_id) as comments_count_aggregated'))
            ->leftJoin('comments', 'comments.article_id' , '=', 'articles.id')
            ->groupBy('articles.id')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('COUNT(comments.article_id)'), 'desc');
    }

    public function scopeMostStarred($query)
    {
        return $query->select(\Illuminate\Support\Facades\DB::raw('articles.*, COUNT(stars.article_id) as stars_count_aggregated'))
            ->leftJoin('stars', 'stars.article_id' , '=', 'articles.id')
            ->groupBy('articles.id')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('COUNT(stars.article_id)'), 'desc');
    }
}
