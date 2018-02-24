<?php
namespace CViniciusSDias\Threads;

/**
 * Classe que representa uma pessoa reponsável pela limpeza de um banheiro
 * @package CViniciusSDias\Threads
 */
class Limpeza extends AbstractTarefa
{
    /** @var Banheiro $banheiro */
    private $banheiro;
    /** @var bool $chegouAoFim Informa se a limpeza já não é mais necessária, por ter sido finalizada */
    private $chegouAoFim = false;

    public function __construct(Banheiro $banheiro)
    {
        $this->banheiro = $banheiro;
    }

    /**
     * Em um loop infinito, verifica se o banheiro está sujo, e caso esteja, o limpa
     */
    public function run()
    {
        while (!$this->chegouAoFim) {
            $this->banheiro->synchronized(function () {
                $this->banheiro->limpa($this);
            });
        }
    }

    /**
     * Indica que a limpeza já não é mais necessária
     */
    public function finalizar()
    {
        $this->chegouAoFim = true;
    }

    /**
     * Um objeto desta classe pode ser representado como string, informando o ID da respectiva thread
     * @return string
     */
    public function __toString(): string
    {
        return 'Limpeza nº ' . $this->getThreadId();
    }
}
