<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
      'product_name',
      'qty',
      'date_in',
    ];

    protected $dates = [
        'date_in',
        'created_at',
        'updated_at'
    ];

    public function out()
    {
        return $this->hasMany(ItemOut::class);
    }
}
