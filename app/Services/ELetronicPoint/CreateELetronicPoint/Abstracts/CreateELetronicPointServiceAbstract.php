<?php

namespace App\Services\ELetronicPoint\CreateELetronicPoint\Abstracts;

use App\Models\ELetronicPoint;
use App\Services\ELetronicPoint\CreateELetronicPoint\Base\CreateELetronicPointServiceBase;

abstract class CreateELetronicPointServiceAbstract extends CreateELetronicPointServiceBase
{
    /**
     * Implementação do código.
     *
     * @return ELetronicPoint|null
     */
    protected function createELetronicPoint() : ?ELetronicPoint
    {
        return $this->eletronicPointRepository->createEletronicPoint($this->data);
    }
}
