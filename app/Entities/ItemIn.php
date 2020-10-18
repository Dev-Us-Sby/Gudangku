<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ItemIn extends Model
{
    protected $table = 'item_ins';

    protected $fillable = [
        'product_name',
        'qty'
    ];

    protected $dates = [
        'created_at'
    ];
}
