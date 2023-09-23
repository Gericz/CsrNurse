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

    <?= $form->field($model, 'enccode')->textInput(['id' => 'enccode', 'maxlength' => true, 'readonly' => true]) ?>


    <!-- Using the datalist for patient input -->
    <label for="patient">Patient</label>

    <input list="patients" id="patient" class="form-control" name="patient" placeholder="Type to search...">
    <datalist id="patients">
    <?php foreach ($dataFromDatabase as $hperson): ?>
    <option value="<?= htmlspecialchars($hperson->patlast . ' ' . $hperson->patfirst . ' ' . $hperson->patmiddle) ?>">
<?php endforeach; ?>

    </datalist>

    <?= $form->field($model, 'dateadmitted')->dropDownList([], ['id' => 'dateadmitted']) ?>


   
    <?= $form->field($model, 'status')->hiddenInput(['value' => 1 ])->label(false) ?>

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
<script>
    const patientInput = document.getElementById('patient');
    const enccodeInput = document.getElementById('enccode');
    const dateAdmittedSelect = document.getElementById('dateadmitted');

   if (enccodeInput && patientInput) {
        console.log("enccodeInput found:", enccodeInput);

        patientInput.addEventListener('change', function() {
            console.log("Change event triggered");
            const selectedPatient = patientInput.value;
            console.log("Patient input:", selectedPatient); // Log the patient input value
            const patientNameParts = selectedPatient.split(' ');

            // Assuming the order is patlast, patfirst, patmiddle
            const patlast = patientNameParts[0];
            const patfirst = patientNameParts[1];
            const patmiddle = patientNameParts[2];
            // Fetch the dateadmitted options from the henctr table
            const url = '<?= Url::to(['default/get-date-admitted-options']) ?>';
            fetch(`${url}&patlast=${patlast}&patfirst=${patfirst}&patmiddle=${patmiddle}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Fetched dateadmitted options:", data);
                    dateAdmittedSelect.innerHTML = ''; // Clear existing options
                    data.forEach(option => {
                        const optionElem = document.createElement('option');
                        optionElem.value = option;
                        optionElem.textContent = option;
                        dateAdmittedSelect.appendChild(optionElem);
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            const encUrl = '<?= Url::to(['default/get-enc-code']) ?>';
            fetch(`${encUrl}&patlast=${patlast}&patfirst=${patfirst}&patmiddle=${patmiddle}`)
                .then(response => response.text())
                .then(data => {
                    console.log("Fetched data:", data);
                    enccodeInput.value = data; // Update the enccode input field
                    patientInput.value = selectedPatient; // Update the patient input field
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    } else {
        console.error("enccodeInput not found");
    }
</script>