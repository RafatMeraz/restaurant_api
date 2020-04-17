<?php

namespace App\Providers;

use App\User;
use http\Exception;
use Illuminate\Support\Facades\Gate;
use \Firebase\JWT\JWT;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {

            $token = $request->input('api_token');
            $token_key = env("TOKEN_KEY");
            try{
                $decoded = JWT::decode($token, $token_key, array('HS256'));
                return new User();
            } catch(\Exception $e){
                return null;
            }
        });
    }
}
