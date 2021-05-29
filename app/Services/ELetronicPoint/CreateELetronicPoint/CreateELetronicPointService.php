<?php

namespace App\Services\ELetronicPoint\CreateELetronicPoint;

use App\Models\ELetronicPoint;
use App\Services\ELetronicPoint\CreateELetronicPoint\Abstracts\CreateELetronicPointServiceAbstract;
use Illuminate\Support\Facades\DB;

class CreateELetronicPointService extends CreateELetronicPointServiceAbstract
{
    /**
     * Processa os dados
     *
     * @return ELetronicPoint|null
     */
    public function handle(): ?ELetronicPoint
    {
        return DB::transaction(function () {
            return $this->createELetronicPoint();
        });
    }
}
