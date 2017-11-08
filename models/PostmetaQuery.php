<?php

namespace porcelanosa\posts\models;

/**
 * This is the ActiveQuery class for [[Postmeta]].
 *
 * @see Postmeta
 */
class PostmetaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Postmeta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Postmeta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
