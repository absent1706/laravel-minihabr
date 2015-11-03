<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Parsing;

class Comment extends Model {

    protected $fillable = [
        'body',
        'article_id',
        'user_id'
    ];

    //Accessor edit data after retrieving from DB
    // public function getBodyAttribute($message)
    // {
    //     //BB-parsing for Comment
    //     $message = Parsing::BB_parse($message);
    //     return $message;
    // }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

}
