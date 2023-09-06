<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','unit','price','percentage','discount','start_date','end_date','tax_percentage','tax_amount','stock_quantity', 'net_price', 'product_id', 'images'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
