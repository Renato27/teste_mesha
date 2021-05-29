<?php

namespace App\Services\Automations\Repository\Abstracts;

abstract class CreateRepositoryServiceAbstract
{
     /**
     * Nome do repositório.
     *
     * @var string
     */
    protected string $repository;

    protected string $recurso;

    const CAMINHO_BASE = __DIR__. '/../../../../../';

    /**
     * Caminhos dos arquivos.
     *
     * @var array
     */
    protected array $paths = [
        'modelo_interface' => SELF::CAMINHO_BASE.'resources/files/repository/interface.txt',
        'modelo_repository' => SELF::CAMINHO_BASE.'resources/files/repository/implementation.txt',

        'caminho_contrato' => SELF::CAMINHO_BASE.'app/Repositories/Contracts/',
        'caminho_implementacao' => SELF::CAMINHO_BASE.'app/Repositories/',
    ];

    /**
     * Cria a interface.
     *
     * @return void
     */
    protected function createInterface()
    {
        $interface = $this->openOrCreateArquivo($this->paths['caminho_contrato'], $this->repository, '.php');

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
    protected function createImplementation()
    {
        $implementacao = $this->openOrCreateArquivo($this->paths['caminho_implementacao'], $this->repository, 'Implementation.php');

        if (! $implementacao) {
            throw new \Exception('Houve ao criar a implementação.');
        }

        $conteudoImplementacao = $this->getContentArquivo($this->paths['modelo_repository']);

        if (fwrite($implementacao, $conteudoImplementacao)) {
            echo 'A implementação foi criada'.PHP_EOL;

            return;
        }

        fclose($implementacao);

        throw new \Exception('Houve um erro ao associar a implementação e o conteúdo.');
    }

    /**
     * Abre ou cria um novo arquivo.
     *
     * @param string $caminho
     * @param string $nome
     * @param string $extensao
     * @return void
     */
    private function openOrCreateArquivo(string $caminho, string $nome, string $extensao = '.php')
    {
        return fopen($caminho.$nome.$extensao, 'x');
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

        $string = str_replace('{repository_name}', $this->repository, $conteudo);

        return str_replace('{recurso}', $this->recurso, $string);
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
