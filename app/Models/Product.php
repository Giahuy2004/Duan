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
        'type', 
        'price', 
        'description', 
        'images', 
        'category_id',
        'brand_id',
        'stock_quantity',   
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    /**
     * Define the relationship to the Brand model
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }
    // Define the relationship to the Category model
}
