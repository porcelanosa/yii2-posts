<?php
    
    namespace porcelanosa\posts;
    
    /**
     * posts module definition class
     */
        class Module extends \yii\base\Module
        {
            /**
             * @inheritdoc
             */
            public $controllerNamespace = 'porcelanosa\posts\controllers';
            public $urlRules = [
                // posts with post_types 'articles'
                [
                    'pattern'  => 'articles',
                    'route'    => 'posts/default/index',
                    'defaults' => ['post_type_slug' => 'articles'],
                ],
                [
                    'pattern'  => 'articles/<cat_slug>/<slug>',
                    'route'    => 'posts/default/view',
                    'defaults' => ['post_type_slug' => 'articles'],
                ],
                // posts with post_types 'news'
                [
                    'pattern'  => 'news',
                    'route'    => 'posts/default/index',
                    'defaults' => ['post_type_slug' => 'news'],
                ],
                [
                    'pattern'  => 'news/<cat_slug>/<slug>',
                    'route'    => 'posts/default/view',
                    'defaults' => ['post_type_slug' => 'news'],
                ],
                // Posts
                [
                    'pattern' => 'posts/<post_type_slug>/<cat_slug>/<slug>',
                    'route'   => 'posts/default/view'
                ],
                [
                    'pattern' => 'posts/<post_type_slug>/<cat_slug>',
                    'route'   => 'posts/default/catview'
                ],
                [
                    'pattern' => 'posts/<post_type_slug>',
                    'route'   => 'posts/default/index'
                ]
            ];
            
            /**
             * @inheritdoc
             */
            public function init()
            {
                parent::init();
                
                // custom initialization code goes here
            }
        }
