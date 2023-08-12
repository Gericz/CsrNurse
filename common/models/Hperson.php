<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%hperson}}".
 *
 * @property string|null $hpatkey
 * @property string $hfhudcode
 * @property string $hpercode
 * @property string|null $hpatcode
 * @property string|null $upicode
 * @property string|null $hhcode
 * @property string|null $relhhhead
 * @property string|null $resarrange
 * @property string|null $hspocode
 * @property string|null $hspoupi
 * @property string|null $upistcode
 * @property string $patlast
 * @property string $patfirst
 * @property string|null $patmiddle
 * @property string|null $patsuffix
 * @property string|null $patprefix
 * @property string|null $patdegree
 * @property string|null $patalias
 * @property string|null $patmaidnm
 * @property string|null $patbdate
 * @property string|null $patbplace
 * @property string $patsex
 * @property string|null $patcstat
 * @property string|null $patempstat
 * @property string|null $citcode
 * @property string|null $natcode
 * @property string|null $relcode
 * @property string|null $hfatcode
 * @property string|null $hfatupi
 * @property string|null $hmotcode
 * @property string|null $hmotupi
 * @property string|null $patmmdn
 * @property string|null $phicnum
 * @property string|null $patmedno
 * @property string|null $patemernme
 * @property string|null $patemaddr
 * @property string|null $pattelno
 * @property string|null $relemacode
 * @property string|null $f_dec
 * @property string|null $patstat
 * @property string|null $patlock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $fm_dec
 * @property string|null $bldcode
 * @property string|null $entryby
 * @property string|null $fatlast
 * @property string|null $fatfirst
 * @property string|null $fatmid
 * @property string|null $motlast
 * @property string|null $motfirst
 * @property string|null $motmid
 * @property string|null $splast
 * @property string|null $spfirst
 * @property string|null $spmid
 * @property string|null $fataddr
 * @property string|null $motaddr
 * @property string|null $spaddr
 * @property string|null $fatsuffix
 * @property string|null $motsuffix
 * @property string|null $spsuffix
 * @property string|null $fatempname
 * @property string|null $fatempaddr
 * @property string|null $fatempeml
 * @property string|null $fatemptel
 * @property string|null $motempname
 * @property string|null $motempaddr
 * @property string|null $motempeml
 * @property string|null $motemptel
 * @property string|null $spempname
 * @property string|null $spempaddr
 * @property string|null $spempeml
 * @property string|null $spemptel
 * @property string|null $fattel
 * @property string|null $mottel
 * @property string|null $mssno
 * @property string|null $srcitizen
 * @property string|null $picname
 * @property string|null $s_dec
 * @property string|null $hospperson
 * @property string|null $hsmokingcs
 *
 * @property Henctr[] $enccodes
 * @property Hpersonal $entryby0
 * @property Haddr[] $haddrs
 * @property Hadmcons[] $hadmcons
 * @property Hadmlog[] $hadmlogs
 * @property Harq[] $harqs
 * @property Hblack[] $hblacks
 * @property Hccomp[] $hccomps
 * @property Hcert[] $hcerts
 * @property Hconfine[] $hconfines
 * @property Hcrsward[] $hcrswards
 * @property Hdcsched[] $hdcscheds
 * @property Hdedborn $hdedborn
 * @property Hdern $hdern
 * @property Hdocord[] $hdocords
 * @property Hdrugcos[] $hdrugcos
 * @property Hecase[] $hecases
 * @property Hemplyr[] $hemplyrs
 * @property Hencdiag[] $hencdiags
 * @property Henctr[] $henctrs
 * @property Henctr[] $henctrs0
 * @property Herlog[] $herlogs
 * @property Hfamexp[] $hfamexps
 * @property Hfamplan[] $hfamplans
 * @property Hfluid[] $hflus
 * @property Hlablog[] $hlablogs
 * @property Hlivebirth[] $hlivebirths
 * @property Hmrhisto[] $hmrhistos
 * @property Hmrsrev[] $hmrsrevs
 * @property Hmsslog[] $hmsslogs
 * @property Hnewborn[] $hnewborns
 * @property Hnurnote[] $hnurnotes
 * @property Holdnumber $holdnumber
 * @property Hopdlog[] $hopdlogs
 * @property Hpallert[] $hpallerts
 * @property Hpatacci[] $hpataccis
 * @property Hpatacct[] $hpataccts
 * @property Hpatacot[] $hpatacots
 * @property Hpatadj[] $hpatadjs
 * @property Hpatchrg[] $hpatchrgs
 * @property Hpatcon[] $hpatcons
 * @property Hpatdetl[] $hpatdetls
 * @property Hpatdied[] $hpatdieds
 * @property Hpatdisc[] $hpatdiscs
 * @property Hpatgrpchrg[] $hpatgrpchrgs
 * @property Hpatmss[] $hpatmsses
 * @property Hpatoccup[] $hpatoccups
 * @property Hpatout[] $hpatouts
 * @property Hpatroom[] $hpatrooms
 * @property Hpaychk[] $hpaychks
 * @property Hpaykind[] $hpaykinds
 * @property Hpay[] $hpays
 * @property Hperresp[] $hperresps
 * @property Hphcont[] $hphconts
 * @property Hphiclog[] $hphiclogs
 * @property Hphicsum[] $hphicsums
 * @property Hphtrn[] $hphtrns
 * @property Hphyexam[] $hphyexams
 * @property Hphyfin[] $hphyfins
 * @property Hplan[] $hplans
 * @property Hproclog[] $hproclogs
 * @property Hprofserv[] $hprofservs
 * @property Hprognte[] $hprogntes
 * @property Hpromise[] $hpromises
 * @property Hrefrom[] $hrefroms
 * @property Hrefto[] $hreftos
 * @property Hresact[] $hresacts
 * @property HreturnOld[] $hreturnOlds
 * @property Hrmres[] $hrmres
 * @property Hrqdissue[] $hrqdissues
 * @property Hrqdreturn[] $hrqdreturns
 * @property Hrqd[] $hrqds
 * @property Hrqd[] $hrqds0
 * @property Hrxoissue[] $hrxoissues
 * @property Hrxoreturn[] $hrxoreturns
 * @property Hrxo[] $hrxos
 * @property Hservelog[] $hservelogs
 * @property Hservlog[] $hservlogs
 * @property Hsupcos[] $hsupcos
 * @property Hsurgpat[] $hsurgpats
 * @property Htelep[] $hteleps
 * @property Hvisitlog[] $hvisitlogs
 * @property Hvitalsign[] $hvitalsigns
 * @property Hvsbp[] $hvsbps
 * @property Hvshr[] $hvshrs
 * @property Hvsintke[] $hvsintkes
 * @property Hvsothr[] $hvsothrs
 * @property Hvsoutpt[] $hvsoutpts
 * @property Hvsrr[] $hvsrrs
 * @property Hvsspec[] $hvsspecs
 * @property Hvstemp[] $hvstemps
 * @property Hwrdtrn[] $hwrdtrns
 */
