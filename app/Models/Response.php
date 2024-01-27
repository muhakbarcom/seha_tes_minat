<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
//    saya ingin membuat variabel $response yang berisi array dengan key success, message, dan data

    public static $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];


}
