<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = ['series_id', 'year'];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
