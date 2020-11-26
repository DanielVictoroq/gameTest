<?php
require_once('jogos.php');

$jogos = new Jogos;

// $jogos->setQtdDezenas(6);
// $jogos->setTotalJogos(5);
// $jogos->setJogos(5);
// $jogos->setResultado([1,2,3]);

echo $jogos->html();