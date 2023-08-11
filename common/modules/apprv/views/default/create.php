<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Apprv $model */

$this->title = 'Create Apprv';
$this->params['breadcrumbs'][] = ['label' => 'Apprvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apprv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
