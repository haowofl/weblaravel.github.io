<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'oders';
    protected $fillable = [
        'name',
        'email',
        'number_phone',
        'address',
        'user_id',
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetails::class, 'order_id','id');
    }
}
