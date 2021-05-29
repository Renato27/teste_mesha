<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait BaseEloquentRepository
{
    /**
     * ID do item pesquisado.
     *
     * @var ?integer
     */
    protected $id = null;

    /**
     * Undocumented variable.
     *
     * @var \App\Model
     */
    protected $entity;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Retorna todos os dados da model.
     *
     * @return null|Collection
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * Retorna o primeiro resultado compatível.
     *
     * @return void
     */
    public function first()
    {
        return $this->model->first();
    }

    /**
     * Faz uma busca por ID.
     *
     * @param int $id
     * @return void
     */
    public function find(int $id) : ?Model
    {
        if (! is_null($this->id)) {
            $this->id = $id;
        }

        if ($this->id != $id) {
            $this->entity = $this->model->find($id);
        }

        return $this->entity;
    }

    /**
     * Faz uma busca por id e se faltar retorna uma exceção.
     *
     * @param int $id
     * @return void
     */
    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Cria um item.
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        $this->entity = $this->model->create($data);

        return $this->entity;
    }

    /**
     * Cria um item caso não exista.
     *
     * @param array $data
     * @return Model
     */
    public function firstOrCreate(array $data)
    {
        $this->entity = $this->model->firstOrCreate($data);

        return $this->entity;
    }

    /**
     * Atualiza um item da model.
     *
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data)
    {
        if ($this->id == $id) {
            $this->entity->fill($data);
            $this->entity->save();

            return $this->entity;
        } else {
            $this->entity = $this->find($id);
            $this->entity->fill($data);
            $this->entity->save();

            return $this->entity;
        }

        return $this->find($id);
    }

    /**
     * Deleta um item da model.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        if ($this->id == $id and ! is_null($this->entity)) {
            return $this->entity->delete($id);
        }

        $this->entity = $this->find($id);

        return  $this->entity->delete($id);
    }

    /**
     * Inclui um array para compor o where na model.
     *
     * @param array $data
     * @return Object
     */
    public function where(array $data)
    {
        return $this->model->where($data);
    }

    /**
     * Verifica se a coluna está contida na matriz fornecida.
     *
     * @param string $column
     * @param array $data
     * @return Object
     */
    public function whereIn(string $column, array $data)
    {
        return $this->model->whereIn($column, $data);
    }

    /**
     * Adiciona uma item para where pesquisar
     * por uma coluna e um intervalo.
     *
     * @param string $column
     * @param array $data
     * @return Model
     */
    public function whereBetween(string $column, array $data)
    {
        return $this->model->whereBetween($column, $data);
    }
}
