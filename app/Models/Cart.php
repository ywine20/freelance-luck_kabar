<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'OE_No',
        'quantity',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
