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
use common\models\Henctr;
use yii\helpers\Json;
use yii\db\Query;
use common\models\Hadmlog;


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
            //'query' => Brlst::find(),
            'query'=> Brlst::find()->where(['status' => 0]),
            
            'pagination' => [
                'pageSize' => 15
            ],
            'sort' => [
                'defaultOrder' => [
                    'daterequested' => SORT_DESC,
                ]
            ],
            
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
        /*
     // Get the db2 database connection
     $db2 = Yii::$app->db2;

     // Create a new query object for hadmlog table using the db2 connection
     $queryHadmlog = $db2->createCommand('SELECT * FROM hadmlog WHERE disdate IS NULL AND distime IS NULL');
 
     // Fetch the results for hadmlog
     $hadmlogResults = $queryHadmlog->queryAll();
 
     // Create a new query object for joining hadmlog and hperson using the db2 connection
     $queryJoined = $db2->createCommand('
     SELECT hadmlog.*, hperson.*
     FROM hadmlog
     INNER JOIN hperson ON hadmlog.hpercode = hperson.hpercode
     WHERE hadmlog.disdate IS NULL AND hadmlog.distime IS NULL
 ');
 
     // Fetch the results for the joined tables
     $joinedResults = $queryJoined->queryAll();
 
     return $this->render('index', [
         'hadmlogResults' => $hadmlogResults,
         'joinedResults' => $joinedResults,
     ]);*/
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
        $dataFromDatabase = Hperson::find()
        ->select(['patlast', 'patfirst', 'patmiddle'])
    ->leftJoin('hadmlog', 'hperson.hpercode = hadmlog.hpercode')
    ->andWhere(['hadmlog.disdate' => null, 'hadmlog.distime' => null])
    ->andWhere(['not', ['hadmlog.hpercode' => null]])
    //->andWhere(['REGEXP', 'hperson.patfirst', '.*[[:space:]].*']) // Match names with spaces
    ->all();
    
        return $this->render('create', [
            'model' => $model,
            'suggestedData' => $suggestedData,
            'dataFromDatabase' => $dataFromDatabase,
        ]);
    }
    /*
    public function actionFormRequest()
    {
        $request = Yii::$app->request;
        $hpercode = $request->post('hpercode');

        // Fetch data from the other database by joining hadmlog and hperson
        $db2 = Yii::$app->db2;
        $query = $db2->createCommand('
            SELECT hadmlog.*, hperson.*
            FROM hadmlog
            INNER JOIN hperson ON hadmlog.hpercode = hperson.hpercode
            WHERE hadmlog.hpercode = :hpercode
        ')
        ->bindValue(':hpercode', $hpercode)
        ->queryOne();

        if ($query !== false) {
            // Render a view or return the data as needed
            return $this->render('form_request', [
                'data' => $query,
            ]);
        } else {
            // Log the error for debugging
            Yii::error('Data not found for hpercode: ' . $hpercode);

            // Throw a NotFoundHttpException
            throw new NotFoundHttpException('Data not found.');
        }
    }
 */

    
    
    

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
        Yii::info("Received patlast: $patlast, patfirst: $patfirst, patmiddle: $patmiddle", 'app');
        
        // Split the provided name into patfirst and patmiddle
        $nameParts = explode(' ', $patfirst);
        $patfirst = $nameParts[0];
        $patmiddle = count($nameParts) > 1 ? end($nameParts) : '';
    
        $remoteQuery = $remoteConnection->createCommand('
        SELECT hpercode
        FROM hperson
        WHERE patlast LIKE :patlast AND patfirst LIKE :patfirst AND patmiddle LIKE :patmiddle
        ', [
            ':patlast' => $patlast . '%', // Use a wildcard % to match partial values
            ':patfirst' => $patfirst . '%',
            ':patmiddle' => $patmiddle . '%',
        ]);
        
        $hpercode = $remoteQuery->queryScalar(); // Fetch the hpercode value
        
        if ($hpercode !== false) {
            return $hpercode; // Return the hpercode
        }
    
        return 'Not found'; // Return a default value or message if not found
    }
    
    public function actionGetDateAdmittedOptions($patlast, $patfirst, $patmiddle)
    {
        $query = Hperson::find()->andWhere(['patlast' => $patlast]);
    
        if ($patfirst || $patmiddle) {
            $query->andWhere(['or',
                ['like', 'CONCAT(patfirst, " ", patmiddle)', $patfirst . ' ' . $patmiddle . '%', false],
                ['like', 'patmiddle', $patmiddle . '%', false]
            ]);
        }
    
        $hpercode = $query->select(['hpercode'])->scalar(); // Assuming hpercode is a single value
    
        $dateAdmittedOptions = [];
    
        if ($hpercode !== null) {
            $dateAdmittedOptions = Henctr::find()
                ->select(['encdate'])
                ->where(['hpercode' => $hpercode])
                ->column();
        }
    
        return Json::encode($dateAdmittedOptions);
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
