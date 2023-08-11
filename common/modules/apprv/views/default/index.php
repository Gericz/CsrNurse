<?php

use common\models\Apprv;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Brlst;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Linen Borrow System';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apprv-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'enccode',
        'brlst_id',
        'patient',
        'dateadmitted',
        'status',
        'linen',
        'daterequested',
        'remarks',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{move-to-apprv}',
            'buttons' => [
                'move-to-apprv' => function ($url, $model, $key) {
                    return yii\helpers\Html::a('Approve', '#', [
                        'class' => 'btn btn-primary',
                        'data-bs-toggle' => 'modal',
                        'data-bs-target' => '#editModal' . $model->apprv_id, // Unique modal ID
                    ]);
                },
            ],
        ],
    ],
]); ?>


	<!-- Modal for editing data -->
<?php foreach ($dataProvider->models as $model): ?>
    <?php Modal::begin([
        'id' => 'editModal' . $model->apprv_id,
        'title' => 'Approve Request',
        'size' => Modal::SIZE_LARGE, // Optional: You can adjust the size as needed
    ]); ?>
    <div>
        <!-- Render your edit form here -->
        <?= $this->render('_edit_form', ['model' => $model]) ?>
    </div>
    <?php Modal::end(); ?>
<?php endforeach; ?>
</div>
