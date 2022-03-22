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
/* @var $model  User*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Casino';
$this->params['breadcrumbs'][] = ['label' => 'Мой баланс', 'url' => ['index']];
$model = User::findOne(['id' => Yii::$app->user->id]);
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h5 class="display-4"> Мой баланс </h5>

        <p class="lead"></p>

        <?= DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'ball',
            ],
        ]) ?>

        <?php Pjax::begin(); ?>
        <p>
            <?= Html::a('Играть', ['play'], ['class' => 'btn btn-success']) ?>
        </p>
        <?
        //        $model = new PlayController();
//        $dataProvider = new ActiveDataProvider([
//            'query' => PlayController::actionPlay(),
//        ]);
//        echo GridView::widget([
//            'dataProvider' => $dataProvider,
//        ]);
//        ?>
        <?php Pjax::end(); ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-5">


            </div>
        </div>

    </div>
</div>


<?php
//
//use yii\helpers\Html;
//use yii\widgets\DetailView;
//
///* @var $this yii\web\View */
///* @var $model app\models\location\location\Location */
//
//$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('location', 'Locations'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
//?>
<!--<div class="location-view">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?//= Html::a(Yii::t('location', 'Update'), ['update', 'id' => (string)$model->_id],
//            ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a(Yii::t('location', 'Delete'), ['delete', 'id' => (string)$model->_id], [
//            'class' => 'btn btn-danger',
//            'data'  => [
//                'confirm' => Yii::t('location', 'Are you sure you want to delete this item?'),
//                'method'  => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<!---->
<!--    --><?//= DetailView::widget([
//        'model'      => $model,
//        'attributes' => [
//            '_id',
//            'code',
//            'name',
//        ],
//    ]) ?>
<!---->
<!--    <pre>-->
<!--    --><?php
//    print_r($model);
//    ?>
<!--  </pre>-->
<!---->
<!--</div>-->
