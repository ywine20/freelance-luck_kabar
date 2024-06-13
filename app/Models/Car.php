<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'brand_id',
        'company_id',
        'series_id',
        'model_id',
        'year_id',
        'engine_id',
        'description',
    ];
    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class);
    // }
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
        return $this->belongsTo(CarModel::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
    public function engine()
    {
        return $this->belongsTo(EnginePower::class, 'engine_id');
    }
    public function items()
    {
        return $this->belongsToMany(Item::class, 'car_items');
    }
}
