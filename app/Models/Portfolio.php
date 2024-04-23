<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Portfolio extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['title', 'description', 'image_path'];
}
