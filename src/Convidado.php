<?php
namespace CViniciusSDias\Threads;

/**
 * Classe que representa um Convidado que deseja utilizar um banheiro
 * @package CViniciusSDias\Threads
 */
class Convidado extends AbstractTarefa
{
    /** @var string $nome */
    private $nome;
    /** @var int $tarefa */
    private $tarefa;
    /** @var Banheiro $banheiro */
    private $banheiro;

    public function __construct(string $nome, int $tarefa, Banheiro $banheiro)
    {
        $this->nome = $nome;
        $this->tarefa = $tarefa;
        $this->banheiro = $banheiro;
    }

    /**
     * Realiza a tarefa no banheiro, tendo ambos (tarefa e banheiro) sido informados no construtor
     */
    public function run(): void
    {
        $tarefa = "fazNumero{$this->tarefa}";
        $this->banheiro->$tarefa($this);
    }

    /**
     * O convidado pode ser representado como string, retornando assim seu nome, que foi informado no construtor
     * @return string
     */
    public function __toString(): string
    {
        return $this->nome;
    }
}
