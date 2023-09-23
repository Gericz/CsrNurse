<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url; 
use yii\widgets\ActiveForm;
use common\models\Status;
use yii\helpers\ArrayHelper;
use common\models\Linen;

/* @var $this yii\web\View */
/* @var $model common\models\Brlst */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Nurse Request';
$this->params['breadcrumbs'][] = ['label' => 'Nurse Request', 'url' => ['index']]; // Update breadcrumb as needed
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="brlst-form">
<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'enccode')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'patient')->textInput(['maxlength' => true]) ?>

<!-- Add more form fields as needed -->

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>