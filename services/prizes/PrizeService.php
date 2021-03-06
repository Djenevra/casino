<?php

namespace app\services\prizes;

use app\models\prizes\Prize;
use app\services\prizes\LimitedPrizeInterface;

class PrizeService implements LimitedPrizeInterface
{

    /**
     * Prize model.
     *
     * @var Prize
     */
    private $_prize;

    /**
     * PrizeService constructor.
     *
     *
     */
    public function __construct()
    {
        $this->_prize = new Prize();
    }

    /**
     * @params float $amount
     * @returns float amount of prize.
     */
    private function setAmount($amount)
    {
        $this->_prize->amount = $amount;
    }

    /**
     * @params int $prizeId, int $amount
     * @returns bool if total is reduced.
     */
    public function reduceTotal($prizeId, int $amount): bool
    {
        $prize = Prize::findById($prizeId);
        $prize->total = $prize->total - $amount;
        $prize->save();
        return $prize->save();
    }

    /**
     * returns prize if total is positive.
     * @return Prize
     */
    public function getPrize(): Prize
    {
        $this->_prize = $this->_prize->getRandomPrize();
        if ($this->_prize->total > 0) {
            $this->setAmount(1);
            return $this->_prize;
        }
        else {
         return self::getPrize();
        }
    }
}
