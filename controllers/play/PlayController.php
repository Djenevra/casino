<?php

namespace app\controllers\play;

use app\services\PlayService;
use yii\web\Controller;



class PlayController extends Controller
{
    /**
     * Displays about page.
     *
     * @return string
     */
    public static function actionPlay()
    {
        $playService = new PlayService();
        $playService->shufflePrizes();
    }
}



