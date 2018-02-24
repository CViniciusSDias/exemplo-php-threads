<?php
namespace CViniciusSDias\Threads;

class Convidado extends AbstractTarefa
{
    /**
     * @var string
     */
    private $nome;
    /**
     * @var int
     */
    private $tarefa;
    /**
     * @var Banheiro
     */
    private $banheiro;

    public function __construct(string $nome, int $tarefa, Banheiro $banheiro)
    {
        $this->nome = $nome;
        $this->tarefa = $tarefa;
        $this->banheiro = $banheiro;
    }

    public function run(): void
    {
        $tarefa = "fazNumero{$this->tarefa}";
        $this->banheiro->$tarefa($this);
    }

    public function __toString(): string
    {
        return $this->nome;
    }
}
