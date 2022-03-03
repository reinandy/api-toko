<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'pic',
        'price',
        'created_by',
        'updated_by'
    ];
}
