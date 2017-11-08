<?php
    
    /*
     * This file is part of the Porcelanosa project.
     *
     * (c) Porcelanosa project <http://github.com/porcelanosa/>
     *
     */
    
    namespace porcelanosa\posts;
        
        use Yii;
        use yii\base\BootstrapInterface;
        use yii\console\Application as ConsoleApplication;
        
        /**
         * Bootstrap class registers module and user application component. It also creates some url rules which will be applied
         * when UrlManager.enablePrettyUrl is enabled.
         */
        class Bootstrap implements BootstrapInterface
        {
            
            /** @inheritdoc */
            public function bootstrap($app)
            {
                /** @var Module $module */
                if ($app->hasModule('posts') && ($module = $app->getModule('posts')) instanceof Module) {
                    
                    
                    $configUrlRule['class'] = 'yii\web\GroupUrlRule';
                    $rule                   = Yii::createObject($configUrlRule);
                    
                    $app->urlManager->addRules([$rule], false);
                }
            }
            
        }