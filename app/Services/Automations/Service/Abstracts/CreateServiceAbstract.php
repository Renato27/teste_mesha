<?php

namespace App\Services\Automations\Service\Abstracts;

define('BASE_PATH', dirname(__FILE__).'/../../../../../');

abstract class CreateServiceAbstract
{
    /**
     * Nome do serviço.
     *
     * @var string
     */
    protected string $service_name;

    /**
     * Nome da pasta da ação do serviço.
     */
    protected string $acao_service;

    /**
     * Nome da pasta do serviço.
     */
    protected string $referencia_service;

    /**
     * Nome da model.
     *
     * @var string
     */
    protected string $modelRepository;

    /**
     * Caminhos dos arquivos.
     *
     * @var array
     */
    protected array $paths = [
        'modelo_interface' => BASE_PATH.'resources/files/service/interface.txt',
        'modelo_implementation' => BASE_PATH.'resources/files/service/implementation.txt',
        'modelo_base' => BASE_PATH.'resources/files/service/base.txt',
        'modelo_client' => BASE_PATH.'resources/files/service/client.txt',

        'caminho_service' => BASE_PATH.'app/Services/',
        'caminho_provider' => BASE_PATH.'app/Providers/Services/',
    ];

    /**
     * Cria a interface.
     *
     * @return void
     */
    protected function createInterface()
    {
        $interface = $this->openOrCreateArquivo($this->paths['caminho_service'], $this->referencia_service, $this->acao_service.'/Contracts', $this->service_name, '.php');

        if (! $interface) {
            throw new \Exception('Houve um erro ao criar a interface.');
        }

        $conteudoInterface = $this->getContentArquivo($this->paths['modelo_interface']);

        if (fwrite($interface, $conteudoInterface)) {
            echo 'A interface foi criada'.PHP_EOL;
            fclose($interface);

            return;
        }

        fclose($interface);

        throw new \Exception('Houve um erro ao associar a interface e o conteúdo.');
    }

    /**
     * Cria implementação.
     *
     * @return void
     */
    protected function createAbstract()
    {
        $implementacao = $this->openOrCreateArquivo($this->paths['caminho_service'], $this->referencia_service, $this->acao_service.'/Abstracts', $this->service_name.'Abstract', '.php');

        if (! $implementacao) {
            throw new \Exception('Houve ao criar a implementação.');
        }

        $conteudoImplementacao = $this->getContentArquivo($this->paths['modelo_implementation']);

        if (fwrite($implementacao, $conteudoImplementacao)) {
            echo 'A abstração foi criada'.PHP_EOL;

            return;
        }

        fclose($implementacao);

        throw new \Exception('Houve um erro ao associar a implementação e o conteúdo.');
    }

    /**
     * Cria a base de conexão com os repositórios
     *
     * @return void
     */
    protected function createBase()
    {
        $implementacao = $this->openOrCreateArquivo($this->paths['caminho_service'], $this->referencia_service, $this->acao_service.'/Base', $this->service_name.'Base', '.php');

        if (! $implementacao) {
            throw new \Exception('Houve ao criar a implementação.');
        }

        $conteudoImplementacao = $this->getContentArquivo($this->paths['modelo_base']);

        if (fwrite($implementacao, $conteudoImplementacao)) {
            echo 'A base foi criada'.PHP_EOL;

            return;
        }

        fclose($implementacao);

        throw new \Exception('Houve um erro ao associar a implementação e o conteúdo.');
    }

    /**
     * Cria o client do serviço. Onde é executado o código.
     *
     * @return void
     */
    protected function createClient()
    {
        $implementacao = $this->openOrCreateArquivo($this->paths['caminho_service'], $this->referencia_service, $this->acao_service, $this->service_name, '.php');

        if (! $implementacao) {
            throw new \Exception('Houve ao criar a implementação.');
        }

        $conteudoImplementacao = $this->getContentArquivo($this->paths['modelo_client']);

        if (fwrite($implementacao, $conteudoImplementacao)) {
            echo 'O client foi criado'.PHP_EOL;

            return;
        }

        fclose($implementacao);

        throw new \Exception('Houve um erro ao associar a implementação e o conteúdo.');
    }

    /**
     * Cria o provider do service para fazer o bind do serviço e repositório na aplicação.
     *
     * @return void
     */
    protected function createProvider()
    {
        $comando = '@php artisan make:provider '.'Services/'.$this->referencia_service.'/'.$this->service_name.'Provider';
        echo shell_exec($comando);
    }

    /**
     * Abre ou cria um novo arquivo.
     *
     * @param string $caminho
     * @param string $nome
     * @param string $extensao
     * @return void
     */
    private function openOrCreateArquivo(string $caminho, string $referencia_service, string $acao_service, string $service_name, string $extensao = '.php')
    {
        return fopen($caminho.'/'.$referencia_service.'/'.$acao_service.'/'.$service_name.$extensao, 'x');
    }

    /**
     * Retorna o conteúdo de um arquivo.
     *
     * @param string $caminho
     * @return string
     */
    private function getContentArquivo(string $caminho)
    {
        $conteudo = file_get_contents($caminho);

        if (! $conteudo) {
            throw new \Exception('O conteúdo do arquivo '.$caminho.' não existe.');
        }

        $string = str_replace('{referencia_service}', $this->referencia_service, $conteudo);
        $string = str_replace('{acao_service}', $this->acao_service, $string);
        $string = str_replace('{service_name}', $this->service_name, $string);

        return str_replace('{modelRepository}', $this->modelRepository, $string);
    }

    /**
     * Cria uma pasta para armazenar o service
     *
     * @param string $caminho
     * @param string $referencia_service
     * @param string $acao_service
     * @return void
     */
    public function createDirectory(string $caminho, string $referencia_service, string $acao_service)
    {
        mkdir($caminho.$referencia_service.'/'.$acao_service.'/Contracts', 0755, true);
        mkdir($caminho.$referencia_service.'/'.$acao_service.'/Abstracts', 0755, true);
        mkdir($caminho.$referencia_service.'/'.$acao_service.'/Base', 0755, true);
    }

    /**
     * Verificar se arquivo existe.
     *
     * @param string $caminhoArquivo
     * @return void
     */
    public function verifyIfExistsArquivo(string $caminhoArquivo, ?string $extensao = '.php')
    {
        $retorno = file_exists($caminhoArquivo.$extensao);

        if ($retorno) {
            throw new \Exception('O arquivo já existe: '.$caminhoArquivo.$extensao);
        }
    }
}
