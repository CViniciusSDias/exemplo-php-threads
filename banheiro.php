<?php
require __DIR__ . '/vendor/autoload.php';

use CViniciusSDias\Threads\{
    AbstractTarefa, Banheiro, Convidado, Limpeza
};

$banheiro = new Banheiro();

/** @var Convidado[] $convidadoList */
$convidadoList = [
    new Convidado('Vinicius', 1, $banheiro),
    new Convidado('Vanessa', 2, $banheiro),
    new Convidado('Wolnei', 1, $banheiro),
    new Convidado('Maria', 2, $banheiro),
];

/** @var Limpeza[] $limpezaList */
$limpezaList = [
    new Limpeza($banheiro),
    new Limpeza($banheiro),
];

/** @var AbstractTarefa[] $tarefaList */
$tarefaList = array_merge($convidadoList, $limpezaList);
foreach ($tarefaList as $tarefa) {
    $tarefa->start();
}

foreach ($convidadoList as $convidado) {
    $convidado->join();
}

foreach ($limpezaList as $limpeza) {
    $limpeza->finalizar();
}

foreach ($limpezaList as $limpeza) {
    $limpeza->join();
}
