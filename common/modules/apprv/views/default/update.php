<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Apprv $model */

$this->title = 'Update Apprv: ' . $model->aprrv_id;
$this->params['breadcrumbs'][] = ['label' => 'Apprvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aprrv_id, 'url' => ['view', 'aprrv_id' => $model->aprrv_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apprv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
