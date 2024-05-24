<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;

class HeroSection extends Model
{
    use HasFactory, AsSource, Attachable;

    protected $fillable=[
        'occupation',
        'name_title',
        'sub_title',
        'image_path',
    ];

    public function documents(){
        return $this->hasMany(Attachment::class)->where('group','documents');
    }
}
