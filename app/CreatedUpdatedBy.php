<?php

namespace App\Traits;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy()
    {
        // updating createdby and updatedby when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('createdby')) {
                $model->createdby = auth()->user()->id;
            }
            if (!$model->isDirty('updatedby')) {
                $model->updatedby = auth()->user()->id;
            }
        });

        // updating updatedby when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updatedby')) {
                $model->updatedby = auth()->user()->id;
            }
        });
    }
}
