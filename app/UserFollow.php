<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    /**
     * Allow to call getTable method statically
     *
     * @return string
     */
    public static function getTableStatic()
    {
        return self::__callStatic('getTable',[]);
    }

    public function followed_user()
    {
        return $this->belongsTo('App\User', 'followed_user_id', 'id');
    }

    public function follower()
    {
        return $this->belongsTo('App\User', 'follower_id', 'id');
    }
}
