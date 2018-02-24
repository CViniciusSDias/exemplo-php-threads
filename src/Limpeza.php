<?php
namespace CViniciusSDias\Threads;

class Limpeza extends AbstractTarefa
{
    /**
     * @var Banheiro
     */
    private $banheiro;
    private $chegouAoFim = false;

    public function __construct(Banheiro $banheiro)
    {
        $this->banheiro = $banheiro;
    }

    public function run()
    {
        while (!$this->chegouAoFim) {
            $this->banheiro->synchronized(function () {
                $this->banheiro->limpa($this);
            });
        }
    }

    public function finalizar()
    {
        $this->chegouAoFim = true;
    }

    public function __toString()
    {
        return 'Limpeza nº' . $this->getThreadId();
    }
}
