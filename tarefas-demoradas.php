<?php

$teste1 = new class extends \Thread {
    public function run()
    {
        echo "Tarefa 1" . PHP_EOL;
        sleep(20);
        echo "Fim da tarefa 1" . PHP_EOL;
    }
};

$teste2 = new class extends \Thread {
    public function run()
    {
        echo "Tarefa 2" . PHP_EOL;
        sleep(10);
        echo "Fim da tarefa 2" . PHP_EOL;
    }
};

echo PHP_EOL;
$teste1->start();
$teste2->start();
