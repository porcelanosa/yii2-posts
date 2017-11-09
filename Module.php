<?php
    
    namespace porcelanosa\posts;
    
    /**
     * Class Module
     *
     * @var $image_url        string
     * @var $image_path_alias string
     * @package porcelanosa\posts
     */
        class Module extends \yii\base\Module
        {
            /**
             * @inheritdoc
             * @var $image_url string
             */
            public $controllerNamespace = 'porcelanosa\posts\controllers';
            public $image_url = '/userfiles/images';
            //public $image_path;
            public $image_path_alias = '@frontend/userfiles/images';
            
            /**
             * @var string The prefix for user module URL.
             *
             * @See [[GroupUrlRule::prefix]]
             */
            public $urlPrefix = 'posts';
            public $urlRules = [
                // posts with post_types 'articles'
                /*[
                    'pattern'  => 'articles',
                    'route'    => 'default/index',
                    'defaults' => ['post_type_slug' => 'articles'],
                ],
                [
                    'pattern'  => 'articles/<cat_slug>/<slug>',
                    'route'    => 'default/view',
                    'defaults' => ['post_type_slug' => 'articles'],
                ],
                // posts with post_types 'news'
                [
                    'pattern'  => 'news',
                    'route'    => 'default/index',
                    'defaults' => ['post_type_slug' => 'news'],
                ],
                [
                    'pattern'  => 'news/<cat_slug>/<slug>',
                    'route'    => 'default/view',
                    'defaults' => ['post_type_slug' => 'news'],
                ],*/
                // Posts
                'posts/<post_type_slug>/<cat_slug>/<slug>' => 'default/view',
                'posts/<post_type_slug>/<cat_slug>'        => 'default/catview',
                'posts/<post_type_slug>'                   => 'default/index',
            ];
            
            /**
             * @inheritdoc
             */
            /*public function init()
            {
                
                parent::init();
                
                // custom initialization code goes here
            }*/
        }
