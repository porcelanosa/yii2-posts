<?php

namespace porcelanosa\posts\models;

/**
 * This is the ActiveQuery class for [[Posttypes]].
 *
 * @see Posttypes
 */
class PosttypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Posttypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Posttypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
