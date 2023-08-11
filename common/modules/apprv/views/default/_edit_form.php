<?php
use common\models\Linen;
use common\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$statusList = Status::find()->where(['name' => 'approved'])->all();

// Use ArrayHelper::map to create an associative array of 'name' => 'name'
$statusNames = ArrayHelper::map($statusList, 'name', 'name');

// Assuming you have an Apprv model with attributes like enccode, patient, etc.
$form = ActiveForm::begin(['action' => ['apprv/save-edited', 'brlst_id' => $model->brlst_id]]);
echo $form->field($model, 'brlst_id')->hiddenInput()->label(false);
echo $form->field($model, 'enccode')->label();
echo $form->field($model, 'patient')->label();
echo $form->field($model, 'dateadmitted')->textInput();
echo $form->field($model, 'status')->dropDownList(
    $statusNames,
    ['prompt' => 'Select Status']
    );
echo $form->field($model, 'linen')->dropDownList(
    ArrayHelper::map(Linen::find()->all(), 'color', 'color'),
    ['prompt' => 'Select Linen']
    );
echo $form->field($model, 'daterequested')->textInput();
echo $form->field($model, 'remarks')->textInput();

echo Html::submitButton('Save', ['class' => 'btn btn-success']);
ActiveForm::end();
?>
