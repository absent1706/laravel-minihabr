<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Parsing;

use App\Traits\Filterable;

class Star extends Model {

    use Filterable;

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
