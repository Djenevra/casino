<?php

use app\controllers\play\PlayController;
use app\models\User;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\data\ActiveDataProvider;

/** @var yii\web\View $this */
/* @var $this yii\web\View */
/* @var $model    */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Casino';
$this->params['breadcrumbs'][] = ['label' => 'Выигрыш', 'url' => ['win']];
//$model = User::findOne(['id' => Yii::$app->user->id]);
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h5 class="display-4"> Выигрыш </h5>

        <p class="lead"></p>

        <?= DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'title',
                'amount',
            ],
        ]) ?>

<!--        --><?php //Pjax::begin(); ?>
        <p>
        <p id="get" style="visibility: hidden"><?= Html::a('Забрать', ['play'], ['class' => 'btn btn-success']) ?></p>
        <p id="transfer-to-an-account" style="visibility: hidden"><?= Html::a('Перевести на счет', ['play'], ['class' => 'btn btn-success']) ?></p>
        <p id="convert-to-ball" style="visibility: hidden"><?= Html::a('Конвертировать в баллы', ['play'], ['class' => 'btn btn-success']) ?></p>
        <p id="decline" style="visibility: hidden"><?= Html::a('Отказаться', ['play'], ['class' => 'btn btn-success']) ?></p>
        </p>
        <script>
            if((<?= $model->type == 'money'?>)) {
                console.log('money');
                document.getElementById('transfer-to-an-account').style.visibility = "visible";
                document.getElementById('convert-to-ball').style.visibility = "visible";
                document.getElementById('decline').style.visibility = "visible";
            }
            if((<?= $model->type == 'ball' || $model->type == 'prize'?>)){
                console.log('ball');
                document.getElementById('get').style.visibility = "visible";
                document.getElementById('decline').style.visibility = "visible";
            }
        </script>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5">


            </div>
        </div>

    </div>
</div>
