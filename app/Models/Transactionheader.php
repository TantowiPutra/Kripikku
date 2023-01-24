<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactionheader extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'transaction_id', 'id');
    }
}
