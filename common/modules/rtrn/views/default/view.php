<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Rtrn $model */

$this->title = $model->rtrn_id;
$this->params['breadcrumbs'][] = ['label' => 'Rtrns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rtrn-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rtrn_id' => $model->rtrn_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rtrn_id' => $model->rtrn_id], [
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
            'rtrn_id',
            'apprv_id',
            'brlst_id',
            'enccode',
            'patient',
            'dateadmitted',
            'status',
            'linen',
            'daterequested',
            'remarks',
            'dateapproved',
        ],
    ]) ?>

</div>
