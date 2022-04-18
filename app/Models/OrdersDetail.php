<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;
    protected $table = 'oders_detail';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'total',
    ];

    public function order() {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function product() {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
