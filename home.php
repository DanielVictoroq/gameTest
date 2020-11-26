<?php
require_once('jogos.php');

$jogos = new Jogos;

$jogos->setQtdDezenas(8);

echo $jogos->html();