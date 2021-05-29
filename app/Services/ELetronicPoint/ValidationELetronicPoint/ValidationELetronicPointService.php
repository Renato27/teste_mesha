<?php

namespace App\Services\ELetronicPoint\ValidationELetronicPoint;

use App\Models\ELetronicPoint;
use App\Services\ELetronicPoint\ValidationELetronicPoint\Abstracts\ValidationELetronicPointServiceAbstract;
use Illuminate\Support\Facades\DB;

class ValidationELetronicPointService extends ValidationELetronicPointServiceAbstract
{
    /**
     * Processa os dados
     *
     * @return ELetronicPoint|null
     */
    public function handle(): ?ELetronicPoint
    {
        return DB::transaction(function () {
            return $this->validationELetronicPoint();
        });
    }
}
