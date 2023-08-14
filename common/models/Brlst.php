<?php

namespace common\models;


use Yii;
use common\components\CreateApprvBehavior;

/**
 * This is the model class for table "{{%brlst}}".
 *
 * @property int $id
 * @property string $patient
 * @property string|null $date_admitted
 * @property string $status
 * @property string $linen
 * @property string|null $date_requested
 */
class Brlst extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%brlst}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode','patient', 'status', 'linen'], 'required'],
          
            [['daterequested'], 'default', 'value' => date('Y-m-d H:i:s')],
            [['dateadmitted', 'daterequested'], 'safe'],
            [['enccode','patient', 'status', 'linen', 'remarks'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Hospital No.',
            //'brlst_id' => 'ID',
            'patient' => 'Patient',
            'dateadmitted' => 'Date Admitted',
            'status' => 'Status',
            'linen' => 'Linen',
            'daterequested' => 'Date Requested',
            'remarks' => 'Remarks',
            
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        
        if ($insert) {
            // Create a new Apprv record and associate it with the Brlst record
            $apprv = new Apprv();
            $apprv->brlst_id = $this->brlst_id; // Assuming there's a foreign key relation
            // Set other attributes of the Apprv model as needed
            $apprv->enccode = $this->enccode;
            $apprv->patient= $this->patient;
            Yii::info('Value of $this->patient: ' . $this->patient, 'debug');
            $apprv->dateadmitted= $this->dateadmitted;
            $apprv->status= $this->status;
            $apprv->linen= $this->linen;
            $apprv->daterequested= $this->daterequested;
            $apprv->remarks= $this->remarks;
            // Debug the $apprv object before saving
            var_dump($apprv);
            
            if ($apprv->save()) {
                // Debug the $apprv object after saving
               
            } else {
                // Debug validation errors if save fails
                var_dump($apprv->errors);
            }
        }
    }
 
    
    /*public function behaviors()
    {
        return [
            CreateApprvBehavior::class,
        ];
    }*/

    /**
     * {@inheritdoc}
     * @return BrlstQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BrlstQuery(get_called_class());
    }
}
