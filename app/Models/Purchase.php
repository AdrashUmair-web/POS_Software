<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'company_id',
        'user_id',
        'purchase_date',
        'total_amount',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'total_amount'  => 'decimal:2',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}