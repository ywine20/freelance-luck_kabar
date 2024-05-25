<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'second_category_id',
        'company_id',
        'series_id',
        'carmodel_id',
        'year_id',
        'name',
        'image',
        'is_feature',
        'OE_No',
        'price',
    ];

    // Define relationships if needed
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function secondCategory()
    {
        return $this->belongsTo(SecondCategory::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class,'model_id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }
}
