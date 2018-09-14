<?php

class My extends Thread
{
    public $prop = 0;

    public function run()
    {
        usleep(100);
        $this->prop = 1;
    }
}

$my = new My();
$my->start();

echo $my->prop . PHP_EOL;

$my->join();

echo $my->prop . PHP_EOL;
