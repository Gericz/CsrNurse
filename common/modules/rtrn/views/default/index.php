<?php

use common\models\Rtrn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
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
            //'status',
            'linen',
            'daterequested',
            'remarks',
            'dateapproved',
            'datertrned',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{move-to-rtrn}',
                'buttons' => [
                    'move-to-rtrn' => function ($url, $model, $key) {
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


<!-- Modal for editing data -->
<?php foreach ($dataProvider->models as $model): ?>
    <?php Modal::begin([
        'id' => 'editModal' . $model->rtrn_id,
        'title' => 'Return Request',
        'size' => Modal::SIZE_LARGE, // Optional: You can adjust the size as needed
    ]); ?>
    <div>
        <!-- Render your edit form here -->
        <?= $this->render('_rtrn_form', ['model' => $model]) ?>
    </div>
    <?php Modal::end(); ?>
<?php endforeach; ?>
</div>
