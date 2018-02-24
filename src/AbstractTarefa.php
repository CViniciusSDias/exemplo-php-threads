<?php
namespace CViniciusSDias\Threads;

abstract class AbstractTarefa extends \Thread
{
    public function sleep(int $segundos): void
    {
        sleep($segundos);
    }

    abstract public function __toString(): string;
}
