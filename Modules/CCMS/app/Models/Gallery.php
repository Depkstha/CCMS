<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\CCMS\Database\Factories\GalleryFactory;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'link',
        'images',
        'category_id',
        'status',
        'order',
        'createdby',
        'updatedby',
    ];

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
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
}
