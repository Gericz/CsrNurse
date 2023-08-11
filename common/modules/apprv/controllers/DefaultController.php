<?php

namespace common\modules\apprv\controllers;

use common\models\Apprv;
use common\models\Brlst;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * Default controller for the `apprv` module
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
     * Lists all Apprv models.
     *
     * @return string
     */
    public function actionIndex()
   /* {
        // Set up data provider for the GridView with brlist records
        $dataProvider = new ActiveDataProvider([
            'query' => Brlst::find(),
        ]);
        
        // Render the view and pass the data provider
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }*/
    
    
    
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Apprv::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'aprrv_id' => SORT_DESC,
                ]
            ],*/
            
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apprv model.
     * @param int $aprrv_id Aprrv ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($apprv_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($apprv_id),
        ]);
    }

    /**
     * Creates a new Apprv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Apprv();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'apprv_id' => $model->apprv_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Apprv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $aprrv_id Aprrv ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($apprv_id)
    {
        $model = $this->findModel($apprv_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aprrv_id' => $model->aprrv_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Apprv model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $aprrv_id Aprrv ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($apprv_id)
    {
        $this->findModel($apprv_id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionSaveEdited($brlst_id)
    {
       
        if(Yii::$app->user->can('approve-request'))
        {
            $brlistModel = Brlst::findOne($brlst_id);
            
            if (!$brlistModel) {
                throw new NotFoundHttpException('Brlist not found.');
            }
            
            // Find or create the associated Apprv model based on the foreign key
            $apprvModel = Apprv::findOne(['brlst_id' => $brlst_id]) ?? new Apprv();
            var_dump(Yii::$app->request->post('Apprv'));
            // Update Apprv model with edited data
            $apprvModel->attributes = Yii::$app->request->post('Apprv');
            // Set other attributes like approved_by, approval_date, etc.
            $apprvModel->enccode = Yii::$app->request->post('Apprv')['enccode'];
            $apprvModel->patient = Yii::$app->request->post('Apprv')['patient'];
            $apprvModel->dateadmitted = Yii::$app->request->post('Apprv')['dateadmitted'];
            $apprvModel->status = Yii::$app->request->post('Apprv')['status'];
            $apprvModel->linen = Yii::$app->request->post('Apprv')['linen'];
            $apprvModel->daterequested = Yii::$app->request->post('Apprv')['daterequested'];
            $apprvModel->remarks = Yii::$app->request->post('Apprv')['remarks'];
            
            if (!$apprvModel->validate()) {
                Yii::error($apprvModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Validation errors occurred while saving.');
            }
            
            
            if ($apprvModel->save()) {
                
                // Delete the corresponding brlist record
                $brlistModel->delete();
                Yii::$app->session->setFlash('success', 'Request approved and moved to approvals.');
            } else {
                Yii::error($apprvModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Error while saving the edited data.');
                
            }
            
            return $this->redirect(['index']);
        }else
        {
            Throw new ForbiddenHttpException;
        }
    }
    
   
    
    /**
     * Finds the Apprv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $aprrv_id Aprrv ID
     * @return Apprv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($aprrv_id)
    {
        if (($model = Apprv::findOne(['aprrv_id' => $aprrv_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

