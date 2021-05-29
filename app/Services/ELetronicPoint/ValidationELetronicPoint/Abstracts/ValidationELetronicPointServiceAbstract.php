<?php

namespace App\Services\ELetronicPoint\ValidationELetronicPoint\Abstracts;

use App\Models\ELetronicPoint;
use App\Services\ELetronicPoint\ValidationELetronicPoint\Base\ValidationELetronicPointServiceBase;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class ValidationELetronicPointServiceAbstract extends ValidationELetronicPointServiceBase
{
    /**
     * Implementação do código.
     *
     * @return ELetronicPoint|null
     */
    protected function validationELetronicPoint() : ?ELetronicPoint
    {
        $validated = $this->validatedRecordRepository->createValidatedRecord($this->getData());

        if(!isset($validated->id))
            throw new HttpException(400, 'Erro ao validar registro. Tente novamente!');

        return $this->eletronicPoint;
    }

    /**
     * Retorna os dados para gerar a validação de um registro de ponto eletrônico.
     *
     * @return array
     */
    private function getData() : array
    {
        $now = Carbon::now();

        return [
            'date'                  => $now->format('Y-m-d'),
            'date_time'             => $now->format('Y-m-d H:i:s'),
            'eletronic_point_id'    => $this->eletronicPoint->id
        ];
    }
}
