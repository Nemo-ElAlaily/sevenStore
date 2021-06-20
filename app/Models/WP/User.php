<?php

namespace App\Models\WP;

use Illuminate\Database\Eloquent\Model;
use Corcel\Model\User as Corcel;


class User extends Corcel
{
    protected $connection = 'wordpress';

    public function getRole()
    {
        $meta = $this -> meta -> where('meta_key', 'wp_capabilities');

        $value = '';
        foreach ($meta as $val){
            return $value = array_keys($val -> value);
        } // end of foreach

        return $value;

    } // end of Get Role

} // end of model
