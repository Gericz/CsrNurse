<?php

namespace common\components;

use yii\base\Behavior;
use common\models\Apprv;
use Yii;
use yii\db\ActiveRecord;


class CreateApprvBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'createApprvRecord',
        ];
    }
    
    public function createApprvRecord($event)
    {
        $apprvModel = new Apprv();
        $apprvModel->attributes = $this->owner->attributes;
        
        // Set the primary key brlst_id explicitly
        $apprvModel->brlst_id = $this->owner->brlst_id;
        
        $apprvModel->enccode = Yii::$app->request->post('Apprv')['enccode'];
        var_dump(  $apprvModel);
        $apprvModel->patient = Yii::$app->request->post('Apprv')['patient'];
        $apprvModel->dateadmitted = Yii::$app->request->post('Apprv')['dateadmitted'];
        $apprvModel->status = Yii::$app->request->post('Apprv')['status'];
        $apprvModel->linen = Yii::$app->request->post('Apprv')['linen'];
        $apprvModel->daterequested = Yii::$app->request->post('Apprv')['daterequested'];
        $apprvModel->remarks = Yii::$app->request->post('Apprv')['remarks'];
        
        
        $apprvModel->save(false); // Save without validation, assuming data is valid
    }
}

?>