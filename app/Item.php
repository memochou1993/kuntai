<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'first_name', 'second_name', 'year', 'first_genre', 'second_genre', 'country', 'region', 'maker', 'variety', 'brand', 'capacity', 'abv', 'price', 'discount', 'first_unit', 'second_unit', 'barcode', 'description', 'full_text', 'editor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itemTag()
    {
        return $this->hasMany(ItemTag::class);
    }

    public function itemVariety()
    {
        return $this->hasMany(ItemVariety::class);
    }
}
