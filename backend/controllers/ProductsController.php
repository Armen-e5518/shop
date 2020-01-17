<?php

namespace backend\controllers;

use common\models\ProductImages;
use common\models\Products;
use common\models\search\ProductsSearch;
use common\models\Urls;
use frontend\helper\Helper;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use function frontend\helper\get_http_response_code;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
   /**
    * {@inheritdoc}
    */
   public function behaviors()
   {
      return [
          'access' => [
              'class' => AccessControl::className(),
              'rules' => [
                  [
                      'allow' => true,
                      'roles' => ['@'],
                  ]
              ],
          ],
         'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
               'delete' => ['POST'],
            ],
         ],
      ];
   }

   /**
    * Lists all Products models.
    * @return mixed
    */
   public function actionIndex()
   {
      $searchModel = new ProductsSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
         'searchModel' => $searchModel,
         'dataProvider' => $dataProvider,
      ]);
   }

   /**
    * Displays a single Products model.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionView($id)
   {
      return $this->render('view', [
         'model' => $this->findModel($id),
      ]);
   }

   /**
    * Creates a new Products model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
   public function actionCreate()
   {
      $model = new Products();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
         $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
         $model->upload($model->id);
         return $this->redirect(['index']);
      }

      return $this->render('create', [
         'model' => $model,
      ]);
   }
    public function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    public function actionAdd()
    {

        $urls = Urls::find()->where(['status' => 0])->all();

        foreach ($urls as $url) {
            $url_loc = $url->url;
            if($this->get_http_response_code($url_loc) != "200"){
                $m = Urls::findOne($url->id);
                $m->status = 99;
                $m->save();
            }else{
                Helper::getData($url_loc);
                $m = Urls::findOne($url->id);
                $m->status = 1;
                $m->save();
            }
        }

        $model = new Products();
        Helper::getData('https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/bele');
        die;
        if($model->load(Yii::$app->request->post())){
            $m = Urls::findOne(['url'=>$model->url]);
            if (empty($m) && $m['status'] == 1) {
                Helper::getData($model->url);
                $url = new Urls();
                $url->url = $model->url;
                $url->save();
            }
        }
        return $this->render('add', [
            'model' => $model,
        ]);
    }
   /**
    * Updates an existing Products model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionUpdate($id)
   {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
//          echo '<pre>';
//          echo '<pre>';
//          print_r($_FILES);
//          die;
          if(!empty($_FILES['Products']['size']['imageFiles'][0])){
              $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
              $model->upload($model->id);
          }
         return $this->redirect(['index']);
      }

      return $this->render('update', [
         'model' => $model,
      ]);
   }

   /**
    * Deletes an existing Products model.
    * If deletion is successful, the browser will be redirected to the 'index' page.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
   public function actionDelete($id)
   {
      $this->findModel($id)->delete();

      return $this->redirect(['index']);
   }
    public function actionDeleteImg($id,$uid)
    {
        ProductImages::deleteAll(['id'=>$id]);

        return $this->redirect(['update','id'=>$uid]);
    }
   /**
    * Finds the Products model based on its primary key value.
    * If the model is not found, a 404 HTTP exception will be thrown.
    * @param integer $id
    * @return Products the loaded model
    * @throws NotFoundHttpException if the model cannot be found
    */
   protected function findModel($id)
   {
      if (($model = Products::findOne($id)) !== null) {
         return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
   }
}
