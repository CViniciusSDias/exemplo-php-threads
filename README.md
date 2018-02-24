# Exemplo do uso de Threads com PHP

## Descrição

Neste **simples** exemplo, temos um cenário onde há 4 convidados (em uma festa), 2 "pessoas" para limpeza, e apenas 1
banheiro. 

Os 4 convidados tentam utilizar o banheiro, da mesma forma que as pessoas que fazem a limpeza verificam o tempo todo
se o banheiro está limpo.

Todas as 6 pessoas (4 convidados e 2 pessoas de limpeza) são Threads no exemplo, pois tentam concorrentemente acessar o
banheiro, e é necessária a sincronização (mutex) do banheiro para que apenas 1 pessoa consiga utilizá-lo por vez.

As 2 pessoas de limpeza se comportam de forma diferente dos convidados, tentando limpar o banheiro sempre, e não apenas
1 vez e saindo da fila.

## Requisitos

Para rodar este simples exemplo, será necessário:
- PHP 7.2+
- Extensão pthreads na versão 3 habilitada

Com isso, basta clonar este repositório e rodar `php banheiro.php`.

## Notas

Este exemplo é para fins acadêmicos apenas, não estando de acordo com os melhores padrões de codificação, e nem há
intenção de mudar isso
