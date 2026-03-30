<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = [
        'purchase_id',
        'product_id',
        'company_id',
        'boxes',
        'unit_quantity',
        'total_pieces',
        'purchase_price',
        'sale_price',
        'discount',
        'profit_percentage',
    ];

    protected $casts = [
        'purchase_price'    => 'decimal:2',
        'sale_price'        => 'decimal:2',
        'discount'          => 'decimal:2',
        'profit_percentage' => 'decimal:2',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
