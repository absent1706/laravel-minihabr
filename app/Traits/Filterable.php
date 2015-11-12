<?php
namespace App\Traits;

trait Filterable
{
    public function scopeFilterBy($query, $filters)
    {
        foreach ($filters as $field => $value)
        {
           $query->where($field, '=' , $value);
        }
        return $query;
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}