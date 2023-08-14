<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Rtrn $model */

$this->title = 'Update Rtrn: ' . $model->rtrn_id;
$this->params['breadcrumbs'][] = ['label' => 'Rtrns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rtrn_id, 'url' => ['view', 'rtrn_id' => $model->rtrn_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rtrn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
