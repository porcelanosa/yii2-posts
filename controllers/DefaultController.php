<?php

namespace porcelanosa\posts\controllers;

use porcelanosa\posts\models\Posts;
use porcelanosa\posts\models\Posttypes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `posts` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     *
     * @param $post_type_slug string
     *
     * @return string
     */
    public function actionIndex($post_type_slug)
    {
        $post_type = Posttypes::find()->where(['slug' => $post_type_slug])->one();
        $posts = Posts::find()->where(['post_type_id' => $post_type->id])->active()->all();
        return $this->render('index', ['posts' =>$posts, 'post_type' => $post_type]);
    }
    /**
     * Renders the index view for the module
     * @param $post_type_slug string
     * @return string
     */
    public function actionCatview($post_type_slug, $cat_slug)
    {
       
        return $this->render('catview', ['posts'=>$posts,'post_type'=>$post_type]);
    }
    /**
     * Renders the index view for the module
     * @param $post_type_slug string
     * @return string
     */
    public function actionView($post_type_slug, $cat_slug, $slug)
    {
       $post = Posts::find()->where(['slug'=>$slug])->active()->one();
       if(!$post) {
           throw new NotFoundHttpException('Публикация не найдена');
       }
        return $this->render('view', ['post'=>$post]);
    }
}
