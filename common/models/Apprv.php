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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode', 'patient', 'dateadmitted', 'status', 'daterequested', 'remarks','linen'], 'required'],
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
            'brlst_id' => 'Request ID',
            'patient' => 'Patient',
            'dateadmitted' => 'Date Admitted',
            'status' => 'Status',
            'linen' => 'Linen',
            'daterequested' => 'Date Requested',
            'remarks' => 'Remarks',
            'dateapproved' => 'Date Approved',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ApprvQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApprvQuery(get_called_class());
    }
}
