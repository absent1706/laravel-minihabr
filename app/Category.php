<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
class Category extends Model {

    protected $fillable = [
      'name',
      'order'
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getNewDefaultOrder()
    {
        return (int)DB::table($this->getTable())->max('order') + 10;
    }
}
