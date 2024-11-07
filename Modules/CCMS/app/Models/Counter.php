<?php

namespace Modules\CCMS\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CCMS\Database\Factories\CounterFactory;

class Counter extends Model
{
    use HasFactory, CreatedUpdatedBy;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'image',
        'counter',

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
