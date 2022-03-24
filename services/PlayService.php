<?php

namespace app\services;

use app\services\prizes\BallPrizeService;
use app\services\prizes\LimitedPrizeInterface;
use app\services\prizes\PrizeService;
use app\services\prizes\MoneyPrizeService;

class PlayService {

    /**
     * BallService.
     *
     * @var BallPrizeService
     */
    private $_ballPrizeService;

    /**
     * PrizeService.
     *
     * @var PrizeService
     */
    private $_prizeService;

    /**
     * MoneyService.
     *
     * @var MoneyPrizeService
     */
    private $_moneyPrizeService;

    /**
     * limitedPrizesServiceArray.
     *
     * @var LimitedPrizeInterface
     */
    private $_limitedPrizesServicesArray;

    /**
     * unlimitedPrizesServiceArray.
     *
     * @var LimitedPrizeInterface
     */
    private $_unlimitedPrizesServicesArray;

    /**
     * BallPrizeService constructor.
     *
     *
     */
    public function __construct()
    {
        $this->_ballPrizeService = new BallPrizeService();
        $this->_prizeService = new PrizeService();
        $this->_moneyPrizeService = new MoneyPrizeService();
        $this->_limitedPrizesServicesArray = [$this->_prizeService, $this->_moneyPrizeService];
        $this->_unlimitedPrizesServicesArray = [$this->_ballPrizeService];
    }

    /**
     * collects limited prizes array.
     */
    private function getLimitedPrizes ()
    {
        $limitedPrizesArray = [];
        foreach ($this->_limitedPrizesServicesArray as $limitedPrizeItem) {
           $limitedPrizesArray[] = $limitedPrizeItem->getPrize();
        }
        return $limitedPrizesArray;
    }

    /**
     * collects unlimited prizes array.
     */
    private function getUnLimitedPrizes ()
    {
        $unlimitedPrizesArray = [];
        foreach ($this->_unlimitedPrizesServicesArray as $unlimitedPrizeItem) {
            $unlimitedPrizesArray[] = $unlimitedPrizeItem->getPrize();
        }
        return $unlimitedPrizesArray;
    }

    public function shufflePrizes() {
        $prizes = array_merge($this->getLimitedPrizes(), $this->getUnLimitedPrizes());
        $prize = $prizes[array_rand($this->getLimitedPrizes())];
//        var_dump('PRIZES', $prizes, 'PRIZE', $prize); die;
        return $prize;
    }
}
