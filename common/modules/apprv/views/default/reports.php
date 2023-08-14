<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Apprv;

/** @var yii\web\View $this */
/** @var common\models\Apprv $model */

$this->title = 'Requested Linen Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/styles.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h1><?= Html::encode($this->title) ?></h1>

<canvas id="linenUsageChart" width="400" height="200"></canvas>
<canvas id="linenColorDistributionChart" width="400" height="200"></canvas>

<?php
// Sample data for linen usage over time
$linenColors = ['Green', 'Blue', 'Red', 'Pink'];
// Fetch and count data based on linen color
$usageData = Apprv::find()
    ->select(['linen', 'COUNT(*) AS count'])
    ->groupBy('linen')
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

<script>
// Sample data for linen usage over time
const usageData = {
    labels: <?= json_encode($usageLabels) ?>,
    datasets: [{
        label: 'Linen Usage',
        data: <?= json_encode($usageCounts) ?>,
        backgroundColor: ['green', 'blue', 'red', 'pink'], // Set colors based on linen colors
    }],
};

// Create the bar chart
const usageCtx = 'linenUsageChart';
const linenUsageChart = new Chart(document.getElementById(usageCtx).getContext('2d'), {
    type: 'bar',
    data: usageData,
});
</script>
