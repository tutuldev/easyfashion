<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Subcategory;   // ⭐️ ১) Subcategory ইমপোর্ট

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /* ⭐️ ২) নতুন রিলেশন */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
