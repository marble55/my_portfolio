<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class AboutList extends Model
{
    use HasFactory, AsSource;

    protected $fillable =[
        'category', 'title', 'description'
    ];
}
