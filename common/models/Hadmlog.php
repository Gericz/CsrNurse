<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%hadmlog}}".
 *
 * @property string $enccode
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $casenum
 * @property float $patage
 * @property string $newold
 * @property string|null $tacode
 * @property string|null $tscode
 * @property string $admdate
 * @property string $admtime
 * @property string|null $diagcode
 * @property string|null $admnotes
 * @property string $licno
 * @property string|null $diagfin
 * @property string|null $disnotes
 * @property string|null $admmode
 * @property string|null $admpreg
 * @property string|null $disdate
 * @property string|null $distime
 * @property string|null $dispcode
 * @property string|null $condcode
 * @property string|null $licnof
 * @property string|null $licncons
 * @property string|null $cbcode
 * @property string|null $dcspinst
 * @property string|null $admstat
 * @property string|null $admlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $admtxt
 * @property string|null $admclerk
 * @property string|null $licno2
 * @property string|null $licno3
 * @property string|null $licno4
 * @property string|null $licno5
 * @property float|null $patagemo
 * @property float|null $patagedy
 * @property float|null $patagehr
 * @property string|null $admphic
 * @property string|null $disnotice
 * @property string|null $treatment
 * @property string|null $hsepriv
 * @property string|null $licno6
 * @property string|null $licno7
 * @property string|null $licno8
 * @property string|null $licno9
 * @property string|null $licno10
 * @property string|null $itisind
 * @property string|null $entryby
 * @property string|null $pexpireddate
 * @property string|null $acis
 * @property string|null $watchid
 * @property string|null $lockby
 * @property string|null $lockdte
 * @property string|null $typadm
 * @property string|null $pho_hospital_number
 *
 * @property Hpersonal $admclerk0
 * @property Hadmmode $admmode0
 * @property Henctr $enccode0
 * @property Henctr $enccode1
 * @property Hperson $hpercode0
 * @property Hprovider $licncons0
 * @property Hprovider $licno0
 * @property Hprovider $licno20
 * @property Hprovider $licno30
 * @property Hprovider $licno40
 * @property Hprovider $licno50
 * @property Hprovider $licnof0
 * @property Htypser $tscode0
 */
class Hadmlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%hadmlog}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode', 'patage', 'admdate', 'admtime'], 'required'],
            [['patage', 'patagemo', 'patagedy', 'patagehr'], 'number'],
            [['admdate', 'admtime', 'disdate', 'distime', 'datemod', 'pexpireddate', 'lockdte'], 'safe'],
            [['treatment', 'pho_hospital_number'], 'string'],
            [['enccode'], 'string', 'max' => 48],
            [['hpercode', 'casenum'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['newold', 'admpreg', 'admstat', 'admlock', 'updsw', 'confdl', 'disnotice', 'itisind', 'acis'], 'string', 'max' => 1],
            [['tacode', 'tscode', 'admmode', 'dispcode', 'condcode', 'cbcode', 'admphic', 'typadm'], 'string', 'max' => 5],
            [['diagcode'], 'string', 'max' => 40],
            [['admnotes', 'disnotes', 'admtxt'], 'string', 'max' => 255],
            [['licno', 'diagfin', 'licnof', 'licncons', 'licno2', 'licno3', 'licno4', 'licno5', 'licno6', 'licno7', 'licno8', 'licno9', 'licno10', 'watchid'], 'string', 'max' => 15],
            [['dcspinst'], 'string', 'max' => 150],
            [['admclerk', 'entryby', 'lockby'], 'string', 'max' => 10],
            [['hsepriv'], 'string', 'max' => 2],
            [['enccode'], 'unique'],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::class, 'targetAttribute' => ['enccode' => 'enccode']],
            [['admclerk'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::class, 'targetAttribute' => ['admclerk' => 'employeeid']],
            [['admmode'], 'exist', 'skipOnError' => true, 'targetClass' => Hadmmode::class, 'targetAttribute' => ['admmode' => 'admmode']],
            [['enccode'], 'exist', 'skipOnError' => true, 'targetClass' => Henctr::class, 'targetAttribute' => ['enccode' => 'enccode']],
            [['licncons'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licncons' => 'licno']],
            [['licno2'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licno2' => 'licno']],
            [['licno3'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licno3' => 'licno']],
            [['licno4'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licno4' => 'licno']],
            [['licno5'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licno5' => 'licno']],
            [['licnof'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licnof' => 'licno']],
            [['licno'], 'exist', 'skipOnError' => true, 'targetClass' => Hprovider::class, 'targetAttribute' => ['licno' => 'licno']],
            [['tscode'], 'exist', 'skipOnError' => true, 'targetClass' => Htypser::class, 'targetAttribute' => ['tscode' => 'tscode']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::class, 'targetAttribute' => ['hpercode' => 'hpercode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Enccode',
            'hpercode' => 'Hpercode',
            'upicode' => 'Upicode',
            'casenum' => 'Casenum',
            'patage' => 'Patage',
            'newold' => 'Newold',
            'tacode' => 'Tacode',
            'tscode' => 'Tscode',
            'admdate' => 'Admdate',
            'admtime' => 'Admtime',
            'diagcode' => 'Diagcode',
            'admnotes' => 'Admnotes',
            'licno' => 'Licno',
            'diagfin' => 'Diagfin',
            'disnotes' => 'Disnotes',
            'admmode' => 'Admmode',
            'admpreg' => 'Admpreg',
            'disdate' => 'Disdate',
            'distime' => 'Distime',
            'dispcode' => 'Dispcode',
            'condcode' => 'Condcode',
            'licnof' => 'Licnof',
            'licncons' => 'Licncons',
            'cbcode' => 'Cbcode',
            'dcspinst' => 'Dcspinst',
            'admstat' => 'Admstat',
            'admlock' => 'Admlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'admtxt' => 'Admtxt',
            'admclerk' => 'Admclerk',
            'licno2' => 'Licno2',
            'licno3' => 'Licno3',
            'licno4' => 'Licno4',
            'licno5' => 'Licno5',
            'patagemo' => 'Patagemo',
            'patagedy' => 'Patagedy',
            'patagehr' => 'Patagehr',
            'admphic' => 'Admphic',
            'disnotice' => 'Disnotice',
            'treatment' => 'Treatment',
            'hsepriv' => 'Hsepriv',
            'licno6' => 'Licno6',
            'licno7' => 'Licno7',
            'licno8' => 'Licno8',
            'licno9' => 'Licno9',
            'licno10' => 'Licno10',
            'itisind' => 'Itisind',
            'entryby' => 'Entryby',
            'pexpireddate' => 'Pexpireddate',
            'acis' => 'Acis',
            'watchid' => 'Watchid',
            'lockby' => 'Lockby',
            'lockdte' => 'Lockdte',
            'typadm' => 'Typadm',
            'pho_hospital_number' => 'Pho Hospital Number',
        ];
    }

    /**
     * Gets query for [[Admclerk0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmclerk0()
    {
        return $this->hasOne(Hpersonal::class, ['employeeid' => 'admclerk']);
    }

    /**
     * Gets query for [[Admmode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmmode0()
    {
        return $this->hasOne(Hadmmode::class, ['admmode' => 'admmode']);
    }

    /**
     * Gets query for [[Enccode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccode0()
    {
        return $this->hasOne(Henctr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Enccode1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccode1()
    {
        return $this->hasOne(Henctr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpercode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode0()
    {
        return $this->hasOne(Hperson::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Licncons0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicncons0()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licncons']);
    }

    /**
     * Gets query for [[Licno0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicno0()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licno']);
    }

    /**
     * Gets query for [[Licno20]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicno20()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licno2']);
    }

    /**
     * Gets query for [[Licno30]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicno30()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licno3']);
    }

    /**
     * Gets query for [[Licno40]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicno40()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licno4']);
    }

    /**
     * Gets query for [[Licno50]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicno50()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licno5']);
    }

    /**
     * Gets query for [[Licnof0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicnof0()
    {
        return $this->hasOne(Hprovider::class, ['licno' => 'licnof']);
    }

    /**
     * Gets query for [[Tscode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTscode0()
    {
        return $this->hasOne(Htypser::class, ['tscode' => 'tscode']);
    }
}
