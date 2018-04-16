<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemElement extends Model
{
    protected $table = 'item_elements';

    protected $fillable = [
        'type', 'name', 'order',
    ];
}
