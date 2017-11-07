<?php
    
    namespace common\modules\posts\models;
    
    use Yii;
    use yii\behaviors\TimestampBehavior;
    
    use common\components\behaviors\UploadBehavior;
    
    use common\components\helpers\ThumbHelper as Thumb;
    use yii\helpers\Html;
    use yii\helpers\Url;
    
    /**
     * This is the model class for table "posts".
     *
     * @property integer $id
     * @property integer $post_type_id
     * @property integer $post_cat_id
     * @property string  $slug
     * @property string  $name
     * @property string  $title
     * @property string  $meta_descr
     * @property string  $short_text
     * @property string  $text
     * @property string  $image
     * @property integer $updated_at
     * @property integer $created_at
     * @property integer $sort
     * @property integer $active
     */
    class Posts extends \yii\db\ActiveRecord
    {
    
        const IMAGE_PATH = '/upload/postimage/';
        public $metas; // мета данные из post_meta
        
        public function behaviors()
        {
            return [
                'file' => [
                    'class'           => UploadBehavior::className(),
                    'attributeName'   => 'image',
                    'savePath'        => '@userfiles/upload/postimage/',
                    'generateNewName' => true,
                    'protectOldValue' => true,
                ],
                TimestampBehavior::className(),
            ];
        }
        
        /**
         * @inheritdoc
         */
        public static function tableName()
        {
            return 'posts';
        }
        
        /**
         * @inheritdoc
         */
        public function rules()
        {
            return [
                [['post_type_id', 'post_cat_id', 'updated_at', 'created_at', 'sort', 'active'], 'integer'],
                [['short_text', 'text'], 'string'],
                [['slug', 'name', 'title', 'meta_descr'], 'string', 'max' => 255],
                [['slug', 'name', 'post_type_id', 'post_cat_id'], 'required'],
                [['slug'], 'unique'],
                [['image'], 'safe'],
                [['image'], 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'on' => ['insert', 'update']],
                ['metas', 'safe']
            ];
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getType()
        {
            return $this->hasOne(Posttypes::className(), ['id' => 'post_type_id']);
        }
        
        /**
         * @return \yii\db\ActiveQuery
         */
        public function getCat()
        {
            return $this->hasOne(Postcats::className(), ['id' => 'post_cat_id']);
        }
        
        /**
         * @return Postmeta
         */
        public function getMeta($key)
        {
            return Postmeta::find()->where(['post_id' => $this->id])->andWhere(['meta_key' => $key])->one();
        }
        
        /**
         * @return mixed
         */
        public function getMetaValue($key)
        {
            return Postmeta::find()->where(['post_id' => $this->id])->andWhere(['meta_key' => $key])->one()->meta_value;
        }
        
        /**
         * @inheritdoc
         */
        public function attributeLabels()
        {
            return [
                'id'           => 'ID',
                'post_type_id' => 'Тип',
                'post_cat_id'  => 'Категория',
                'slug'         => 'ЧПУ (URL)',
                'name'         => 'Заголовок',
                'title'        => 'Title',
                'meta_descr'   => 'Meta Descr',
                'short_text'   => 'Анонс',
                'text'         => 'Текст',
                'image'        => 'Изображение',
                'updated_at'   => 'Обновлен',
                'created_at'   => 'Создан',
                'sort'         => 'Порядок',
                'active'       => 'Показывать',
            ];
        }
        
        /**
         * @inheritdoc
         * @return PostsQuery the active query used by this AR class.
         */
        public static function find()
        {
            return new PostsQuery(get_called_class());
        }
        
        /**
         * @return string
         */
        public function showThumb($width, $height, $upload_folder_alias = null)
        {
            $upload_folder_alias = ($upload_folder_alias == null) ? Yii::getAlias('@userfiles') . self::IMAGE_PATH : $upload_folder_alias;
           
            if (
                file_exists($upload_folder_alias . $this->image)
                AND is_file($upload_folder_alias . $this->image)
                AND $this->image != ''
            ) {
                return
                    Thumb::thumbnailImg(
                        $upload_folder_alias . $this->image,
                        $width,
                        $height,
                        Thumb::THUMBNAIL_INSET,
                        ['alt' => $this->name],
                        75
                    );
            } else {
                return '';
            }
        }
    }
