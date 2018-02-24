<?php
namespace CViniciusSDias\Threads;

class Banheiro extends \Threaded
{
    /** @var bool $estaSujo */
    private $estaSujo = false;

    public function fazNumero1(Convidado $convidado): void
    {
        echo "$convidado está batendo na porta" . PHP_EOL;

        $this->synchronized(function () use ($convidado) {
            $this->verificaSeEstaSujo($convidado);
            echo "$convidado fazendo número 1" . PHP_EOL;
            $convidado->sleep(2);
            echo "$convidado saindo do banheiro" . PHP_EOL;
        });
    }

    public function fazNumero2(Convidado $convidado): void
    {
        echo "$convidado está batendo na porta" . PHP_EOL;

        $this->synchronized(function() use ($convidado) {
            $this->verificaSeEstaSujo($convidado);
            echo "$convidado fazendo número 2" . PHP_EOL;
            $convidado->sleep(3);
            $this->estaSujo = true;
            echo "$convidado saindo do banheiro" . PHP_EOL;
        });
    }

    protected function verificaSeEstaSujo(Convidado $convidado): void
    {
        echo "$convidado entrando no banheiro" . PHP_EOL;
        if ($this->estaSujo) {
            echo "$convidado: Eca, o banheiro está sujo" . PHP_EOL;
            echo "$convidado: Saindo para esperar a limpeza" . PHP_EOL;
            $this->wait();
            echo "$convidado entrando no banheiro" . PHP_EOL;
        }
    }

    public function limpa(Limpeza $limpeza): void
    {
        echo "$limpeza está batendo na porta" . PHP_EOL;

        $this->synchronized(function () use ($limpeza) {
            if (!$this->estaSujo) {
                echo "$limpeza: Não está sujo" . PHP_EOL;
                return;
            }

            $this->estaSujo = false;
            echo "$limpeza: Limpando banheiro" . PHP_EOL;
            $limpeza->sleep(1);
            $this->notify();
        });
    }
}
