<?php

namespace App\Models\WP;

use Illuminate\Database\Eloquent\Model;
use Corcel\Model\User as Corcel;


class User extends Corcel
{
    protected $connection = 'wordpress';

//    public function getPassword()
//    {
//        $meta = $this -> meta -> where('meta_key', 'wp_yoast_notifications');
//
//        $targetData = '';
//        foreach ($meta as $val){
//            $data = $val -> value;
//            foreach ($data as $val){
//                $data = $val['options'];
//                return $data = response()->json($data['user']);
//            }
//        } // end of foreach
//
//        return $meta;
//
//    } // end of getPassword

} // end of model
