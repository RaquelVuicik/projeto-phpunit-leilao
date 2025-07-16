<?php

namespace Raquel\Leilao\Tests\Service;

use PHPUnit\Framework\TestCase;
use Raquel\Leilao\Model\Lance;
use Raquel\Leilao\Model\Leilao;
use Raquel\Leilao\Model\Usuario;
use Raquel\Leilao\Service\Avaliador;

class AvaliadorTest extends TestCase
{
    public function testeAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemCrescente()
    {
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
        self::assertEquals(2500, $maiorValor);
    }

    public function testeAvaliadorDeveEncontrarOMaiorValorDeLancesEmOrdemDecrescente()
    {
        // Arrange - Given
        // Arrumo a casa para o teste
        $leilao = new Leilao('Fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        // Act - When
        // Executo o código a ser testado
        $leiloeiro->avaliar($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        // Assert - Then
        self::assertEquals(2500, $maiorValor);
    }

    public function testeAvaliadorDeveEncontrarOMenorValorDeLancesEmOrdemDecrescente()
    {
        // Arrange - Given
        // Arrumo a casa para o teste
        $leilao = new Leilao('Fiat 147 0km');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        // Act - When
        // Executo o código a ser testado
        $leiloeiro->avaliar($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        // Assert - Then
        self::assertEquals(2000, $menorValor);
    }

    public function testeAvaliadorDeveEncontrarOMenorValorDeLancesEmOrdemCrescente()
    {
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

        $menorValor = $leiloeiro->getMenorValor();

        // Assert - Then
        self::assertEquals(2000, $menorValor);
    }
}