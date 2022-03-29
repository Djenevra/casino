<?php

namespace app\services\prizes;

use app\models\prizes\MoneyPrize;
use app\services\prizes\LimitedPrizeInterface;
use yii\base\Model;

class MoneyPrizeService implements LimitedPrizeInterface {

    /**
     * MoneyPrize model.
     *
     * @var MoneyPrize
     */
    private $_moneyPrize;

    /**
     * MoneyPrizeService constructor.
     *
     *
     */
    public function __construct()
    {
        $this->_moneyPrize = new MoneyPrize();
    }

    /**
     * @params float $amount
     * @returns float amount of money prize.
     */
    private function setAmount($amount)
    {
        $this->_moneyPrize->amount = $amount;
    }

    /**
     * returns prize if total is positive.
     * @return MoneyPrize
     */
    public function getPrize(): MoneyPrize
    {
        $this->_moneyPrize = $this->_moneyPrize->findById($this->_moneyPrize->getId());
        if ($this->_moneyPrize->total > 0) {
            $this->setAmount(mt_rand(1, $this->_moneyPrize->total));
            return $this->_moneyPrize;
        }
        else {
            return self::getPrize();
        }
    }

    public function reduceTotal ($moneyPrizeId, $amount): bool
    {
        $money = $this->_moneyPrize->findById($moneyPrizeId);
        $money->total = $money->total - $amount;
       return  $money->save();;
    }
}
