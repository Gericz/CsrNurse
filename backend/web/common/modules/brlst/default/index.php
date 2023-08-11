<?php

use common\models\Brlst;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Brlsts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brlst-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Brlst', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'brlst_id',
            'enccode',
            'patient',
            'dateadmitted',
            'status',
            //'linen',
            //'daterequested',
            //'remarks',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Brlst $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'brlst_id' => $model->brlst_id]);
                 }
            ],
        ],
    ]); ?>


</div>
