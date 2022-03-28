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
/* @var $model  */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Casino';
//$this->params['breadcrumbs'][] = ['label' => 'Выигрыш', 'url' => ['win']];
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h5 class="display-4"> Выигрыш </h5>

        <p class="lead"></p>

        <?=
        DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'title',
                'amount',
            ],
        ]) ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5">


            </div>
        </div>

    </div>
</div>
