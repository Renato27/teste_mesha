<?php

namespace App\Providers\Services\ELetronicPoint;

use App\Repositories\Contracts\EletronicPointRepository;
use App\Services\ELetronicPoint\CreateELetronicPoint\Contracts\CreateELetronicPointService as ContractsCreateELetronicPointService;
use App\Services\ELetronicPoint\CreateELetronicPoint\CreateELetronicPointService;
use Illuminate\Support\ServiceProvider;

class CreateELetronicPointServiceProvider extends ServiceProvider
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
        $service = new CreateELetronicPointService();
        $service->setELetronicPointRepository(app(EletronicPointRepository::class));

        $this->app->bind(ContractsCreateELetronicPointService::class, function() use($service){
            return $service;
        });
    }
}
