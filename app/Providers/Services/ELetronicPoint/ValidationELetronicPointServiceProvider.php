<?php

namespace App\Providers\Services\ELetronicPoint;

use App\Repositories\Contracts\ValidatedRecordRepository;
use App\Services\ELetronicPoint\ValidationELetronicPoint\Contracts\ValidationELetronicPointService as ContractsValidationELetronicPointService;
use App\Services\ELetronicPoint\ValidationELetronicPoint\ValidationELetronicPointService;
use Illuminate\Support\ServiceProvider;

class ValidationELetronicPointServiceProvider extends ServiceProvider
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
        $service = new ValidationELetronicPointService();
        $service->setValidatedRecordRepository(app(ValidatedRecordRepository::class));

        $this->app->bind(ContractsValidationELetronicPointService::class, function() use($service){
            return $service;
        });
    }
}
