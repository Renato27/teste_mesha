<?php

namespace App\Console\Commands;

use App\Services\Automations\Repository\CreateRepositoryService;
use Illuminate\Console\Command;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um repositório baseado no Eloquent;
                              Criar repositório = (Referência) ex.: Cliente';

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
        $recurso =  $model = $this->argument('model');
        $repositoryName = $model.'Repository';

        $repositoryCommand = new CreateRepositoryService();
        $repositoryCommand->handle($repositoryName, $recurso);
    }
}
