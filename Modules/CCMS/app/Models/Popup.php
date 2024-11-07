<?php

namespace Modules\CCMS\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CCMS\Database\Factories\PopupFactory;

class Popup extends Model
{
    use HasFactory, CreatedUpdatedBy;

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

        'created_by',
        'updated_by',
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
