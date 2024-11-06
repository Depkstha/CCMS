<?php
use Carbon\Carbon;
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

if (!function_exists('getFormatted')) {
    function getFormatted($dateTime = null, $date = null, $time = null, $format = null)
    {
        $data = null;

        switch (true) {
            case !is_null($dateTime):
                $data = $dateTime;
                $format ??= 'd M, Y h:i A';
                break;

            case !is_null($date) && !is_null($time):

                $data = "{$date} {$time}";
                $format ??= 'd M, Y h:i A';
                break;

            case !is_null($date):

                $data = $date;
                $format ??= 'd M, Y';
                break;

            case !is_null($time):
                $data = $time;
                $format ??= 'h:i A';
                break;

            default:
                return null;
        }

        try {
            $formatted = Carbon::parse($data)->format($format);
            return $formatted;
        } catch (\Exception $e) {
            return null;
        }
    }

    function getThemeColor()
    {
        static $themeColor;

        if ($themeColor === null) {
            $themeColor = setting('color') ?? '#F3F3F9';
        }
        
        return $themeColor;
    }
}
