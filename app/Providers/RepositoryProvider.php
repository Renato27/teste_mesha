<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Contracts\EletronicPointRepository::class, function ($app) {
            return new \App\Repositories\EletronicPointRepositoryImplementation(new \App\Models\EletronicPoint());
        });

        $this->app->bind(\App\Repositories\Contracts\ValidatedRecordRepository::class, function ($app) {
            return new \App\Repositories\ValidatedRecordRepositoryImplementation(new \App\Models\ValidatedRecord());
        });
    }
}
