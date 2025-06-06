<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'slug',
    'description',
    'price',
    'category_id',
    'images',
];

    protected $casts = [
    'images' => 'array',
];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
      {
          return $this->belongsTo(Category::class);
      }
}
