<?php

use common\models\Rtrn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Return Linen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rtrn-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'rtrn_id',
            //'apprv_id',
            //'brlst_id',
            'enccode',
            'patient',
            'dateadmitted',
            'status',
            'linen',
            'daterequested',
            'remarks',
            'dateapproved',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{move-to-rtrn}',
                'buttons' => [
                    'move-to-apprv' => function ($url, $model, $key) {
                        return yii\helpers\Html::a('Return', '#', [
                            'class' => 'btn btn-primary',
                            'data-bs-toggle' => 'modal',
                            'data-bs-target' => '#editModal' . $model->rtrn_id, // Unique modal ID
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
