<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Rtrn $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rtrn-form">

    <?php $form = ActiveForm::begin(['action' => ['rtrn/save-edited', 'apprv_id' => $model->apprv_id]]); ?>

    <?= $form->field($model, 'enccode')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'patient')->textInput(['readonly'=> true]) ?>

    <?=  $form->field($model, 'dateadmitted')->textInput(['readonly' => true])?>

    <?= $form->field($model, 'status')->hiddenInput(['value' => 1])->label(false); ?>
    
    <?= $form->field($model, 'linen')->textInput(['readonly'=> true])?>

    <?=$form->field($model, 'daterequested')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'dateapproved')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'datertrned')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
