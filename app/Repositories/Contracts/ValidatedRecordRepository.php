<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ValidatedRecordRepository
{
    /**
     * Retorna ValidatedRecord baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getValidatedRecord(int $id): ?Model;

    /**
     * Retorna uma coleção de ValidatedRecords.
     *
     * @param integer $id
     * @param integer $segundo_recurso
     * @return Collection|null
     */
    public function getValidatedRecords(): ?Collection;

    /**
     * Retorna uma coleção de ValidatedRecords baseados em um ponto eletrônico.
     *
     * @param integer $eletronicPoint
     * @return Collection|null
     */
    public function getValidatedRecordsByEletronicPoint(int $eletronicPoint): ?Collection;

    /**
     * Cria um novo ValidatedRecord
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createValidatedRecord(array $detalhes): ?Model;

    /**
     * Atualiza um ValidatedRecord
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateValidatedRecord(int $id, array $detalhes): ?Model;

    /**
     * Deleta um ValidatedRecord
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteValidatedRecord(int $id): bool;
}
