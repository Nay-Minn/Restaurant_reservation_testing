<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';

    protected $fillable = [
        'english_name',
        'myanmar_name',
        'photos',
        'description',
        'menu_category_id',
        'is_variant',
        'basic_price',
        'cook_time',
        'status'
    ];

    protected $guarded = [];
    protected $casts = [
        'photos' => 'array'
    ];
}
