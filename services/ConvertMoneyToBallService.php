<?php

namespace app\services;

use app\models\prizes\MoneyPrize;
use app\models\User;
use app\services\prizes\MoneyPrizeService;
use Yii;
use yii\base\Model;

class ConvertMoneyToBallService {

    /**
     * Displays about page.
     *
     */
    public function convertMoneyToBall ($moneyPrizeId, $type, $amount) {

        $model = new Model();
        $moneyPrizeService = new MoneyPrizeService();
        $moneyPrizeService->reduceTotal($moneyPrizeId, $amount);
        $amountWithCoefficient = $this->getAmountWithCoefficient($amount);
        $user = new User();
        $user->updateBall(Yii::$app->user->id, $amountWithCoefficient);
        $win = new WinService();
        $winProps = [
            'user_id' => Yii::$app->user->id,
            'status' => 'converted to ball',
            'prize_id' => $moneyPrizeId,
            'amount' => $amount,
            'type' => $type,
            'title' => MoneyPrize::getTitle($moneyPrizeId)
        ];
        $win->createWin($winProps, $model);
        return $model;
    }

    /**
     * @param int $amount
     * @return float|int
     */
    public function getAmountWithCoefficient(int $amount) {
        $coefficient = Yii::$app->params['coefficient'];
        return $amount * $coefficient;
    }
}
