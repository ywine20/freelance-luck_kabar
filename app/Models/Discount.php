<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'start_date',
        'end_date',
        'discount_type_id',
        'max_item',
        'is_active',
    ];

    /**
     * Get the item that owns the discount.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the discount type that owns the discount.
     */
    public function discountType()
    {
        return $this->belongsTo(DiscountType::class);
    }
}
