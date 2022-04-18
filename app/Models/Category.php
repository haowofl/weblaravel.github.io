<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = ['name','status','prioty'];

    public function product()
    {  // join cái product theo category_id
       return $this->hasMany(Product::class,'category_id','id');
       //quan hệ 1-n thì dùng hasMany
    }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
