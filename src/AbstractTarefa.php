<?php
namespace CViniciusSDias\Threads;

/**
 * Classe que define uma tarefa (thread)
 * @package CViniciusSDias\Threads
 */
abstract class AbstractTarefa extends \Thread
{
    /**
     * Método utilizado para que apenas a thread em questão "durma", não chamando a função sleep na thread principal
     * @param int $segundos Número de segundo que a thread em questão ficará "dormindo"
     */
    public function sleep(int $segundos): void
    {
        sleep($segundos);
    }

    /**
     * Toda tarefa deve saber se representar como string
     * @return string
     */
    abstract public function __toString(): string;
}
