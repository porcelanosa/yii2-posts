<?php
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 29.09.2017
     * Time: 18:39
     */
    /**
     * @var $post_type porcelanosa\posts\models\Posttypes
     * @var $post     porcelanosa\posts\models\Posts
     */
    
    use yii\helpers\Html;
    use yii\helpers\Url;
    $this->title = $post->title;
    
    $this->registerMetaTag([
        'name'    => 'description',
        'content' => $post->meta_descr != '' ? $post->meta_descr : $post->name
    ]);
?>
<h1><?=$post->name?></h1>
<?if($post->getMetaValue('price'))
    {
        echo $post->getMetaValue('price');
    }?>
<?=$post->text;?>
<?=$post->showThumb(200,200)?>
