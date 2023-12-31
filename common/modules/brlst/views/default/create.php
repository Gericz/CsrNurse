<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Brlst $model */

$this->title = 'Borrow';
$this->params['breadcrumbs'][] = ['label' => 'Brlsts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brlst-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('request_form', [
        'model' => $model,
        'suggestedData' => $suggestedData,
        'dataFromDatabase' => $dataFromDatabase,
    ]) ?>

</div>
