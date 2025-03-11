<?php

namespace App\Models;

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

    public $primaryKey = 'order_id';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
