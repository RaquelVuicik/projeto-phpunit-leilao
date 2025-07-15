<?php

use Raquel\Leilao\Model\Lance;
use Raquel\Leilao\Model\Leilao;
use Raquel\Leilao\Model\Usuario;
use Raquel\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

$leilao = new Leilao('Fiat 147 0km');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();
$leiloeiro->avaliar($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

echo $maiorValor;