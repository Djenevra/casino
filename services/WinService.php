<?php

namespace app\services;

use app\models\prizes\Prize;
use app\models\Win;
use app\services\prizes\LimitedPrizeInterface;

class WinService
{

    /**
     * @params array $win
     * @returns int id of newly created win model
     */
    public function createWin($win, &$model = null): bool
    {

        $model = new Win($win);
        $model->title;
        if ($result = $model->save()) {
            $model = $model;
        }
        return $result;
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
        } else {
            return self::getPrize();
        }
    }
}
