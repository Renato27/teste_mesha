<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EletronicPointRepository
{
    /**
     * Retorna EletronicPoint baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getEletronicPoint(int $id): ?Model;

    /**
     * Retorna uma coleção de EletronicPoints.
     *
     * @param integer $id
     * @param integer $segundo_recurso
     * @return Collection|null
     */
    public function getEletronicPoints(): ?Collection;

    /**
     * Cria um novo EletronicPoint
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createEletronicPoint(array $detalhes): ?Model;

    /**
     * Atualiza um EletronicPoint
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateEletronicPoint(int $id, array $detalhes): ?Model;

    /**
     * Deleta um EletronicPoint
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteEletronicPoint(int $id): bool;
}
