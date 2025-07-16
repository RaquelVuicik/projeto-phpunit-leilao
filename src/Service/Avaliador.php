<?php

namespace Raquel\Leilao\Service;

use Raquel\Leilao\Model\Leilao;

class Avaliador
{
    private $maiorValor = -INF;
    private $menorValor = INF;
    public function avaliar(Leilao  $leilao): void
    {
        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }

            if ($lance->getValor() < $this->menorValor) {
                $this->menorValor = $lance->getValor();
            }
        }
    }

    /**
     * @return mixed
     */
    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }

    /**
     * @return int
     */
    public function getMenorValor(): float
    {
        return $this->menorValor;
    }
}