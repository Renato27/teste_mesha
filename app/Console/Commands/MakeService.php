<?php

namespace App\Console\Commands;

use App\Services\Automations\Service\CreateService;
use Illuminate\Console\Command;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {referencia_service} {acao_service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um serviço para regra de negócios;
                              Primeiro parametro = (Referência) ex.: Clientes;
                              Segundo parametro = (Ação) ex.: Cadastrar';

    protected $acao;

    protected $service;

    protected $model;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $referencia = $this->argument('referencia_service');

        $ultimaLetra = substr($referencia, -1);

        if ($ultimaLetra == 's') {
            $referenciaService = substr($referencia, 0, -1);

            $acao = $this->argument('acao_service').$referenciaService;
            $service = $acao.'Service';
            $model = $referenciaService;

            $this->acao = $acao;
            $this->service = $service;
            $this->model = $model;
        } else {
            $acao = $this->argument('acao_service').$referencia;
            $service = $acao.'Service';
            $model = $referencia;

            $this->acao = $acao;
            $this->service = $service;
            $this->model = $model;
        }

        $serviceCommand = new CreateService();
        $serviceCommand->handle($referencia, $this->acao, $this->service, $this->model);
    }
}
