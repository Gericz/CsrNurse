<?php

namespace common\modules\brlst\controllers;

use common\models\Brlst;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * BrlstController implements the CRUD actions for Brlst model.
 */
class BrlstController extends Controller
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
        if (Yii::$app->user->can('create-request')) {
            $model = new Brlst();
            $model->status = 0;
            
            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'brlst_id' => $model->brlst_id]);
                }
            } else {
                $model->loadDefaultValues();
            }
            
            // Fetch data from remote columns
            $remoteConnection = Yii::$app->db2;
            $remoteQuery = $remoteConnection->createCommand('
            SELECT patlast, patfirst, patmiddle
            FROM hperson
                
        ');
            
            $remoteData = $remoteQuery->queryOne(); // Fetch a single row
            
            // Extract values from the fetched row
            $remotePatLast = $remoteData['patlast'];
            $remotePatFirst = $remoteData['patfirst'];
            $remotePatMiddle = $remoteData['patmiddle'];
            
            return $this->render('create', [
                'model' => $model,
                'remotePatLast' => $remotePatLast,
                'remotePatFirst' => $remotePatFirst,
                'remotePatMiddle' => $remotePatMiddle,
            ]);
        } else {
            throw new ForbiddenHttpException;
        }
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
