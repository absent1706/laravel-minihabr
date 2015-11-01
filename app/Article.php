<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

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
