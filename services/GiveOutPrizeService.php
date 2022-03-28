<?php

namespace app\services;

use app\models\Delivery;
use app\models\prizes\Prize;
use app\models\User;
use app\services\WinService;
use app\services\prizes\LimitedPrizeInterface;
use app\services\prizes\PrizeService;
use app\services\prizes\UnlimitedPrizeInterface;
use Exception;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\Model;

class GiveOutPrizeService {

    private $_userId;

    /**
     * GiveOutPrizeService constructor.
     *
     */
    public function __construct () {

        $this->userId = Yii::$app->user->id;
    }

    /**
     * GiveOutPrizeService constructor.
     *
     *
     */
    public function giveOutPrize($prizeId, $prizeType, $amount) {

        $win = new WinService();
        $user = new User();
        $winId = null;
        $model = new Model();
        $deliveryProps = [
            'user_id' => Yii::$app->user->id,
            'status' => 'not delivered'

        ];
        $winProps = [
            'user_id' => Yii::$app->user->id,
            'status' => 'taken',
            'prize_id' => $prizeId,
            'amount' => $amount,
            'type' => $prizeType
        ];
        $transaction = Yii::$app->db->beginTransaction();

        switch ($prizeType) {
            case 'ball';
                try {
                    $result = $user->updateBall($this->userId, $amount);
                    $winProps['title'] = 'ball';
                    if ( $result ) {
                        $result = $win->createWin($winProps, $model);
                    }
                    $transaction->commit();
                } catch (Exception $exception) {
                    $transaction->rollBack();
                }

                break;
            case 'prize';
                try {
                    $winProps['title'] = Prize::getTitle($prizeId);
                    $result = $win->createWin($winProps, $model);
                    if ( $result ) {
                        $deliveryProps['win_id'] = $winId;
                        $delivery = new DeliveryService();
                        $delivery->createDelivery($deliveryProps);
                    }
                    $transaction->commit();
                } catch (Exception $exception) {
                    $transaction->rollBack();
                }
                break;
        }
        return $model;
    }
}
