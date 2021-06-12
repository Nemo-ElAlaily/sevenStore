<?php

namespace App\Models\Orders;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public $timestamps = false;

    public function order()
    {
        return $this -> belongsTo(Order::class);
    } // end of order

    public function product()
    {
        return $this -> hasOne(Product::class,'id','product_id');
    } // end of product
}
