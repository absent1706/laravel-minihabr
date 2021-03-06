<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Parsing;

use App\Traits\Filterable;

class Comment extends Model {

    use Filterable;
    use Traits\RecordsActivity;

    /**
     * Which events to record for the auth'd user.
     *
     * @var array
     */
    protected static $recordEvents = ['created'];

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
