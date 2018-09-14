<?php

$counter = new class extends Thread {
    public $i = 0;

    public function run()
    {
        $this->synchronized(function (Thread $thread) {
            for ($i = 0; $i < 1000; ++$i) {
                ++$thread->i;
            }
        }, $this);
    }
};

$counter->start();

$counter->synchronized(function ($counter) {
    for ($i = 0; $i < 1000; ++$i) {
        ++$counter->i;
    }
}, $counter);

$counter->join();

var_dump($counter->i);
