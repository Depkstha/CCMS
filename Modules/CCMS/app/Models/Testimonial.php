<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CCMS\Database\Factories\TestimonialFactory;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'designation',
        'company',
        'image',
        'status',
        'order',
        'createdby',
        'updatedby'
    ];

}
