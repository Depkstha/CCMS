<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\CCMS\Database\Factories\TeamFactory;

class Team extends Model
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
        'branch_id',
        'degree',

        'address',
        'email',
        'mobile',
        'image',

        'status',
        'order',

        'createdby',
        'updatedby',

        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'whatsapp',
    ];

    // public function branch(){
    //     return $this->belongsTo(Branch::class, 'branch_id');
    // }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset($value),
        );
    }
}
