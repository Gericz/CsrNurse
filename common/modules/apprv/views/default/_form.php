<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Apprv $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="apprv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enccode')->textInput() ?>

    <?= $form->field($model, 'patient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateadmitted')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'daterequested')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateapproved')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