class Hperson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%hperson}}';
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
            [['hpercode'], 'required'],
            [['patbdate', 'datemod'], 'safe'],
            [['hpatkey'], 'string', 'max' => 30],
            [['hfhudcode'], 'string', 'max' => 19],
            [['hpercode', 'hpatcode', 'hhcode', 'hspocode', 'patdegree', 'hfatcode', 'hmotcode', 'phicnum', 'patmedno', 'pattelno', 'fatempeml', 'fatemptel', 'motempeml', 'motemptel', 'spempeml', 'spemptel', 'fattel', 'mottel', 'srcitizen', 'picname'], 'string', 'max' => 20],
            [['upicode', 'hspoupi', 'hfatupi', 'hmotupi'], 'string', 'max' => 12],
            [['relhhhead', 'resarrange', 'patsuffix', 'patprefix', 'patempstat', 'citcode', 'natcode', 'relcode', 'relemacode', 'fatsuffix', 'motsuffix', 'spsuffix'], 'string', 'max' => 5],
            [['upistcode', 'patsex', 'patcstat', 'f_dec', 'patstat', 'patlock', 'updsw', 'confdl', 'fm_dec', 's_dec', 'hospperson'], 'string', 'max' => 1],
            [['patlast', 'patfirst', 'patmiddle', 'fatlast', 'fatfirst', 'fatmid', 'motlast', 'motfirst', 'motmid', 'splast', 'spfirst', 'spmid', 'fatempname', 'motempname', 'spempname'], 'string', 'max' => 50],
            [['patalias', 'patmaidnm', 'patbplace', 'patmmdn', 'patemernme'], 'string', 'max' => 60],
            [['patemaddr'], 'string', 'max' => 100],
            [['bldcode', 'hsmokingcs'], 'string', 'max' => 3],
            [['entryby'], 'string', 'max' => 10],
            [['fataddr', 'motaddr', 'spaddr'], 'string', 'max' => 255],
            [['fatempaddr', 'motempaddr', 'spempaddr'], 'string', 'max' => 150],
            [['mssno'], 'string', 'max' => 15],
            [['hpercode'], 'unique'],
            [['hpatcode'], 'unique'],
            [['entryby'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::class, 'targetAttribute' => ['entryby' => 'employeeid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hpatkey' => 'Hpatkey',
            'hfhudcode' => 'Hfhudcode',
            'hpercode' => 'Hpercode',
            'hpatcode' => 'Hpatcode',
            'upicode' => 'Upicode',
            'hhcode' => 'Hhcode',
            'relhhhead' => 'Relhhhead',
            'resarrange' => 'Resarrange',
            'hspocode' => 'Hspocode',
            'hspoupi' => 'Hspoupi',
            'upistcode' => 'Upistcode',
            'patlast' => 'Patlast',
            'patfirst' => 'Patfirst',
            'patmiddle' => 'Patmiddle',
            'patsuffix' => 'Patsuffix',
            'patprefix' => 'Patprefix',
            'patdegree' => 'Patdegree',
            'patalias' => 'Patalias',
            'patmaidnm' => 'Patmaidnm',
            'patbdate' => 'Patbdate',
            'patbplace' => 'Patbplace',
            'patsex' => 'Patsex',
            'patcstat' => 'Patcstat',
            'patempstat' => 'Patempstat',
            'citcode' => 'Citcode',
            'natcode' => 'Natcode',
            'relcode' => 'Relcode',
            'hfatcode' => 'Hfatcode',
            'hfatupi' => 'Hfatupi',
            'hmotcode' => 'Hmotcode',
            'hmotupi' => 'Hmotupi',
            'patmmdn' => 'Patmmdn',
            'phicnum' => 'Phicnum',
            'patmedno' => 'Patmedno',
            'patemernme' => 'Patemernme',
            'patemaddr' => 'Patemaddr',
            'pattelno' => 'Pattelno',
            'relemacode' => 'Relemacode',
            'f_dec' => 'F Dec',
            'patstat' => 'Patstat',
            'patlock' => 'Patlock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'fm_dec' => 'Fm Dec',
            'bldcode' => 'Bldcode',
            'entryby' => 'Entryby',
            'fatlast' => 'Fatlast',
            'fatfirst' => 'Fatfirst',
            'fatmid' => 'Fatmid',
            'motlast' => 'Motlast',
            'motfirst' => 'Motfirst',
            'motmid' => 'Motmid',
            'splast' => 'Splast',
            'spfirst' => 'Spfirst',
            'spmid' => 'Spmid',
            'fataddr' => 'Fataddr',
            'motaddr' => 'Motaddr',
            'spaddr' => 'Spaddr',
            'fatsuffix' => 'Fatsuffix',
            'motsuffix' => 'Motsuffix',
            'spsuffix' => 'Spsuffix',
            'fatempname' => 'Fatempname',
            'fatempaddr' => 'Fatempaddr',
            'fatempeml' => 'Fatempeml',
            'fatemptel' => 'Fatemptel',
            'motempname' => 'Motempname',
            'motempaddr' => 'Motempaddr',
            'motempeml' => 'Motempeml',
            'motemptel' => 'Motemptel',
            'spempname' => 'Spempname',
            'spempaddr' => 'Spempaddr',
            'spempeml' => 'Spempeml',
            'spemptel' => 'Spemptel',
            'fattel' => 'Fattel',
            'mottel' => 'Mottel',
            'mssno' => 'Mssno',
            'srcitizen' => 'Srcitizen',
            'picname' => 'Picname',
            's_dec' => 'S Dec',
            'hospperson' => 'Hospperson',
            'hsmokingcs' => 'Hsmokingcs',
        ];
    }

    /**
     * Gets query for [[Enccodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccodes()
    {
        return $this->hasMany(Henctr::class, ['enccode' => 'enccode'])->viaTable('{{%hphicsum}}', ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Entryby0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntryby0()
    {
        return $this->hasOne(Hpersonal::class, ['employeeid' => 'entryby']);
    }

    /**
     * Gets query for [[Haddrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHaddrs()
    {
        return $this->hasMany(Haddr::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hadmcons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmcons()
    {
        return $this->hasMany(Hadmcons::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hadmlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs()
    {
        return $this->hasMany(Hadmlog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Harqs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHarqs()
    {
        return $this->hasMany(Harq::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hblacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHblacks()
    {
        return $this->hasMany(Hblack::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hccomps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHccomps()
    {
        return $this->hasMany(Hccomp::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hcerts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHcerts()
    {
        return $this->hasMany(Hcert::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hconfines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHconfines()
    {
        return $this->hasMany(Hconfine::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hcrswards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHcrswards()
    {
        return $this->hasMany(Hcrsward::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdcscheds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdcscheds()
    {
        return $this->hasMany(Hdcsched::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdedborn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdedborn()
    {
        return $this->hasOne(Hdedborn::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdern]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdern()
    {
        return $this->hasOne(Hdern::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdocords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords()
    {
        return $this->hasMany(Hdocord::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hdrugcos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdrugcos()
    {
        return $this->hasMany(Hdrugcos::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hecases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHecases()
    {
        return $this->hasMany(Hecase::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hemplyrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHemplyrs()
    {
        return $this->hasMany(Hemplyr::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hencdiags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHencdiags()
    {
        return $this->hasMany(Hencdiag::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Henctrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHenctrs()
    {
        return $this->hasMany(Henctr::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Henctrs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHenctrs0()
    {
        return $this->hasMany(Henctr::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Herlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHerlogs()
    {
        return $this->hasMany(Herlog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hfamexps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHfamexps()
    {
        return $this->hasMany(Hfamexp::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hfamplans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHfamplans()
    {
        return $this->hasMany(Hfamplan::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hflus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHflus()
    {
        return $this->hasMany(Hfluid::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hlablogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHlablogs()
    {
        return $this->hasMany(Hlablog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hlivebirths]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHlivebirths()
    {
        return $this->hasMany(Hlivebirth::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hmrhistos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmrhistos()
    {
        return $this->hasMany(Hmrhisto::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hmrsrevs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmrsrevs()
    {
        return $this->hasMany(Hmrsrev::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hmsslogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmsslogs()
    {
        return $this->hasMany(Hmsslog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hnewborns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHnewborns()
    {
        return $this->hasMany(Hnewborn::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hnurnotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHnurnotes()
    {
        return $this->hasMany(Hnurnote::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Holdnumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHoldnumber()
    {
        return $this->hasOne(Holdnumber::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hopdlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHopdlogs()
    {
        return $this->hasMany(Hopdlog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpallerts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpallerts()
    {
        return $this->hasMany(Hpallert::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpataccis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpataccis()
    {
        return $this->hasMany(Hpatacci::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpataccts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpataccts()
    {
        return $this->hasMany(Hpatacct::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatacots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatacots()
    {
        return $this->hasMany(Hpatacot::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatadjs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatadjs()
    {
        return $this->hasMany(Hpatadj::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatchrgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatchrgs()
    {
        return $this->hasMany(Hpatchrg::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatcons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatcons()
    {
        return $this->hasMany(Hpatcon::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatdetls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdetls()
    {
        return $this->hasMany(Hpatdetl::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatdieds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdieds()
    {
        return $this->hasMany(Hpatdied::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatdiscs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdiscs()
    {
        return $this->hasMany(Hpatdisc::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatgrpchrgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatgrpchrgs()
    {
        return $this->hasMany(Hpatgrpchrg::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatmsses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatmsses()
    {
        return $this->hasMany(Hpatmss::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatoccups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatoccups()
    {
        return $this->hasMany(Hpatoccup::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatouts()
    {
        return $this->hasMany(Hpatout::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpatrooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatrooms()
    {
        return $this->hasMany(Hpatroom::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpaychks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpaychks()
    {
        return $this->hasMany(Hpaychk::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpaykinds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpaykinds()
    {
        return $this->hasMany(Hpaykind::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpays()
    {
        return $this->hasMany(Hpay::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hperresps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHperresps()
    {
        return $this->hasMany(Hperresp::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphconts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphconts()
    {
        return $this->hasMany(Hphcont::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphiclogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphiclogs()
    {
        return $this->hasMany(Hphiclog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphicsums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphicsums()
    {
        return $this->hasMany(Hphicsum::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphtrns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphtrns()
    {
        return $this->hasMany(Hphtrn::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphyexams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphyexams()
    {
        return $this->hasMany(Hphyexam::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hphyfins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphyfins()
    {
        return $this->hasMany(Hphyfin::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hplans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHplans()
    {
        return $this->hasMany(Hplan::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hproclogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHproclogs()
    {
        return $this->hasMany(Hproclog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hprofservs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprofservs()
    {
        return $this->hasMany(Hprofserv::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hprogntes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprogntes()
    {
        return $this->hasMany(Hprognte::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpromises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpromises()
    {
        return $this->hasMany(Hpromise::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrefroms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrefroms()
    {
        return $this->hasMany(Hrefrom::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hreftos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHreftos()
    {
        return $this->hasMany(Hrefto::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hresacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHresacts()
    {
        return $this->hasMany(Hresact::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[HreturnOlds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHreturnOlds()
    {
        return $this->hasMany(HreturnOld::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrmres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrmres()
    {
        return $this->hasMany(Hrmres::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqdissues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqdissues()
    {
        return $this->hasMany(Hrqdissue::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqdreturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqdreturns()
    {
        return $this->hasMany(Hrqdreturn::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds()
    {
        return $this->hasMany(Hrqd::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrqds0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds0()
    {
        return $this->hasMany(Hrqd::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrxoissues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxoissues()
    {
        return $this->hasMany(Hrxoissue::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrxoreturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxoreturns()
    {
        return $this->hasMany(Hrxoreturn::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hrxos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxos()
    {
        return $this->hasMany(Hrxo::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hservelogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHservelogs()
    {
        return $this->hasMany(Hservelog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hservlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHservlogs()
    {
        return $this->hasMany(Hservlog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hsupcos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHsupcos()
    {
        return $this->hasMany(Hsupcos::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hsurgpats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHsurgpats()
    {
        return $this->hasMany(Hsurgpat::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hteleps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHteleps()
    {
        return $this->hasMany(Htelep::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvisitlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvisitlogs()
    {
        return $this->hasMany(Hvisitlog::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvitalsigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvitalsigns()
    {
        return $this->hasMany(Hvitalsign::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsbps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsbps()
    {
        return $this->hasMany(Hvsbp::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvshrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvshrs()
    {
        return $this->hasMany(Hvshr::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsintkes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsintkes()
    {
        return $this->hasMany(Hvsintke::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsothrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsothrs()
    {
        return $this->hasMany(Hvsothr::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsoutpts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsoutpts()
    {
        return $this->hasMany(Hvsoutpt::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsrrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsrrs()
    {
        return $this->hasMany(Hvsrr::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvsspecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsspecs()
    {
        return $this->hasMany(Hvsspec::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hvstemps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvstemps()
    {
        return $this->hasMany(Hvstemp::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hwrdtrns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHwrdtrns()
    {
        return $this->hasMany(Hwrdtrn::class, ['hpercode' => 'hpercode']);
    }
}
