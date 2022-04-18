<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'image',
        'price',
        'image_list',
    ];

    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
}
