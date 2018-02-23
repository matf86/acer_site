<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as Guzzle;


class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Validator::extend('recaptcha', function($attr, $value, $parameters, $validator) {
            $response = (new Guzzle())->post('https://www.google.com/recaptcha/api/siteverify', [
                'query' => [
                    'secret' => env('RECAPTCHA_SECRET'),
                    'response' => $value
                ]
            ]);

            $status = json_decode($response->getBody(), true);

            return $status['success'];
        });
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
