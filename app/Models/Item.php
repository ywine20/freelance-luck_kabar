<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brandName',
        'second_category_id',
        'main_category_id',
        'is_feature',
        'OE_No',
        'price'
    ];

    public function secondCategory()
    {
        return $this->belongsTo(SecondCategory::class);
    }

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }

    public function carItems()
    {
        return $this->hasMany(CarItem::class);
    }
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_items');
    }

    public function images()
{
    return $this->hasMany(ItemImage::class);
}

}
