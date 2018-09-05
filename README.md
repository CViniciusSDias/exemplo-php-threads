# Exemplo do uso de Threads com PHP

## Exemplo de tarefas "demoradas"

### Arquivo executável do exemplo

`tarefas-demoradas.php`


### Descrição

Neste **simples** exemplo, há um cenário com 2 tarefas bloqueantes e demoradas.
A primeira tarefa dura 2 segundos, enquanto a segunda tarefa tem duração de 1 segundo.

Ambas são executadas paralelamente, mostrando que não há necessidade de uma esperar a outra.

## Exemplo da festa (banheiro)

### Arquivo executável do exemplo

`banheiro.php`


### Descrição

Neste **simples** exemplo, temos um cenário onde há 4 convidados (em uma festa), 2 "pessoas" para limpeza, e apenas 1
banheiro. 

Os 4 convidados tentam utilizar o banheiro, da mesma forma que as pessoas que fazem a limpeza verificam o tempo todo
se o banheiro está limpo.

Todas as 6 pessoas (4 convidados e 2 pessoas de limpeza) são Threads no exemplo, pois tentam concorrentemente acessar o
banheiro, e é necessária a sincronização (mutex) do banheiro para que apenas 1 pessoa consiga utilizá-lo por vez.

As 2 pessoas de limpeza se comportam de forma diferente dos convidados, tentando limpar o banheiro sempre, e não apenas
1 vez e saindo da fila.

## Requisitos

Para rodar estes exemplos, será necessário:
- PHP 7.2+
- Extensão pthreads na versão 3 habilitada

Com isso, basta clonar este repositório e rodar `php banheiro.php`.

## Notas

Estes exemplos são para fins acadêmicos apenas, não estando de acordo com os melhores padrões de codificação, e nem há
intenção de mudar isso
