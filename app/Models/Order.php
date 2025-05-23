<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'product_id',
        'quantity',
        'comment',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
