<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CCMS\Database\Factories\PageFactory;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'template',
        'type',
        'banner',
        'image',
        'images',
        'published_at',

        'sidebar_title',
        'sidebar_content',
        'sidebar_image',

        'button_text',
        'button_link',
        'redirect',

        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',
        'order'
    ];

}
