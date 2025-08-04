<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'price',
        'stock',
        'category',
        'image',
        'expired_date',
        'manufacturer'
    ];

    protected $casts = [
        'expired_date' => 'date',
        'price' => 'decimal:2'
    ];
}