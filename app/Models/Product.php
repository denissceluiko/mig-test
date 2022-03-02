<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeOrder(Builder $query, array $columns): Builder
    {
        foreach ($columns as $column => $order)
        {
            $query->orderBy($column, $order);
        }
        return $query;
    }
}
