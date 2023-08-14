<?php

namespace common\modules\rtrn;

use common\models\Rtrn;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RtrnController implements the CRUD actions for Rtrn model.
 */
class RtrnController extends Controller
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
     * Lists all Rtrn models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Rtrn::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'rtrn_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rtrn model.
     * @param int $rtrn_id Rtrn ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rtrn_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($rtrn_id),
        ]);
    }

    /**
     * Creates a new Rtrn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Rtrn();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rtrn_id' => $model->rtrn_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rtrn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rtrn_id Rtrn ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rtrn_id)
    {
        $model = $this->findModel($rtrn_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rtrn_id' => $model->rtrn_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rtrn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rtrn_id Rtrn ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rtrn_id)
    {
        $this->findModel($rtrn_id)->delete();

        return $this->redirect(['index']);
    }
    public function actionSaveEdited($apprv_id)
    {
       
        if(Yii::$app->user->can('approve-request'))
        {
            $apprvModel = Apprv::findOne($apprv_id);
            
            if (!$apprvModel) {
                throw new NotFoundHttpException('Apprv not found.');
            }
            
            // Find or create the associated Apprv model based on the foreign key
            $rtrnModel = Apprv::findOne(['apprv_id' => $apprv_id]) ?? new Apprv();
            var_dump(Yii::$app->request->post('Apprv'));
            // Update Apprv model with edited data
            $rtrnModel->attributes = Yii::$app->request->post('Rtrn');
            // Set other attributes like approved_by, approval_date, etc.
            $rtrnModel->enccode = Yii::$app->request->post('Rtrn')['enccode'];
            $rtrnModel->patient = Yii::$app->request->post('Rtrn')['patient'];
            $rtrnModel->dateadmitted = Yii::$app->request->post('Rtrn')['dateadmitted'];
            $rtrnModel->status = Yii::$app->request->post('Rtrn')['status'];
            $rtrnModel->linen = Yii::$app->request->post('Rtrn')['linen'];
            $rtrnModel->daterequested = Yii::$app->request->post('Rtrn')['daterequested'];
            $rtrnModel->remarks = Yii::$app->request->post('Rtrn')['remarks'];
            $rtrnModel->dateapproved = Yii::$app->request->post('Rtrn')['dateapproved'];
            if (!$apprvModel->validate()) {
                Yii::error($apprvModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Validation errors occurred while saving.');
            }
            
            
            if ($apprvModel->save()) {
                
                // Delete the corresponding brlist record
                //$brlistModel->delete();
                Yii::$app->session->setFlash('success', 'Request approved and moved to approvals.');
            } else {
                Yii::error($apprvModel->errors, 'app');
                Yii::$app->session->setFlash('error', 'Error while saving the edited data.');
                
            }
            
            return $this->redirect(['/rtrn/default/index']);
        }else
        {
            Throw new ForbiddenHttpException;
        }
    }
    /**
     * Finds the Rtrn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rtrn_id Rtrn ID
     * @return Rtrn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rtrn_id)
    {
        if (($model = Rtrn::findOne(['rtrn_id' => $rtrn_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
