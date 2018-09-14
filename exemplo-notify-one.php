<?php

class Recurso extends \Threaded
{
    public $dado = 1;
}

class UmaThread extends \Thread
{
    /**
     * @var Recurso
     */
    private $recurso;

    public function __construct(Recurso $recurso)
    {
        $this->recurso = $recurso;
    }

    public function run()
    {
        $this->recurso->synchronized(function (Recurso $recurso, Thread $thread) {
            echo 'Thread ' . $thread->getThreadId() . ' aguardando' . PHP_EOL;
            $recurso->wait();
            echo 'Thread ' . $thread->getThreadId() . ' notificada' . PHP_EOL;
        }, $this->recurso, $this);
    }
}

$recurso = new Recurso();
$thread1 = new UmaThread($recurso);
$thread2 = new UmaThread($recurso);

$thread1->start();
$thread2->start();

usleep(500);
$recurso->notifyOne();
$recurso->notifyOne();
//$recurso->notify();

$thread1->join();
$thread2->join();

echo PHP_EOL;
