<?php
use common\models\Linen;
use common\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;



// Assuming you have an Apprv model with attributes like enccode, patient, etc.
$form = ActiveForm::begin(['action' => ['apprv/save-edited', 'brlst_id' => $model->brlst_id]]);
echo $form->field($model, 'brlst_id')->hiddenInput()->label(false);
echo $form->field($model, 'enccode')->textInput(['readonly'=> true]);
echo $form->field($model, 'patient')->textInput(['readonly'=> true]);
echo $form->field($model, 'dateadmitted')->textInput(['readonly' => true]);
echo $form->field($model, 'status')->hiddenInput(['value' => 1 ])->label(false);

echo $form->field($model, 'linen')->dropDownList(
    ArrayHelper::map(Linen::find()->all(), 'color', 'color'),
    ['prompt' => 'Select Linen']
    );
echo $form->field($model, 'daterequested')->textInput(['readonly' => true]);
echo $form->field($model, 'remarks')->textInput(['readonly'=> true]);
echo $form->field($model, 'dateapproved')->textInput(['readonly' => true]);

echo Html::submitButton('Save', ['class' => 'btn btn-success']);
ActiveForm::end();
?>
