<?php

namespace Modules\CCMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CCMS\Database\Factories\FaqFactory;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',

        'status',
        'order',

        'createdby',
        'updatedby',
    ];

    public function category(){
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }
}
