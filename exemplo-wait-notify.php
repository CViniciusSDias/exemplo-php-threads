<?php

class My extends Thread
{
    public $done = false;

    public function run()
    {
        //sleep(1);
        /** cause this thread to wait **/
        $this->synchronized(function (Thread $thread) {
            if (!$thread->done) {
                echo 'Aguardando' . PHP_EOL;
                $thread->wait();
                echo 'Notificação recebida' . PHP_EOL;
            }
        }, $this);
    }
}

$my = new My();
$my->start();

/** send notification to the waiting thread **/
$my->synchronized(function ($thread) {
    echo 'Main notificando' . PHP_EOL;
    $thread->done = true;
    //sleep(1);
    $thread->notify();
}, $my);

$my->join();
echo PHP_EOL;
