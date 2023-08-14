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


?>
<div class="brlst-form">
    <?php $form = ActiveForm::begin(); ?>

    <!-- Your form fields here -->

    <?php ActiveForm::end(); ?>

    <div class="table-container">
        <h2>Table of Data</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ENCode</th>
                    <th>PATLast</th>
                    <th>PATFirst</th>
                    <th>PATMiddle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataFromDatabase as $row): ?>
                    <tr>
                        
                        <td><?= $row['hpercode'] ?></td>
                        <td><?= $row['patlast'] ?></td>
                        <td><?= $row['patfirst'] ?></td>
                        <td><?= $row['patmiddle'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
