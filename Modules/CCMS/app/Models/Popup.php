<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CCMS\Database\Factories\PopupFactory;

class Popup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',

        'images',

        'button_text',
        'button_url',
        'button_target',
        
        'status',
        'order',
    ];

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
