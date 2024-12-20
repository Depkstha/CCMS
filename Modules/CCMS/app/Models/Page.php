<?php

namespace Modules\CCMS\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\CCMS\Traits\UpdatesCustomFieldTrait;

// use Modules\CCMS\Database\Factories\PageFactory;

class Page extends Model
{
    use HasFactory, UpdatesCustomFieldTrait, CreatedUpdatedBy;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'section',
        'template',
        'parent_id',
        'type',
        'banner',
        'image',
        'images',
        'custom',
        'published_at',

        'sidebar_title',
        'sidebar_content',
        'sidebar_image',

        'button_text',
        'button_url',
        'button_target',

        'meta_title',
        'meta_keywords',
        'meta_description',

        'date',
        'status',
        'order',

        'created_by',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'section' => 'array',
            'custom' => 'array',
        ];
    }

    protected function images(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (empty($value)) {
                    return [];
                }

                $parts = explode(',', $value);
                return array_map(fn($part) => asset(trim($part)), $parts);
            }
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset($value),
        );
    }

    protected function banner(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset($value),
        );
    }

    protected function sidebarImage(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset($value),
        );
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id')->where('type', 'widget');
    }
}
