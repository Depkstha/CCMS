<?php
use Modules\CCMS\Models\Setting;

if (!function_exists('setting')) {
    function setting($key = null)
    {
        $setting = Cache::has('setting') ? Cache::get('setting') : Cache::rememberForever('setting', function () {
            return Setting::get()->mapWithKeys(function (Setting $setting) {
                return [$setting->key => $setting->value];
            })->toArray();
        });

        return array_key_exists($key, $setting) ? $setting[$key] : null;
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $path = 'uploads')
    {
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = Storage::disk('public')->putFileAs($path, $file, $fileName);
        return $filePath;
    }
}

function getPageTemplateOptions()
{
    $client = config('app.client');
    $pageTemplateOptions = collect(File::files(resource_path("views/client/{$client}/pages")))
        ->mapWithKeys(function ($file) {
            $template = Str::replace('.blade.php', '', $file->getFilename());
            return [
                $template => $template,
            ];
        });

    return $pageTemplateOptions->all();
}
