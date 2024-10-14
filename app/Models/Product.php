<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 

    protected $fillable = [
        'name',
        'category',
        'active_ingredients',
        'research_status',
        'batch_number',
        'manufacturing_date',
        'expiration_date'
    ];

    protected $dates = [
        'manufacturing_date',
        'expiration_date'
    ];
}
