<?php

namespace App\Models;

use App\Models\Categoryheader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categoryheader()
    {
        return $this->hasMany(Categoryheader::class, 'category_id', 'id');
    }
}
