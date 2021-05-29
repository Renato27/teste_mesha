<?php

namespace App\Repositories;

use App\Repositories\Contracts\ValidatedRecordRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ValidatedRecordRepositoryImplementation implements ValidatedRecordRepository
{
    use BaseEloquentRepository;

    /**
     * Retorna ValidatedRecord baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getValidatedRecord(int $id): ?Model
    {
        return $this->find($id);
    }

    /**
     * Retorna uma coleção de ValidatedRecords.
     *
     * @param integer $id
     * @return Collection|null
     */
    public function getValidatedRecords(): ?Collection
    {
        return $this->getAll();
    }

    /**
     * Retorna uma coleção de ValidatedRecords baseados em um ponto eletrônico.
     *
     * @param integer $eletronicPoint
     * @return Collection|null
     */
    public function getValidatedRecordsByEletronicPoint(int $eletronicPoint): ?Collection
    {
        return $this->where(['eltronic_point_id' => $eletronicPoint])->get();
    }

    /**
     * Cria um novo ValidatedRecord
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createValidatedRecord(array $detalhes): ?Model
    {
        return $this->create($detalhes);
    }

    /**
     * Atualiza um ValidatedRecord
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateValidatedRecord(int $id, array $detalhes): ?Model
    {
        return $this->update($id, $detalhes);
    }

    /**
     * Deleta um ValidatedRecord
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteValidatedRecord(int $id): bool
    {
        return $this->delete($id);
    }
}
