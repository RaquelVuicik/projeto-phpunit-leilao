<?php

namespace Raquel\Leilao\Service;

use Raquel\Leilao\Model\Lance;
use Raquel\Leilao\Model\Leilao;

class Avaliador
{
    private $maiorValor = -INF;
    private $menorValor = INF;
    private $maioresLances;
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

        $lances = $leilao->getLances();
        usort($lances, function (Lance $lance1, Lance $lance2) {
            return $lance2->getValor() - $lance1->getValor();
        });
        $this->maioresLances = array_slice($lances, 0, 3);
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

    /**
     * @return mixed
     */
    public function getMaioresLances(): array
    {
        return $this->maioresLances;
    }
}