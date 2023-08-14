<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%rtrn}}".
 *
 * @property int $rtrn_id
 * @property int $apprv_id
 * @property int $brlst_id
 * @property string $enccode
 * @property string $patient
 * @property string $dateadmitted
 * @property string $status
 * @property string $linen
 * @property string $daterequested
 * @property string $remarks
 * @property string $dateapproved
 *
 * @property Apprv $apprv
 */
class Rtrn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rtrn}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apprv_id', 'brlst_id', 'enccode', 'patient', 'dateadmitted', 'status', 'linen', 'daterequested', 'remarks', 'dateapproved'], 'required'],
            [['apprv_id', 'brlst_id'], 'integer'],
            [['dateadmitted', 'daterequested', 'dateapproved'], 'safe'],
            [['enccode', 'patient', 'status', 'linen', 'remarks'], 'string', 'max' => 255],
            [['apprv_id'], 'unique'],
            [['apprv_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apprv::class, 'targetAttribute' => ['apprv_id' => 'apprv_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rtrn_id' => 'Rtrn ID',
            'apprv_id' => 'Apprv ID',
            'brlst_id' => 'Brlst ID',
            'enccode' => 'Hospital No',
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
     * Gets query for [[Apprv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApprv()
    {
        return $this->hasOne(Apprv::class, ['apprv_id' => 'apprv_id']);
    }
}
