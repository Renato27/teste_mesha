<?php

namespace App\Services\ELetronicPoint\CreateELetronicPoint\Base;

use App\Services\ELetronicPoint\CreateELetronicPoint\Contracts\CreateELetronicPointService;
use App\Models\ELetronicPoint;
use App\Repositories\Contracts\ELetronicPointRepository;

abstract class CreateELetronicPointServiceBase implements CreateELetronicPointService
{

    /**
     * Array de dados.
     *
     * @var array
     */
    protected array $data;

    /**
     * Repositório de ELetronicPointRepository.
     *
     * @var ELetronicPoint
     */
    protected ELetronicPointRepository $eletronicPointRepository;

    /**
     * Seta os dados para ELetronicPoint.
     *
     * @param array $data
     * @return CreateELetronicPointService;
     */
    public function setData(array $data): CreateELetronicPointService
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Seta o repositório de ELetronicPointRepository.
     *
     * @param ELetronicPointRepository $eletronicPointRepository
     * @return CreateELetronicPointService
     */
    public function setELetronicPointRepository(ELetronicPointRepository $eletronicPointRepository): CreateELetronicPointService
    {
        $this->eletronicPointRepository = $eletronicPointRepository;
        return $this;
    }
}
