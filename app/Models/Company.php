<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    // Relationship (if using products table)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
