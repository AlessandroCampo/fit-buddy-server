<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'proteins',
        'carbs',
        'fats',
        'picture_url',
        'barcode',
        'brand'
    ];

    public function meals()
    {
        $this->belongsToMany(Meal::class)->withPivot('quantity');
    }
}
