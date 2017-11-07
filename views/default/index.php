<?php
    /**
     * @var $post_type \common\modules\posts\models\Posttypes
     * @var $posts     \common\modules\posts\models\Posts[]
     */
    
    use yii\helpers\Html;
    use yii\helpers\Url;

?>
<div class="posts-default-index">
    <h1><?=$post_type->name?></h1>
    <? foreach ($posts as $post): ?>
        <?=Html::a(
            $post->name,
            Url::toRoute(['/posts/default/view', 'post_type_slug' => $post_type->slug, 'cat_slug' => $post->cat->slug, 'slug' => $post->slug]));
        ?>
        <br>
    <? endforeach; ?>
</div>
