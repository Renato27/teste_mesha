<?php

namespace App\Services\ELetronicPoint\ValidationELetronicPoint\Contracts;

use App\Models\ELetronicPoint;
use App\Repositories\Contracts\ELetronicPointRepository;
use App\Repositories\Contracts\ValidatedRecordRepository;

interface ValidationELetronicPointService
{
    /**
     * Seta a model de eletronicPoint.
     *
     * @param ELetronicPoint
     * @return ValidationELetronicPointService
     */
    public function setELetronicPoint(ELetronicPoint $eletronicPoint): ValidationELetronicPointService;

    /**
     * Seta o repositório de ValidatedRecordRepository.
     *
     * @param ValidatedRecordRepository $validatedRecordRepository
     * @return ValidationELetronicPointService
     */
    public function setValidatedRecordRepository(ValidatedRecordRepository $validatedRecordRepository): ValidationELetronicPointService;

    /**
     * Processa os dados
     *
     * @return ELetronicPoint|null
     */
    public function handle(): ?ELetronicPoint;
}
