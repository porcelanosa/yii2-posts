<?php

namespace porcelanosa\posts\models;

use Yii;

/**
 * This is the model class for table "post_types".
 *
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property string $title
 * @property string $meta_descr
 * @property integer $sort
 * @property integer $active
 */
class Posttypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'active'], 'integer'],
            [['slug', 'name', 'title', 'meta_descr'], 'string', 'max' => 255],
            [['slug', 'name'], 'required'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'title' => 'Title',
            'meta_descr' => 'Meta Descr',
            'sort' => 'Sort',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     * @return PosttypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PosttypesQuery(get_called_class());
    }
}
