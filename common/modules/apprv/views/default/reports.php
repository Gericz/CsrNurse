<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Apprv;
use common\models\Brlst;
use common\models\Rtrn;

/** @var yii\web\View $this */
/** @var common\models\Apprv $model */

$this->title = 'Requested Linen Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/adphicon.ico" type="image/x-icon" />
</head>
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/styles.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h1><?= Html::encode($this->title) ?></h1>

<canvas id="linenUsageChart" width="400" height="200"></canvas>
<canvas id="linenColorDistributionChart" width="400" height="200"></canvas>

<?php
$totalLinen = 20; // Your total linen count
$requestedCount = Brlst::find()->where(['status' => 1])->count(); // Requested linen
$issuedCount = Apprv::find()->where(['status' => 1])->count(); // Issued linen
$returnedCount = Rtrn::find()->where(['status' => 1])->count(); // Returned linen

// Calculate the available linen count
$availableLinen = $totalLinen - ($issuedCount - $returnedCount) ;
$requestedCount1 = $requestedCount - $issuedCount;
$issuedCount1 = $issuedCount - $returnedCount;


// Sample data for linen usage over time
$linenColors = ['Pink', 'Pink', 'Yellow', 'White'];
// Fetch and count data based on linen color
$usageData = Apprv::find()
    ->select(['linen', 'COUNT(*) AS count'])
    ->groupBy('linen')
    ->having(['<=', 'COUNT(*)', $totalLinen]) // Use HAVING instead of WHERE
    ->orderBy(['count' => SORT_DESC]) // Order by count in descending order
    ->asArray()
    ->all();

// Transform the data for charting
$usageLabels = [];
$usageCounts = [];
foreach ($usageData as $entry) {
    $usageLabels[] = $entry['linen'];
    $usageCounts[] = $entry['count'];
}
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Type</th>
            <th>Count</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Linen Requested</td>
            <td><?= $requestedCount1 ?></td>
        </tr>
        <tr>
            <td>Linen Issued</td>
            <td><?= $issuedCount ?></td>
        </tr>
        <tr>
            <td>Linen Returned</td>
            <td><?= $returnedCount ?></td>
        </tr>
        <tr>
            <td>Available Linen</td>
            <td><?= $availableLinen ?></td>
        </tr>
    </tbody>
</table>


<script>
// Sample data for linen usage over time
const usageData = {
    labels: <?= json_encode($usageLabels) ?>,
    datasets: [{
        label: 'Linen Usage',
        data: <?= json_encode($usageCounts) ?>,
        backgroundColor: ['green', 'pink', 'yellow', 'white'], // Set colors based on linen colors
    }],
};

// Create the bar chart
const usageCtx = 'linenUsageChart';
const linenUsageChart = new Chart(document.getElementById(usageCtx).getContext('2d'), {
    type: 'bar',
    data: usageData,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: <?= $totalLinen ?>, // Set the maximum linen count on the y-axis
            },
        },
    },
});
</script>
