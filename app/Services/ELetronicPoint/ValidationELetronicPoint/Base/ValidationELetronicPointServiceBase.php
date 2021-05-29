<?php

namespace App\Services\ELetronicPoint\ValidationELetronicPoint\Base;

use App\Models\ELetronicPoint;
use App\Repositories\Contracts\ELetronicPointRepository;
use App\Repositories\Contracts\ValidatedRecordRepository;
use App\Services\ELetronicPoint\ValidationELetronicPoint\Contracts\ValidationELetronicPointService;

abstract class ValidationELetronicPointServiceBase implements ValidationELetronicPointService
{
    /**
     * Model de ELetronicPoint.
     *
     * @var ELetronicPoint
     */
    protected ELetronicPoint $eletronicPoint;

    /**
     * Repositório de ValidatedRecordRepository.
     *
     * @var ValidatedRecordRepository
     */
    protected ValidatedRecordRepository $validatedRecordRepository;

   /**
     * Seta a model de ELetronicPoint.
     *
     * @param ELetronicPoint
     * @return ValidationELetronicPointService
     */
    public function setELetronicPoint(ELetronicPoint $eletronicPoint): ValidationELetronicPointService
    {
        $this->eletronicPoint = $eletronicPoint;
        return $this;
    }

    /**
     * Seta o repositório de ValidatedRecordRepository.
     *
     * @param ValidatedRecordRepository $validatedRecordRepository
     * @return ValidationELetronicPointService
     */
    public function setValidatedRecordRepository(ValidatedRecordRepository $validatedRecordRepository): ValidationELetronicPointService
    {
        $this->validatedRecordRepository = $validatedRecordRepository;
        return $this;
    }
}
