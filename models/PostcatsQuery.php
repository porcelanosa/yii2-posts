<?php

namespace common\modules\posts\models;

/**
 * This is the ActiveQuery class for [[Postcats]].
 *
 * @see Postcats
 */
class PostcatsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Postcats[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Postcats|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}