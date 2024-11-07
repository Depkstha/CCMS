<?php

namespace Modules\CCMS\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, CreatedUpdatedBy;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'status',
        'order',
        'createdby',
        'updatedby',
    ];
}
