<?php

namespace App\Services\Automations\Service;

use App\Services\Automations\Service\Abstracts\CreateServiceAbstract;

class CreateService extends CreateServiceAbstract
{
     /**
     * Processa a criação de um serviço.
     *
     * @param string $repositorio
     * @return bool
     */
    public function handle(string $referencia_service, string $acao_service, string $service_name, string $modelRepository)
    {
        try {
            $this->modelRepository = $modelRepository;
            $this->referencia_service = $referencia_service;
            $this->acao_service = $acao_service;
            $this->service_name = $service_name;

            $this->verifyIfExistsArquivo($this->paths['caminho_service'].'/'.$this->referencia_service.'/'.$this->acao_service.'/Contracts'.'/'.$this->service_name);
            $this->verifyIfExistsArquivo($this->paths['caminho_service'].'/'.$this->referencia_service.'/'.$this->acao_service.'/Abstracts'.'/'.$this->service_name.'Abstract');
            $this->verifyIfExistsArquivo($this->paths['caminho_service'].'/'.$this->referencia_service.'/'.$this->acao_service.'/Base'.'/'.$this->service_name.'Base');
            $this->verifyIfExistsArquivo($this->paths['caminho_service'].'/'.$this->referencia_service.'/'.$this->acao_service.'/'.$this->service_name);

            $this->createDirectory($this->paths['caminho_service'], $this->referencia_service, $this->acao_service);
            $this->createInterface();
            $this->createAbstract();
            $this->createBase();
            $this->createClient();
            $this->createProvider();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
