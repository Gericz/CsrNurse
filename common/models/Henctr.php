<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%henctr}}".
 *
 * @property string $enccode
 * @property string $fhud
 * @property string $hpercode
 * @property string|null $upicode
 * @property string $encdate
 * @property string $enctime
 * @property string $toecode
 * @property string $sopcode1
 * @property string|null $sopcode2
 * @property string|null $sopcode3
 * @property string|null $patinform
 * @property string|null $patinfadd
 * @property string|null $patinftel
 * @property string|null $relacode
 * @property string|null $encstat
 * @property string|null $enclock
 * @property string|null $datemod
 * @property string|null $updsw
 * @property string $confdl
 * @property string|null $acctno
 * @property string|null $entryby
 * @property string|null $casetype
 * @property string|null $phicclaim
 * @property string|null $CRI
 * @property string|null $tacode
 *
 * @property CommunityLog $communityLog
 * @property Docsoap[] $docsoaps
 * @property Docsoap[] $docsoaps0
 * @property Henctr[] $enccodes
 * @property Henctr[] $enccodes0
 * @property Hpersonal $entryby0
 * @property Hadmcono[] $hadmconos
 * @property Hadmcons[] $hadmcons
 * @property Hadmlog $hadmlog
 * @property Hadmlog $hadmlog0
 * @property Harq[] $harqs
 * @property Hblack $hblack
 * @property Hccomp[] $hccomps
 * @property Hcert $hcert
 * @property Hconfine $hconfine
 * @property Hcrsward[] $hcrswards
 * @property Hdcnotes[] $hdcnotes
 * @property Hdcsched[] $hdcscheds
 * @property Hdedborn[] $hdedborns
 * @property Hdern[] $hderns
 * @property Hdethold[] $hdetholds
 * @property Hdocord[] $hdocords
 * @property Hdocord[] $hdocords0
 * @property Hdrugcos[] $hdrugcos
 * @property Hecase[] $hecases
 * @property Hencdiag[] $hencdiags
 * @property Herlog $herlog
 * @property Hfamexp[] $hfamexps
 * @property Hfamplan[] $hfamplans
 * @property Hfluid[] $hflus
 * @property Hlivebirth[] $hlivebirths
 * @property Hmrhisto[] $hmrhistos
 * @property Hmrsrev[] $hmrsrevs
 * @property Hmsslog[] $hmsslogs
 * @property Hnewborn[] $hnewborns
 * @property Hnurnote[] $hnurnotes
 * @property Hopdlog $hopdlog
 * @property Hpatacci[] $hpataccis
 * @property Hpatacct[] $hpataccts
 * @property Hpatacot[] $hpatacots
 * @property Hpatadj[] $hpatadjs
 * @property Hpatchrg[] $hpatchrgs
 * @property Hpatcon $hpatcon
 * @property Hpatdied $hpatdied
 * @property Hpatdisc[] $hpatdiscs
 * @property Hpatgrpchrg[] $hpatgrpchrgs
 * @property Hpatmss $hpatmss
 * @property Hpatout[] $hpatouts
 * @property Hpatroom[] $hpatrooms
 * @property Hpaychk[] $hpaychks
 * @property Hpaykind[] $hpaykinds
 * @property Hpay[] $hpays
 * @property Hperson $hpercode0
 * @property Hperson $hpercode1
 * @property Hperson[] $hpercodes
 * @property Hperresp $hperresp
 * @property Hphcont[] $hphconts
 * @property Hphicsum[] $hphicsums
 * @property Hphtrn[] $hphtrns
 * @property Hphyexam[] $hphyexams
 * @property Hphyfin $hphyfin
 * @property Hprofserv[] $hprofservs
 * @property Hprognte[] $hprogntes
 * @property Hpromise[] $hpromises
 * @property Hrefrom $hrefrom
 * @property Hrefto[] $hreftos
 * @property Hresact $hresact
 * @property HreturnOld[] $hreturnOlds
 * @property Hrqdissue[] $hrqdissues
 * @property Hrqdreturn[] $hrqdreturns
 * @property Hrqd[] $hrqds
 * @property Hrqd[] $hrqds0
 * @property Hrxoissue[] $hrxoissues
 * @property Hrxoreturn[] $hrxoreturns
 * @property Hrxo[] $hrxos
 * @property Hservelog $hservelog
 * @property Hservlog[] $hservlogs
 * @property Hsupcos[] $hsupcos
 * @property Hsurgpat[] $hsurgpats
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
class Henctr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%henctr}}';
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
            [['enccode', 'encdate', 'enctime'], 'required'],
            [['encdate', 'enctime', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['fhud'], 'string', 'max' => 19],
            [['hpercode', 'patinftel'], 'string', 'max' => 20],
            [['upicode'], 'string', 'max' => 12],
            [['toecode', 'sopcode1', 'sopcode2', 'sopcode3', 'relacode', 'casetype', 'tacode'], 'string', 'max' => 5],
            [['patinform'], 'string', 'max' => 60],
            [['patinfadd'], 'string', 'max' => 200],
            [['encstat', 'enclock', 'updsw', 'confdl', 'phicclaim', 'CRI'], 'string', 'max' => 1],
            [['acctno'], 'string', 'max' => 14],
            [['entryby'], 'string', 'max' => 10],
            [['enccode'], 'unique'],
            [['entryby'], 'exist', 'skipOnError' => true, 'targetClass' => Hpersonal::class, 'targetAttribute' => ['entryby' => 'employeeid']],
            [['hpercode'], 'exist', 'skipOnError' => true, 'targetClass' => Hperson::class, 'targetAttribute' => ['hpercode' => 'hpercode']],
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
            'fhud' => 'Fhud',
            'hpercode' => 'Hpercode',
            'upicode' => 'Upicode',
            'encdate' => 'Encdate',
            'enctime' => 'Enctime',
            'toecode' => 'Toecode',
            'sopcode1' => 'Sopcode1',
            'sopcode2' => 'Sopcode2',
            'sopcode3' => 'Sopcode3',
            'patinform' => 'Patinform',
            'patinfadd' => 'Patinfadd',
            'patinftel' => 'Patinftel',
            'relacode' => 'Relacode',
            'encstat' => 'Encstat',
            'enclock' => 'Enclock',
            'datemod' => 'Datemod',
            'updsw' => 'Updsw',
            'confdl' => 'Confdl',
            'acctno' => 'Acctno',
            'entryby' => 'Entryby',
            'casetype' => 'Casetype',
            'phicclaim' => 'Phicclaim',
            'CRI' => 'Cri',
            'tacode' => 'Tacode',
        ];
    }

    /**
     * Gets query for [[CommunityLog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommunityLog()
    {
        return $this->hasOne(CommunityLog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Docsoaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocsoaps()
    {
        return $this->hasMany(Docsoap::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Docsoaps0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocsoaps0()
    {
        return $this->hasMany(Docsoap::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Enccodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccodes()
    {
        return $this->hasMany(Henctr::class, ['enccode' => 'enccode'])->viaTable('{{%hadmlog}}', ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Enccodes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnccodes0()
    {
        return $this->hasMany(Henctr::class, ['enccode' => 'enccode'])->viaTable('{{%hadmlog}}', ['enccode' => 'enccode']);
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
     * Gets query for [[Hadmconos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmconos()
    {
        return $this->hasMany(Hadmcono::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hadmcons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmcons()
    {
        return $this->hasMany(Hadmcons::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hadmlog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlog()
    {
        return $this->hasOne(Hadmlog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hadmlog0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlog0()
    {
        return $this->hasOne(Hadmlog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Harqs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHarqs()
    {
        return $this->hasMany(Harq::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hblack]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHblack()
    {
        return $this->hasOne(Hblack::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hccomps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHccomps()
    {
        return $this->hasMany(Hccomp::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hcert]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHcert()
    {
        return $this->hasOne(Hcert::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hconfine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHconfine()
    {
        return $this->hasOne(Hconfine::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hcrswards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHcrswards()
    {
        return $this->hasMany(Hcrsward::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hdcnotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdcnotes()
    {
        return $this->hasMany(Hdcnotes::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hdcscheds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdcscheds()
    {
        return $this->hasMany(Hdcsched::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hdedborns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdedborns()
    {
        return $this->hasMany(Hdedborn::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hderns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHderns()
    {
        return $this->hasMany(Hdern::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hdetholds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdetholds()
    {
        return $this->hasMany(Hdethold::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hdocords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords()
    {
        return $this->hasMany(Hdocord::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hdocords0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords0()
    {
        return $this->hasMany(Hdocord::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hdrugcos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdrugcos()
    {
        return $this->hasMany(Hdrugcos::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hecases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHecases()
    {
        return $this->hasMany(Hecase::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hencdiags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHencdiags()
    {
        return $this->hasMany(Hencdiag::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Herlog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHerlog()
    {
        return $this->hasOne(Herlog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hfamexps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHfamexps()
    {
        return $this->hasMany(Hfamexp::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hfamplans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHfamplans()
    {
        return $this->hasMany(Hfamplan::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hflus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHflus()
    {
        return $this->hasMany(Hfluid::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hlivebirths]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHlivebirths()
    {
        return $this->hasMany(Hlivebirth::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hmrhistos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmrhistos()
    {
        return $this->hasMany(Hmrhisto::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hmrsrevs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmrsrevs()
    {
        return $this->hasMany(Hmrsrev::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hmsslogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHmsslogs()
    {
        return $this->hasMany(Hmsslog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hnewborns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHnewborns()
    {
        return $this->hasMany(Hnewborn::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hnurnotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHnurnotes()
    {
        return $this->hasMany(Hnurnote::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hopdlog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHopdlog()
    {
        return $this->hasOne(Hopdlog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpataccis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpataccis()
    {
        return $this->hasMany(Hpatacci::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpataccts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpataccts()
    {
        return $this->hasMany(Hpatacct::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatacots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatacots()
    {
        return $this->hasMany(Hpatacot::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatadjs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatadjs()
    {
        return $this->hasMany(Hpatadj::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatchrgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatchrgs()
    {
        return $this->hasMany(Hpatchrg::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatcon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatcon()
    {
        return $this->hasOne(Hpatcon::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatdied]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdied()
    {
        return $this->hasOne(Hpatdied::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatdiscs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatdiscs()
    {
        return $this->hasMany(Hpatdisc::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatgrpchrgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatgrpchrgs()
    {
        return $this->hasMany(Hpatgrpchrg::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatmss]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatmss()
    {
        return $this->hasOne(Hpatmss::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatouts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatouts()
    {
        return $this->hasMany(Hpatout::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpatrooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpatrooms()
    {
        return $this->hasMany(Hpatroom::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpaychks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpaychks()
    {
        return $this->hasMany(Hpaychk::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpaykinds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpaykinds()
    {
        return $this->hasMany(Hpaykind::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpays()
    {
        return $this->hasMany(Hpay::class, ['enccode' => 'enccode']);
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
     * Gets query for [[Hpercode1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercode1()
    {
        return $this->hasOne(Hperson::class, ['hpercode' => 'hpercode']);
    }

    /**
     * Gets query for [[Hpercodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpercodes()
    {
        return $this->hasMany(Hperson::class, ['hpercode' => 'hpercode'])->viaTable('{{%hphicsum}}', ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hperresp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHperresp()
    {
        return $this->hasOne(Hperresp::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hphconts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphconts()
    {
        return $this->hasMany(Hphcont::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hphicsums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphicsums()
    {
        return $this->hasMany(Hphicsum::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hphtrns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphtrns()
    {
        return $this->hasMany(Hphtrn::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hphyexams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphyexams()
    {
        return $this->hasMany(Hphyexam::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hphyfin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHphyfin()
    {
        return $this->hasOne(Hphyfin::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hprofservs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprofservs()
    {
        return $this->hasMany(Hprofserv::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hprogntes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHprogntes()
    {
        return $this->hasMany(Hprognte::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hpromises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpromises()
    {
        return $this->hasMany(Hpromise::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrefrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrefrom()
    {
        return $this->hasOne(Hrefrom::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hreftos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHreftos()
    {
        return $this->hasMany(Hrefto::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hresact]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHresact()
    {
        return $this->hasOne(Hresact::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[HreturnOlds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHreturnOlds()
    {
        return $this->hasMany(HreturnOld::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrqdissues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqdissues()
    {
        return $this->hasMany(Hrqdissue::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrqdreturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqdreturns()
    {
        return $this->hasMany(Hrqdreturn::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrqds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds()
    {
        return $this->hasMany(Hrqd::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrqds0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds0()
    {
        return $this->hasMany(Hrqd::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrxoissues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxoissues()
    {
        return $this->hasMany(Hrxoissue::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrxoreturns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxoreturns()
    {
        return $this->hasMany(Hrxoreturn::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hrxos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxos()
    {
        return $this->hasMany(Hrxo::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hservelog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHservelog()
    {
        return $this->hasOne(Hservelog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hservlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHservlogs()
    {
        return $this->hasMany(Hservlog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hsupcos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHsupcos()
    {
        return $this->hasMany(Hsupcos::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hsurgpats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHsurgpats()
    {
        return $this->hasMany(Hsurgpat::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvisitlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvisitlogs()
    {
        return $this->hasMany(Hvisitlog::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvitalsigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvitalsigns()
    {
        return $this->hasMany(Hvitalsign::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvsbps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsbps()
    {
        return $this->hasMany(Hvsbp::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvshrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvshrs()
    {
        return $this->hasMany(Hvshr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvsintkes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsintkes()
    {
        return $this->hasMany(Hvsintke::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvsothrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsothrs()
    {
        return $this->hasMany(Hvsothr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvsoutpts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsoutpts()
    {
        return $this->hasMany(Hvsoutpt::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvsrrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsrrs()
    {
        return $this->hasMany(Hvsrr::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvsspecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvsspecs()
    {
        return $this->hasMany(Hvsspec::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hvstemps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHvstemps()
    {
        return $this->hasMany(Hvstemp::class, ['enccode' => 'enccode']);
    }

    /**
     * Gets query for [[Hwrdtrns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHwrdtrns()
    {
        return $this->hasMany(Hwrdtrn::class, ['enccode' => 'enccode']);
    }
}
