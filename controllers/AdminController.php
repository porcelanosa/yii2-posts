<?php
    
    namespace porcelanosa\posts\controllers;
    
    //use backend\controllers\BasebackendController as Controller;
    use yii\web\Controller;
    use cporcelanosa\posts\models\Postmeta;
    use porcelanosa\yii2togglecolumn\ToggleAction;
    use Yii;
    use porcelanosa\posts\models\Posts;
    use porcelanosa\posts\models\search\PostsSearch;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;
    
    /**
     * Default controller for the `pages` module
     */
    class AdminController extends Controller
    {
        public function actions()
        {
            return [
                'toggle' => [
                    'class'      => ToggleAction::className(),
                    'modelClass' => Posts::className(),
                    // Uncomment to enable flash messages
                    //'setFlash' => true,
                    'attribute'  => 'active',
                    'primaryKey' => 'id'
                ],
            ];
        }
        
        /**
         * Lists all Pages models.
         *
         * @return mixed
         */
        public function actionIndex()
        {
            $searchModel  = new PostsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
        /**
         * Creates a new Pages model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         *
         * @return mixed
         */
        public function actionCreate()
        {
            $model = new Posts();
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                if (Yii::$app->request->post('metas') != null) {
                
                }
                
                return $this->redirect(['update', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        
        /**
         * Updates an existing Pages model.
         * If update is successful, the browser will be redirected to the 'view' page.
         *
         * @param integer $id
         *
         * @return mixed
         * @throws NotFoundHttpException
         */
        public function actionUpdate($id)
        {
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                
                $metas = Yii::$app->request->post()['Posts']['metas'];
                if ($metas != null) {
                    foreach ($metas as $meta_key => $meta_value) {
                        if ($model->getMeta($meta_key)) {
                            $metaModel = $model->getMeta($meta_key);
                        } else {
                            $metaModel = new Postmeta();
                        }
                        $metaModel->post_id    = $model->id;
                        $metaModel->meta_key   = $meta_key;
                        $metaModel->meta_value = $meta_value;
                        $metaModel->save();
                    }
                }
                
                return $this->redirect(['update', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        
        /**
         * Deletes an existing Pages model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         *
         * @param integer $id
         *
         * @return mixed
         */
        public function actionDelete($id)
        {
            $this->findModel($id)->delete();
            
            return $this->redirect(['index']);
        }
        
        /**
         * Finds the Pages model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         *
         * @param integer $id
         *
         * @return Posts the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id)
        {
            if (($model = Posts::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }
