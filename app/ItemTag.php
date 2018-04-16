<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTag extends Model
{
    protected $table = 'item_tags';

    protected $fillable = [
        'name',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
