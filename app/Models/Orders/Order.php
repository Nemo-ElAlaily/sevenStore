<?php

namespace App\Models\Orders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public $timestamps = true;

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function orderItems()
    {
        return $this -> hasMany(OrderItem::class);
    } // end of order Items

    public function user()
    {
        return $this -> belongsTo(User::class);
    }// end of users

    /* ***********************************
   End of Relationships
   *********************************** */

    public function getShippingStatus()
    {
        if($this -> shipping_status == 0){
            return 'Received';
        } elseif($this -> shipping_status == 1){
            return 'Shipped';
        } elseif($this -> shipping_status == 2){
            return 'Deliverd';
        } else{
            return 'Other';
        }
    } // end fo get shipping Status

    public function getPaymentMethod()
    {
        if($this -> payment_method == 0){
            return 'COD';
        } elseif($this -> payment_method == 1){
            return 'PayMob';
        } elseif($this -> payment_method == 2){
            return 'Fawry';
        } elseif($this -> payment_method == 3){
            return 'Credit Card';
        } else{
            return 'Others';
        }
    } // end fo get shipping Status

}
