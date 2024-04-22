<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class HeroSection extends Model
{
    use HasFactory, AsSource;

    protected $fillable=[
        'occupation',
        'name_title',
        'sub_title',
    ];
}