<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = [
      'name'
    ];

    //Give all articles associated with given tag
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

}
