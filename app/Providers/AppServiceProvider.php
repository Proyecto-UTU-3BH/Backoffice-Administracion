<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('numeric_ids', function ($attribute, $value, $parameters, $validator) {
            $ids = preg_split('/\r\n|\r|\n/', $value);
    
            foreach ($ids as $id) {
                if (!is_numeric(trim($id))) {
                    return false;
                }
            }
    
            return true;
        });
    }
}
