<?php

namespace App\Models\WP;

use Illuminate\Database\Eloquent\Model;
use Corcel\Model\Post as Corcel;

class Post extends Corcel
{
    protected $connection = 'wordpress';

    /* ***********************************
        Start Products Scope and meta
    *********************************** */

    public function scopeProducts($query)
    {
        return $query->where(['post_type' => 'product']);
    } // end of products

    public function getStock()
    {
        $meta = $this -> meta -> where('meta_key', '_total_stock_quantity');

        $value = '';
        foreach ($meta as $val){
            return $value = $val -> meta_value;
        } // end of foreach

        return $value;

    } // end of getStock

    public function getSku()
    {
        $meta = $this -> meta -> where('meta_key', '_sku');

        $value = '';
        foreach ($meta as $val){
            return $value = $val -> meta_value;
        } // end of foreach

        return $value;

    } // end of getSku

    public function getSalePrice()
    {
        $meta = $this -> meta -> where('meta_key', '_sale_price');

        $value = '';
        foreach ($meta as $val){
            return $value = $val -> meta_value;
        } // end of foreach

        return $value;

    } // end of getSalePrice

    public function getRegularPrice()
    {
        $meta = $this -> meta -> where('meta_key', '_regular_price');

        $value = '';
        foreach ($meta as $val){
            return $value = $val -> meta_value;
        } // end of foreach

        return $value;

    } // end of getRegularPrice

    /* ***********************************
        End Products Scope and meta
    *********************************** */

} // end of model
