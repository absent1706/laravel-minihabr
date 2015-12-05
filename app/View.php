<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Parsing;

class View extends Model {

    protected $fillable = [
        'article_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function setUpdatedAtAttribute($value)
    {
        // Do nothing.
    }
}
