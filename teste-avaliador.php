<?php

use Raquel\Leilao\Model\Lance;
use Raquel\Leilao\Model\Leilao;
use Raquel\Leilao\Model\Usuario;
use Raquel\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

// Arrange - Given
// Arrumo a casa para o teste
$leilao = new Leilao('Fiat 147 0km');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();

// Act - When
// Executo o código a ser testado
$leiloeiro->avaliar($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

// Assert - Then
// Verifico se a saída é a esperada
$valorEsperado = 2500;

if ($valorEsperado == $maiorValor) {
    echo "TESTE OK\n";
} else {
    echo "TESTE FALHOU\n";
}