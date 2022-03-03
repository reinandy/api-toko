<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'code',
        'status',
        'created_by',
        'updated_by'
    ];

    public function detail()
    {
        return $this->hasMany('App\Models\ReceiptDetail', 'receipt_id', 'id');
    }
}
