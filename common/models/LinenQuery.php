<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Linen]].
 *
 * @see Linen
 */
class LinenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Linen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Linen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
