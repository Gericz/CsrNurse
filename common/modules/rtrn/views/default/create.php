<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Rtrn $model */

$this->title = 'Create Rtrn';
$this->params['breadcrumbs'][] = ['label' => 'Rtrns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rtrn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
