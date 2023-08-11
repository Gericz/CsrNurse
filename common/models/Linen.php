<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%linen}}".
 *
 * @property int $id
 * @property string $transaction
 * @property int $status
 * @property string $daterq
 * @property string $remarks
 */
class Linen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%linen}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction', 'status', 'remarks'], 'required'],
            [['status'], 'string'],
            [['daterq'], 'safe'],
            [['transaction', 'remarks'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction' => 'Transaction',
            'status' => 'Status',
            'daterq' => 'Date Request',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\LinenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LinenQuery(get_called_class());
    }
}
