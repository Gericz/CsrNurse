<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Brlst $model */

$this->title = $model->brlst_id;
$this->params['breadcrumbs'][] = ['label' => 'Brlsts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="brlst-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'brlst_id' => $model->brlst_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'brlst_id' => $model->brlst_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'brlst_id',
            'patient',
            'Date admitted',
            'status',
            'linen',
            'remarks'
        ],
    ]) ?>

</div>
