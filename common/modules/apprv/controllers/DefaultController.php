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
use common\models\ApprvSearch;

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
       $searchModel = new ApprvSearch();
        $dataProvider = new ActiveDataProvider([
           // 'query' => Apprv::find(),
           'query'=> Apprv::find()->where(['status' => '0']),
            
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => [
                    'daterequested' => SORT_DESC,
                ]
            ],
            
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReports()
{
    

    return $this->render('reports');
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
     * @param int $apprv_id Apprv ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($apprv_id)
    {
        $model = $this->findModel($apprv_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'apprv_id' => $model->apprv_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Apprv model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $apprv_id Apprv ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($apprv_id)
    {
        $this->findModel($apprv_id)->delete();

        return $this->redirect(['index']);
    }
    /*
    public function actionSaveEdited($apprv_id)
    {
       
        if(Yii::$app->user->can('approve-request'))
        {
            $apprvModel = Apprv::findOne($apprv_id);
            
            if (!$apprvModel) {
                throw new NotFoundHttpException('Apprv not found.');
            }
            
            // Find or create the associated Apprv model based on the foreign key
            $rtrnModel = Apprv::findOne(['apprv_id' => $apprv_id]) ?? new Rtrn();
            var_dump(Yii::$app->request->post('Rtrn'));
            // Update Apprv model with edited data
            $rtrnModel->attributes = Yii::$app->request->post('Rtrn');
            // Set other attributes like approved_by, approval_date, etc.
            $rtrnModel->enccode = Yii::$app->request->post('Rtrn')['enccode'];
            $rtrnModel->patient = Yii::$app->request->post('Rtrn')['patient'];
            $rtrnModel->dateadmitted = Yii::$app->request->post('Rtrn')['dateadmitted'];
            //$rtrnModel->status = Yii::$app->request->post('Rtrn')['status'];
            //$rtrnModel->status = 1; // Set status to 1
            //$rtrnModel->status = Yii::$app->request->post('Rtrn')['status'];
            $rtrnModel->linen = Yii::$app->request->post('Rtrn')['linen'];
            $rtrnModel->daterequested = Yii::$app->request->post('Rtrn')['daterequested'];
            $rtrnModel->remarks = Yii::$app->request->post('Rtrn')['remarks'];
            $rtrnModel->dateapproved = Yii::$app->request->post('Rtrn')['dateapproved'];
            if (!$rtrnModel->validate()) {
                Yii::error($rtrnModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Validation errors occurred while saving.');
            }
            
            
            if ($rtrnModel->save()) {
                // Delete the corresponding brlist record
                //$brlistModel->delete();
                Yii::$app->session->setFlash('success', 'Linen returned.');
            } else {
                Yii::error($rtrnModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Error while saving the edited data.');
                
            }
            
            return $this->redirect(['/rtrn/default/index']);
        }else
        {
            Throw new ForbiddenHttpException;
        }
    }
    */
   
    public function actionSaveEdited($brlst_id)
    {
        
        if(Yii::$app->user->can('approve-request'))
        {
            $brlstModel = Brlst::findOne($brlst_id);
            
            
            if (!$brlstModel) {
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
           //$apprvModel->status = Yii::$app->request->post('Apprv')['status'];
           
            $apprvModel->linen = Yii::$app->request->post('Apprv')['linen'];
            $apprvModel->daterequested = Yii::$app->request->post('Apprv')['daterequested'];
            $apprvModel->remarks = Yii::$app->request->post('Apprv')['remarks'];
            $apprvModel->dateapproved = Yii::$app->request->post('Apprv')['dateapproved'];
            
            if (!$apprvModel->validate()) {
                Yii::error($apprvModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Validation errors occurred while saving.');
            }
            
        if ($apprvModel->save()) {
            $apprvModel->dateapproved = date('Y-m-d H:i:s');  // You can use your preferred date format and logic here
            // Create and save the Rtrn model with the same data
            $rtrnModel = new Rtrn();
            $rtrnModel->attributes = $apprvModel->attributes;
        
            if ($rtrnModel->validate()) {
                if ($rtrnModel->save()) {
                
                    Yii::$app->session->setFlash('success', 'Request approved, Please click again for return linen.');
                } else {
                    Yii::error($rtrnModel->errors, 'app');
                    Yii::$app->session->setFlash('error', 'Error while saving the Rtrn model.');
                }
            } else {
                Yii::error($rtrnModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Validation errors occurred while saving.');
            }
        } else {
            Yii::error($apprvModel->errors, 'app');
            Yii::$app->session->setFlash('error', 'Error while saving the edited data.');
        }
                    
                    return $this->redirect(['/apprv/default/index']);
                }else
                {
                    Throw new ForbiddenHttpException;
                }
            }
    


    /**
     * Finds the Apprv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $apprv_id Apprv ID
     * @return Apprv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($apprv_id)
    {
        if (($model = Apprv::findOne(['apprv_id' => $apprv_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

