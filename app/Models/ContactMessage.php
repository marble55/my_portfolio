<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class ContactMessage extends Model
{
    use HasFactory, AsSource;


    public $fillable = ['name', 'email', 'message'];
}
