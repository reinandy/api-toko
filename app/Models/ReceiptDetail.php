<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    protected $fillable = [
        'receipt_id',
        'menu_id',
        'qty'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id', 'id');
    }
}
