<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Apprv $model */

$this->title = $model->aprrv_id;
$this->params['breadcrumbs'][] = ['label' => 'Apprvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="apprv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'aprrv_id' => $model->aprrv_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'aprrv_id' => $model->aprrv_id], [
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
            'aprrv_id',
            'enccode',
            'patient',
            'dateadmitted',
            'status',
            'daterequested',
            'remarks',
            'dateapproved',
        ],
    ]) ?>

</div>
