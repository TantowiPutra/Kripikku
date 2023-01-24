<?php

namespace App\Models;

use App\Models\User;
use App\Models\Categoryheader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeProductFilter($query, array $filters)
    {
        $query->when($filters['name'] ?? false, function ($query, $name) {
            return $query->where(function ($query) use ($name) {
                $query->where('product_name', 'like', '%' . $name . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('categories', function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Categoryheader::class, 'product_id', 'id');
    }
}
