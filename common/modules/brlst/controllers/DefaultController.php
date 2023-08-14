<?php

namespace common\modules\brlst\controllers;

use common\models\Brlst;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use common\models\Hperson;

/**
 * BrlstController implements the CRUD actions for Brlst model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Brlst models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Brlst::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'brlst_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brlst model.
     * @param int $brlst_id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($brlst_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($brlst_id),
        ]);
    }

    /**
     * Creates a new Brlst model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Brlst();
        $suggestedData = []; // Your code to fetch suggested data
    
        if ($model->load(Yii::$app->request->post())) {
            Yii::debug(Yii::$app->request->post(), 'posted data');
            $model->patient = Yii::$app->request->post('patient');
            if ($model->validate()) { // Check for validation errors
                if ($model->save()) {
                    Yii::info('Data saved successfully', 'brlst');
                } else {
                    Yii::error('Failed to save data: ' . json_encode($model->getErrors()), 'brlst');
                }
                return $this->redirect(['index']); // Redirect to a different page after saving
            } else {
                Yii::error('Validation failed: ' . json_encode($model->getErrors()), 'brlst');
            }
        }
        
        // Fetch data for the table
        $dataFromDatabase = Hperson::find()->select([ 'patlast', 'patfirst', 'patmiddle'])->all();
    
        return $this->render('create', [
            'model' => $model,
            'suggestedData' => $suggestedData,
            'dataFromDatabase' => $dataFromDatabase,
        ]);
    }
    
    

    /**
     * Updates an existing Brlst model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $brlst_id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($brlst_id)
    {
        $model = $this->findModel($brlst_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'brlst_id' => $model->brlst_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Brlst model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $brlst_id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($brlst_id)
    {
        $this->findModel($brlst_id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetEncCode($patlast, $patfirst, $patmiddle)
{
    $remoteConnection = Yii::$app->db2;
    
    $remoteQuery = $remoteConnection->createCommand('
        SELECT hpercode
        FROM hperson
        WHERE patlast = :patlast AND patfirst = :patfirst AND patmiddle = :patmiddle
    ', [
        ':patlast' => $patlast,
        ':patfirst' => $patfirst,
        ':patmiddle' => $patmiddle,
    ]);
    
    $hpercode = $remoteQuery->queryScalar(); // Fetch the hpercode value
    
    if ($hpercode !== false) {
        return $hpercode; // Return the hpercode
    }

    return 'Not found'; // Return a default value or message if not found
}
public function actionGetDateAdmitted($patlast, $patfirst, $patmiddle)
{
    $dateAdmitted = Henctr::find()
        ->select(['dateadmitted'])
        ->where(['patlast' => $patlast, 'patfirst' => $patfirst, 'patmiddle' => $patmiddle])
        ->scalar();

    return $dateAdmitted ? Yii::$app->formatter->asDate($dateAdmitted) : '';
}


    /**
     * Finds the Brlst model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $brlst_id ID
     * @return Brlst the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($brlst_id)
    {
        if (($model = Brlst::findOne(['brlst_id' => $brlst_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
