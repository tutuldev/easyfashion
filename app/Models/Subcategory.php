<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
      public function products()
        {
            return $this->hasMany(Product::class, 'subcategory_id');
        }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
