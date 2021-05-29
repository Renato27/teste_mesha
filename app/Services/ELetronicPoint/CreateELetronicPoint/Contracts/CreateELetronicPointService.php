<?php

namespace App\Services\ELetronicPoint\CreateELetronicPoint\Contracts;

use App\Models\ELetronicPoint;
use App\Repositories\Contracts\ELetronicPointRepository;

interface CreateELetronicPointService
{
    /**
     * Seta os dados para ELetronicPoint.
     *
     * @param array $data
     * @return CreateELetronicPointService;
     */
    public function setData(array $data): CreateELetronicPointService;

    /**
     * Seta o repositório de ELetronicPointRepository.
     *
     * @param ELetronicPointRepository $eletronicPointRepository
     * @return CreateELetronicPointService
     */
    public function setELetronicPointRepository(ELetronicPointRepository $eletronicPointRepository): CreateELetronicPointService;

    /**
     * Processa os dados
     *
     * @return ELetronicPoint|null
     */
    public function handle(): ?ELetronicPoint;
}
