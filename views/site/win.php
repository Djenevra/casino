<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/* @var $this yii\web\View */
/* @var $model  */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Casino';
$this->params['breadcrumbs'][] = ['label' => 'Выигрыш', 'url' => ['win']];
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
        <p>
            <p id="get" style="visibility: hidden"><?= Html::a('Забрать', ['get-prize', 'type'=>$model->type, 'id'=>$model->id, 'amount'=> $model->amount], ['class' => 'btn btn-success',]) ?></p>
        <p id="transfer-to-an-account" style="visibility: hidden"><?= Html::a('Перевести на счет', ['play'], ['class' => 'btn btn-success']) ?></p>
        <p id="convert-to-ball" style="visibility: hidden"><?= Html::a('Конвертировать в баллы', ['convert-money-to-ball', 'type'=>$model->type, 'id'=>$model->id, 'amount'=> $model->amount], ['class' => 'btn btn-success']) ?></p>
        <p id="decline" style="visibility: hidden"><?= Html::a('Отказаться', ['refuse', 'type'=>$model->type, 'id'=>$model->id, 'amount'=> $model->amount], ['class' => 'btn btn-success']) ?></p>
        </p>
        <script>
            if ('<?= $model->type?>' === 'money') {
                document.getElementById('transfer-to-an-account').style.visibility = "visible";
                document.getElementById('convert-to-ball').style.visibility = "visible";
                document.getElementById('decline').style.visibility = "visible";
            } else {
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
