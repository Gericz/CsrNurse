<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Brlst]].
 *
 * @see Brlst
 */
class BrlstQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Brlst[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Brlst|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
