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

    // Laravel tries to automatically set 'updated_at', but this model doesn't have updated_at field
    // that's why below hack is needed
    public function setUpdatedAtAttribute($value)
    {
        // Do nothing.
    }
}
