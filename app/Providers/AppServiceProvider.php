<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Facades\Module;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Module::macro('sidebarMenu', function () {
            return view('components.dashboard.sidebar-menu', [
                'menus' => config('sidebar'),
            ]);
        });

        Module::macro('isModuleEnabled', function ($moduleName) {
            if (Module::has($moduleName)) {
                $module = Module::find($moduleName);
                return $module->isStatus(1);
            }

            return false;
        });
    }
}
