<?php

namespace Modules\CCMS\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CCMS\Traits\UpdatesCustomFieldTrait;
// use Modules\CCMS\Database\Factories\TestFactory;

class Test extends Model
{
    use HasFactory, UpdatesCustomFieldTrait, CreatedUpdatedBy;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'images',
        'custom',
        'banner',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'sidebar_title',
        'sidebar_content',
        'sidebar_image',
        'button_text',
        'button_url',
        'button_target',
        'status',
        'createdby',
        'updatedby',
        'order',
    ];

    protected function casts(): array
    {
        return [
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
}
