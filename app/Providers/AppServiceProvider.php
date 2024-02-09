<?php

namespace App\Providers;

use App\Repositories\PessoaRepository;
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
        $this->app->bind(\App\Services\PessoaServiceInterface::class, \App\Services\PessoaService::class);
        $this->app->bind(PessoaRepository::class, function ($app) {
            return new PessoaRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}