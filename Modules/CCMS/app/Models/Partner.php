<?php

namespace Modules\CCMS\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\CCMS\Database\Factories\PartnerFactory;

class Partner extends Model
{
    use HasFactory, CreatedUpdatedBy;

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
