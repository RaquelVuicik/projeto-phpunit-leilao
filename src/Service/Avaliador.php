<?php

namespace Raquel\Leilao\Service;

use Raquel\Leilao\Model\Leilao;

class Avaliador
{
    private $maiorValor;
    public function avaliar(Leilao  $leilao): void
    {
        $lances = $leilao->getLances();
        $ultimoLance = $lances[count($lances) - 1];
        $this->maiorValor = $ultimoLance->getValor();
    }

    /**
     * @return mixed
     */
    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }
}