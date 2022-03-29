<?php

namespace app\controllers;

use app\models\prizes\MoneyPrize;
use app\services\ConvertMoneyToBallService;
use app\services\GiveOutPrizeService;
use app\services\PlayService;
use app\services\WinService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'signup', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays win page.
     *
     * @return string
     */
    public function actionPlay()
    {
        $playService = new PlayService();
        $model = $playService->shufflePrizes();
        return $this->render('win', [
            'model' => $model,
        ]);
    }

    /**
     * returns prize.
     *
     * @return string
     */
    public function actionGetPrize()
    {
        $request = Yii::$app->request;
        $prizeId = $request->get('id');
        $prizeType = $request->get('type');
        $amount = $request->get('amount');
        $giveOutPrizeService = new GiveOutPrizeService();
        $model = $giveOutPrizeService->giveOutPrize($prizeId, $prizeType, $amount);
        return $this->render('congrats', [
            'model' => $model
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionConvertMoneyToBall()
    {
        $request = Yii::$app->request;
        $moneyPrizeId = $request->get('id');
        $prizeType = $request->get('type');
        $amount = $request->get('amount');
        $convertMoneyToBallService = new ConvertMoneyToBallService();
        $model = $convertMoneyToBallService->convertMoneyToBall($moneyPrizeId, $prizeType, $amount);
        return $this->render('congrats', [
            'model' => $model
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionRefuse()
    {
        $request = Yii::$app->request;
        $prizeId = $request->get('id');
        $prizeType = $request->get('type');
        $amount = $request->get('amount');
        $win = new WinService();
        $winProps = [
            'user_id' => Yii::$app->user->id,
            'status' => 'refused',
            'prize_id' => $prizeId,
            'amount' => $amount,
            'type' => $prizeType,
        ];
        $win->createWin($winProps, $model);
        return $this->render('refuse');
    }
}
