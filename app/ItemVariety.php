<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVariety extends Model
{
    protected $table = 'item_varieties';

    protected $fillable = [
        'name',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
