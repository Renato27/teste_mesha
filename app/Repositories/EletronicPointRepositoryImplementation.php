<?php

namespace App\Repositories;

use App\Repositories\Contracts\EletronicPointRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EletronicPointRepositoryImplementation implements EletronicPointRepository
{
    use BaseEloquentRepository;

    /**
     * Retorna EletronicPoint baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getEletronicPoint(int $id): ?Model
    {
        return $this->find($id);
    }

    /**
     * Retorna uma coleção de EletronicPoints.
     *
     * @param integer $id
     * @return Collection|null
     */
    public function getEletronicPoints(): ?Collection
    {
        return $this->getAll();
    }

    /**
     * Cria um novo EletronicPoint
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createEletronicPoint(array $detalhes): ?Model
    {
        return $this->create($detalhes);
    }

    /**
     * Atualiza um EletronicPoint
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateEletronicPoint(int $id, array $detalhes): ?Model
    {
        return $this->update($id, $detalhes);
    }

    /**
     * Deleta um EletronicPoint
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteEletronicPoint(int $id): bool
    {
        return $this->delete($id);
    }
}
