<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Brlst $model */

$this->title = 'Update Brlst: ' . $model->brlst_id;
$this->params['breadcrumbs'][] = ['label' => 'Brlsts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->brlst_id, 'url' => ['view', 'brlst_id' => $model->brlst_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brlst-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
