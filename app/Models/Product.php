<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   protected $fillable = [
    'name',
    'category_id',
    'description',
    'price',
    'discount_price',
    'condition',
    'image',
    'favorite',
    'user_id',
     'status',
];


    // العلاقة بين المنتج والخصائص
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
