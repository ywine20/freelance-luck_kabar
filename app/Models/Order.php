<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cart_id',
        'address_id',
        'orderstatus_id',
        'promotion_id',
        'item_id',
        'user_id',
        'quantity',
        'deliveryfees',
        'totalprice',
    ];

    /**
     * Get the cart associated with the order.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the address associated with the order.
     */
    public function address()
    {
        return $this->belongsTo(Address::class,'address_id');
    }

    /**
     * Get the order status associated with the order.
     */
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class,'orderstatus_id');
    }

    /**
     * Get the promotion associated with the order.
     */
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    /**
     * Get the item associated with the order.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the user associated with the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
