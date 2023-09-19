<?php

namespace Hossam\LaravelOcr\Providers;


use Illuminate\Support\ServiceProvider;

class laravelOcrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}
