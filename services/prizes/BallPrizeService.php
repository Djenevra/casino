<?php


namespace app\services\prizes;

use app\models\prizes\BallPrize;

class BallPrizeService implements UnlimitedPrizeInterface {

    /**
     * Ball model.
     *
     * @var BallPrize
     */
    private $_ballPrize;

    /**
     * BallPrizeService constructor.
     */
    public function __construct()
    {
        $this->_ballPrize = new BallPrize();
    }

    /**
     * returns title of ball prize.
     */
    public function title()
    {
        return $this->_ballPrize->title;
    }

    /**
     * @params float $amount
     * @returns float amount of ball prize.
     */
    private function setAmount($amount)
    {
        $this->_ballPrize->amount = $amount;
    }

    /**
     * returns ball prize.
     */
    public function getPrize()
    {
        $this->_ballPrize = $this->_ballPrize->findById($this->_ballPrize->getId());
        $this->setAmount(mt_rand(1, 1000));
       return $this->_ballPrize;
    }
}
