<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ItemOut extends Model
{
    protected $table = 'item_outs';

    protected $fillable = [
      'item_id',
      'qty'
    ];

    protected $dates = [
      'created_at'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
