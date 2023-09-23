<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%apprv}}".
 *
 * @property int $aprrv_id
 * @property int $enccode
 * @property string $patient
 * @property string $dateadmitted
 * @property string $status
 * @property string $daterequested
 * @property string $remarks
 * @property string $dateapproved
 */
class Apprv extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apprv}}';
    }

    public $is_sent_to_rtrn;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode', 'patient', 'dateadmitted','daterequested','linen'], 'required'],
            [['dateadmitted', 'daterequested', 'dateapproved'], 'safe'],
            [['enccode','patient', 'status','linen', 'remarks'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'apprv_id' => 'Approved ID',
            'enccode' => 'Hospital No',
            //'brlst_id' => 'Request ID',
            'patient' => 'Patient',
            'dateadmitted' => 'Date Admitted',
            'status' => 'Status',
            'linen' => 'Linen',
            'daterequested' => 'Date Requested',
            'remarks' => 'Remarks',
            'dateapproved' => 'Date Approved',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        
        if ($insert) {
            // Create a new Rtrn record and associate it with the Brlst record
            $rtrn = new Rtrn();
            $rtrn->apprv_id = $this->apprv_id; // Assuming there's a foreign key relation
            // Set other attributes of the Rtrn model as needed
            $rtrn->brlst_id = $this->brlst_id;
            $rtrn->enccode = $this->enccode;
            $rtrn->patient= $this->patient;
            Yii::info('Value of $this->patient: ' . $this->patient, 'debug');
            $rtrn->dateadmitted= $this->dateadmitted;
           //$rtrn->status= $this->status;
            $rtrn->linen= $this->linen;
            $rtrn->daterequested= $this->daterequested;
            $rtrn->remarks= $this->remarks;
            $rtrn->dateapproved= $this->dateapproved;
            // Debug the  $rtrn object before saving
            var_dump( $rtrn);
            
            if ( $rtrn->save()) {
                // Debug the $rtrn object after saving
               
            } else {
                // Debug validation errors if save fails
                var_dump( $rtrn->errors);
            }
        }
    }
 

    /**
     * {@inheritdoc}
     * @return ApprvQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApprvQuery(get_called_class());
    }
    public function getRtrn()
{
    return $this->hasOne(Rtrn::class, ['apprv_id' => 'apprv_id']);
}

public function getBrlst()
{
    return $this->hasOne(Brlst::class, ['brlst_id' => 'brlst_id']);
}

}
