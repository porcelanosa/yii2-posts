<?php

namespace common\modules\posts\models;

use Yii;

/**
 * This is the model class for table "post_meta".
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $meta_key
 * @property string $meta_value
 */
class Postmeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'integer'],
            [['meta_value'], 'string'],
            [['meta_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'meta_key' => 'Meta Key',
            'meta_value' => 'Text',
        ];
    }

    /**
     * @inheritdoc
     * @return PostmetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostmetaQuery(get_called_class());
    }
}
