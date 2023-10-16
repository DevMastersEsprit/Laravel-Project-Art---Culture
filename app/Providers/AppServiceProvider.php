<?php

namespace App\Providers;

use App\Models\Emoji;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Validator::extend('valid_emoji', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[\x{1F600}-\x{1FAFF}\x{261D}\x{FE0F}]{0,}/u', $value);
        });
        Validator::replacer('valid_emoji', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute field contains invalid emojis.');
        });

    }
}
