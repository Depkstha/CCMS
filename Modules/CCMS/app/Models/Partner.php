<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CCMS\Database\Factories\PartnerFactory;

class Partner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'url',
        'image',

        'status',
        'order',
        
        'createdby',
        'updatedby',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset($value),
        );
    }
}
