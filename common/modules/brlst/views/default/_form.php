<?php

use common\models\Status;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Linen;
use kartik\select2\Select2;


/** @var yii\web\View $this */
/** @var common\models\Brlst $model */
/** @var yii\widgets\ActiveForm $form */

$statusList = Status::find()->where(['name' => 'request'])->all();

// Use ArrayHelper::map to create an associative array of 'name' => 'name'
$statusNames = ArrayHelper::map($statusList, 'name', 'name');
?>

<div class="brlst-form">

    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'enccode')->textInput(['maxlength' => true]) ?>

    <!-- $form->field($model, 'patient')->textInput(['maxlength' => true]) -->
    <?= $form->field($model, 'patient')->textInput([
    'maxlength' => true,
    'value' => $patlast . ' ' . $patfirst . ' ' . $patmiddle,
]) ?>

    <?= $form->field($model, 'dateadmitted')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'status')->dropDownList(
    $statusNames,
    ['prompt' => 'Select Status']
) ?>

    <?= $form->field($model, 'linen')->dropDownList(
        ArrayHelper::map(Linen::find()->all(), 'color', 'color'),
        ['prompt' => 'Select Linen']
    ) ?>

  <?= $form->field($model, 'daterequested')->hiddenInput()->label(false) ?>
	 <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>
	 
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
