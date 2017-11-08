<?php

namespace porcelanosa\posts\models;

use Yii;

/**
 * This is the model class for table "post_cats".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $name
 * @property string $title
 * @property string $meta_descr
 * @property string $short_text
 * @property string $text
 * @property string $image
 * @property integer $sort
 * @property integer $active
 */
class Postcats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_cats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort', 'active'], 'integer'],
            [['short_text', 'text'], 'string'],
            [['slug', 'name', 'title', 'meta_descr'], 'string', 'max' => 255],
            [['image'], 'safe'],
            [['slug', 'name'], 'required'],
            [['slug'], 'unique'],
            [['image'], 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'on' => ['insert', 'update']],
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['post_cat_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'slug' => 'ЧПУ (URL)',
            'name' => 'Название',
            'title' => 'Title',
            'meta_descr' => 'Meta Descr',
            'short_text' => 'Анонс',
            'text' => 'Описание',
            'image' => 'Изображение',
            'sort' => 'Порядок',
            'active' => 'Показывать',
        ];
    }

    /**
     * @inheritdoc
     * @return PostcatsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostcatsQuery(get_called_class());
    }
}
