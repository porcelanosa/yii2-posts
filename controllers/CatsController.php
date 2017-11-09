<?php
    
    namespace porcelanosa\posts\controllers;
        
        use Yii;
        use porcelanosa\posts\models\Postcats;
        use porcelanosa\posts\models\search\PostcatsSearch;
//use backend\controllers\BasebackendController;
        use yii\web\Controller;
        use yii\web\NotFoundHttpException;
    
        use yii\filters\VerbFilter;
        use yii\filters\AccessControl;
        
        /**
         * CatsController implements the CRUD actions for Postcats model.
         */
        class CatsController extends Controller
        {
            /**
             * @inheritdoc
             */
            public function behaviors()
            {
                return [
                    'access' => [
                        'class' => AccessControl::className(),
                        /*'ruleConfig' => [
                            'class' => AccessRule::className(),
                        ],*/
                        'rules' => [
                            [
                                'actions' => ['login', 'error'],
                                'allow'   => true,
                            ],
                            [
                                'actions' => ['logout'],
                                'allow'   => true,
                                'roles'   => ['@'],
                            ],
                            [
                                'allow'        => true,
                                'roles' => [ 'administrator' ],
                            ],
                        ],
                    ],
                    'verbs'  => [
                        'class'   => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['POST'],
                        ],
                    ],
                ];
            }
            
            /**
             * Lists all Postcats models.
             *
             * @return mixed
             */
            public function actionIndex()
            {
                $searchModel  = new PostcatsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                
                return $this->render('index', [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
            
            /**
             * Displays a single Postcats model.
             *
             * @param integer $id
             *
             * @return mixed
             */
            public function actionView($id)
            {
                return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
            }
            
            /**
             * Creates a new Postcats model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             *
             * @return mixed
             */
            public function actionCreate()
            {
                $model = new Postcats();
                
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
            
            /**
             * Updates an existing Postcats model.
             * If update is successful, the browser will be redirected to the 'update' page.
             *
             * @param integer $id
             *
             * @return mixed
             */
            public function actionUpdate()
            {
                $id = Yii::$app->request->get('id');
                $model = $this->findModel($id);
                
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                } else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }
            
            /**
             * Deletes an existing Postcats model.
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
             * Finds the Postcats model based on its primary key value.
             * If the model is not found, a 404 HTTP exception will be thrown.
             *
             * @param integer $id
             *
             * @return Postcats the loaded model
             * @throws NotFoundHttpException if the model cannot be found
             */
            protected function findModel($id)
            {
                if (($model = Postcats::findOne($id)) !== null) {
                    return $model;
                } else {
                    throw new NotFoundHttpException('The requested page does not exist.');
                }
            }
        }
