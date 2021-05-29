<?php

namespace App\Services\Automations\Repository;

use App\Services\Automations\Repository\Abstracts\CreateRepositoryServiceAbstract;

class CreateRepositoryService extends CreateRepositoryServiceAbstract
{
     /**
     * Processa a criação de um repositório.
     *
     * @param string $repositorio
     * @return bool
     */
    public function handle(string $repositorio, string $recurso)
    {
        try {
            $this->repository = $repositorio;
            $this->recurso = $recurso;

            $this->verifyIfExistsArquivo(self::CAMINHO_BASE.'app/Repositories/Contracts/'.$repositorio);
            $this->verifyIfExistsArquivo(self::CAMINHO_BASE.'app/Repositories/'.$repositorio.'Implementation');

            $this->createInterface();
            $this->createImplementation();

            if (! is_null($this->recurso)) {
                $comando = '@php artisan make:model '.$this->recurso.' -mf';
                echo shell_exec($comando);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
