<?php

namespace Modules\CCMS\Traits;

trait UpdatesCustomFieldTrait
{
    public static function bootUpdatesCustomFieldTrait()
    {
        static::saving(function ($model) {
            $model->processCustomFields(request());
        });
    }

    public function processCustomFields($request)
    {
        $data = null;
        if (!is_null($request->key) && !isEmptyArray($request->key)) {
            foreach ($request->key as $index => $value) {
                $data[] = [
                    'icon' => $request->icon[$index] ?? null,
                    'key' => $request->key[$index] ?? null,
                    'value' => $request->value[$index] ?? null,
                ];
            }
        }

        $this->custom = $data;
    }
}
