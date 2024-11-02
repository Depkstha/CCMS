<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'images',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'sidebar_title',
        'sidebar_content',
        'sidebar_image',
        'button_text',
        'button_url',
        'button_target',
        'date',
        'status',
        'createdby',
        'updatedby',
        'order',
    ];
}
