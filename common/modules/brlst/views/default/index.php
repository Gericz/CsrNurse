<?php

use common\models\Brlst;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Linen Borrower System';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brlst-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Select Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'enccode',
            //'brlst_id',
            'patient',
            'dateadmitted',
            'status',
            'linen',
            'daterequested',
            'remarks',
          
        ],
    ]); ?>


</div>
