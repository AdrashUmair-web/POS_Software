<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'pieces',
        'unit_quantity',
        'cost_price',
        'sale_price',
        'is_active',
        'allow_discount',
        'alert_stock',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'allow_discount' => 'boolean',
    ];

    // Relationship
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}