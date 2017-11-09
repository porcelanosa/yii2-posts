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
                if ($app->hasModule('posts') && ($module = $app->getModule('posts')) instanceof Module/* && $app->id === 'app-frontend'*/) {
                    
                    /*$configUrlRule          = [
                        'prefix' => 'posts',
                        'rules' => $module->urlRules,
                    ];
                    if ($module->urlPrefix != 'posts') {
                        $configUrlRule['routePrefix'] = 'posts';
                    }
                    $configUrlRule['class'] = 'yii\web\GroupUrlRule';
                    $rule                   = Yii::createObject($configUrlRule);*/
                    
                    //$app->urlManager->addRules([$rule], false);
                    $app->getUrlManager()->addRules(
                        $module->urlRules
                    );
                    //$app->get('urlManager')->rules[] = new GroupUrlRule($configUrlRule);
                }
            }
            
        }