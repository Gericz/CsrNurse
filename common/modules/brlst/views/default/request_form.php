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
$this->params['breadcrumbs'][] = $this->title;

$statusList = Status::find()->where(['name' => 'request'])->all();

// Use ArrayHelper::map to create an associative array of 'name' => 'name'
$statusNames = ArrayHelper::map($statusList, 'name', 'name');
?>

<div class="brlst-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enccode')->textInput(['id' => 'enccode', 'maxlength' => true]) ?>


    <!-- Using the datalist for patient input -->
    <label for="patient">Patient</label>

    <input list="patients" id="patient" class="form-control" name="patient" placeholder="Type to search...">
    <datalist id="patients">
        <?php foreach ($suggestedData as $name): ?>
            <option value="<?= htmlspecialchars($name) ?>">
        <?php endforeach; ?>
    </datalist>

    <?= $form->field($model, 'dateadmitted')->textInput(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'status')->dropDownList(
    $statusNames,
    ['prompt' => 'Select Status']
) ?>

    <?= $form->field($model, 'linen')->dropDownList(
        ArrayHelper::map(Linen::find()->all(), 'color', 'color'),
        ['prompt' => 'Select Linen']
    ) ?>

<?= $form->field($model, 'daterequested')->textInput(['maxlength' => true]) ?>
	 <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>
	 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<script>
    const patientInput = document.getElementById('patient');
    const enccodeInput = document.getElementById('enccode');

   if (enccodeInput) {
        console.log("enccodeInput found:", enccodeInput);

        patientInput.addEventListener('change', function() {
            console.log("Change event triggered");
            const selectedPatient = patientInput.value;
            const patientNameParts = selectedPatient.split(' ');

            // Assuming the order is patlast, patfirst, patmiddle
            const patlast = patientNameParts[0];
            const patfirst = patientNameParts[1];
            const patmiddle = patientNameParts[2];

            const url = '<?= Url::to(['default/get-enc-code']) ?>';
            fetch(`${url}&patlast=${patlast}&patfirst=${patfirst}&patmiddle=${patmiddle}`)
                .then(response => response.text())
                .then(data => {
                    console.log("Fetched data:", data);
                    enccodeInput.value = data; // Update the enccode input field
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    } else {
        console.error("enccodeInput not found");
    }
</script>