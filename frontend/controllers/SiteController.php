<?php

namespace frontend\controllers;

use common\models\Brend;
use common\models\Categories;
use common\models\Checkout;
use common\models\CheckoutProd;
use common\models\LoginForm;
use common\models\ProductComments;
use common\models\ProductImages;
use common\models\Products;
use common\models\search\ProductsSearchStore;
use frontend\helper\Helper;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
   /**
    * {@inheritdoc}
    */
   public function behaviors()
   {
      return [
         'access' => [
            'class' => AccessControl::className(),
            'only' => ['logout', 'signup'],
            'rules' => [
               [
                  'actions' => ['signup'],
                  'allow' => true,
                  'roles' => ['?'],
               ],
               [
                  'actions' => ['logout'],
                  'allow' => true,
                  'roles' => ['@'],
               ],
            ],
         ],
         'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
               'logout' => ['post'],
            ],
         ],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function actions()
   {
      return [
         'error' => [
            'class' => 'yii\web\ErrorAction',
         ],
         'captcha' => [
            'class' => 'yii\captcha\CaptchaAction',
            'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
         ],
      ];
   }

   /**
    * Displays homepage.
    *
    * @return mixed
    */
   public function actionIndex()
   {
      $limit = 9;
      $cook = \Yii::$app->request->cookies->get('favorites');
      return $this->render('index', [

         'laptops' => Products::findAll(['category_id' => 14]),
         'smartphones' => Products::find()->where(['category_id' => 15])->limit($limit)->all(),
         'cameras' => Products::find()->where(['category_id' => 16])->limit($limit)->all(),
         'accessories' => Products::find()->where(['category_id' => 17])->limit($limit)->all(),

         'top_laptops' => Products::find()->where(['category_id' => 15])->orderBy(['stars' => SORT_DESC])->limit($limit)->all(),
         'top_smartphones' => Products::find()->where(['category_id' => 18])->orderBy(['stars' => SORT_DESC])->limit($limit)->all(),
         'top_cameras' => Products::find()->where(['category_id' => 19])->orderBy(['stars' => SORT_DESC])->limit($limit)->all(),
         'top_accessories' => Products::find()->where(['category_id' => 20])->orderBy(['stars' => SORT_DESC])->limit($limit)->all(),

         'top_sell_laptops' => Products::find()->where(['category_id' => 13])->orderBy(['buy_count' => SORT_DESC])->limit($limit)->all(),
         'top_sell_smartphones' => Products::find()->where(['category_id' => 14])->orderBy(['buy_count' => SORT_DESC])->limit($limit)->all(),
         'top_sell_cameras' => Products::find()->where(['category_id' => 18])->orderBy(['buy_count' => SORT_DESC])->limit($limit)->all(),

         'favorites' => $cook ? (array)$cook->value : [],
      ]);
   }

   public function actionWishList()
   {
      $cook = \Yii::$app->request->cookies->get('favorites');
      return $this->render('wish_list', [
         'products' => $cook ? (array)$cook->value : [],
      ]);
   }

   public function actionCartsList()
   {
      $cook = \Yii::$app->request->cookies->get('carts');
      $fav = \Yii::$app->request->cookies->get('favorites');
      return $this->render('carts_list', [
         'products' => $cook ? (array)$cook->value : [],
         'favorites' => $fav ? (array)$fav->value : [],
      ]);
   }

   public function actionCheckoutOk()
   {
      return $this->render('checkout_ok');
   }

   public function actionCheckout()
   {
      $cook = \Yii::$app->request->cookies->get('carts');
      $model = new Checkout();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
         if (Yii::$app->request->post('Products')) {
            foreach (Yii::$app->request->post('Products') as $k => $p) {
               $mod = new CheckoutProd();
               $mod->product_id = $p['id'];
               $mod->count = $p['count'];
               $mod->checkout_id = $model->id;
               $mod->save();
            }
         }
         $cookies = Yii::$app->response->cookies;
         $cookies->remove('carts');
         return $this->redirect(['checkout-ok']);
      }
      return $this->render('checkout', [
         'carts' => $cook ? (array)$cook->value : [],
         'model' => $model
      ]);
   }

   public function actionTest()
   {

   }

   public function actionView($id)
   {
      $model = new ProductComments();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
         return $this->redirect(['view', 'id' => $id]);
      }
      $product = Products::findOne($id);
      $comments = ProductComments::GetAll($id);
      $stars = ProductComments::GetCountRate($comments);
      Products::UpdateStars($id, $stars);
      if (empty($product)) {
         return $this->redirect('store');
      };
      $cook = \Yii::$app->request->cookies->get('favorites');
      return $this->render('view', [
         'product' => $product,
         'images' => ProductImages::GetImgs($id),
         'comments' => $comments,
         'stars' => $stars,
         'related' => Products::find()->where(['category_id' => $product->category_id])->limit(4)->all(),
         'favorites' => $cook ? (array)$cook->value : [],
      ]);
   }

   public function actionStore()
   {
      $searchModel = new ProductsSearchStore();
      $query = $searchModel->search(Yii::$app->request->queryParams);
      $countQuery = clone $query;
      $total_count = $countQuery->count();
      $cook = \Yii::$app->request->cookies->get('favorites');
      $pages = new Pagination([
            'totalCount' => $total_count,
            'defaultPageSize' => $searchModel->count
         ]
      );
      $models = $query->offset($pages->offset)
         ->limit($pages->limit)
         ->all();
//      print_r($cook);
       $Categories = Categories::find()->all();

      return $this->render('store', [
         'products' => $models,
         'pages' => $pages,
         'categories' => Categories::find()->all(),
         'brends' => Brend::find()->all(),
         'search' => $searchModel,
         'total_count' => $total_count,
         'favorites' => $cook ? (array)$cook->value : [],
         'get_top' => Products::find()->orderBy(['stars' => SORT_DESC])->limit(4)->all(),

      ]);
   }

   /**
    * Logs in a user.
    *
    * @return mixed
    */
   public function actionLogin()
   {
      if (!Yii::$app->user->isGuest) {
         return $this->goHome();
      }

      $model = new LoginForm();
      if ($model->load(Yii::$app->request->post()) && $model->login()) {
         return $this->goBack();
      } else {
         $model->password = '';

         return $this->render('login', [
            'model' => $model,
         ]);
      }
   }

   /**
    * Logs out the current user.
    *
    * @return mixed
    */
   public function actionLogout()
   {
      Yii::$app->user->logout();

      return $this->goHome();
   }

   /**
    * Displays contact page.
    *
    * @return mixed
    */
   public function actionContact()
   {
      $model = new ContactForm();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
         if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
         } else {
            Yii::$app->session->setFlash('error', 'There was an error sending your message.');
         }

         return $this->refresh();
      } else {
         return $this->render('contact', [
            'model' => $model,
         ]);
      }
   }

   /**
    * Displays about page.
    *
    * @return mixed
    */
   public function actionAbout()
   {
      return $this->render('about');
   }

   /**
    * Signs user up.
    *
    * @return mixed
    */
   public function actionSignup()
   {
      $model = new SignupForm();
      if ($model->load(Yii::$app->request->post())) {
         if ($user = $model->signup()) {
            if (Yii::$app->getUser()->login($user)) {
               return $this->goHome();
            }
         }
      }

      return $this->render('signup', [
         'model' => $model,
      ]);
   }

   /**
    * Requests password reset.
    *
    * @return mixed
    */
   public function actionRequestPasswordReset()
   {
      $model = new PasswordResetRequestForm();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
         if ($model->sendEmail()) {
            Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

            return $this->goHome();
         } else {
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
         }
      }

      return $this->render('requestPasswordResetToken', [
         'model' => $model,
      ]);
   }

   /**
    * Resets password.
    *
    * @param string $token
    * @return mixed
    * @throws BadRequestHttpException
    */
   public function actionResetPassword($token)
   {
      try {
         $model = new ResetPasswordForm($token);
      } catch (InvalidParamException $e) {
         throw new BadRequestHttpException($e->getMessage());
      }

      if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
         Yii::$app->session->setFlash('success', 'New password saved.');

         return $this->goHome();
      }

      return $this->render('resetPassword', [
         'model' => $model,
      ]);
   }
}
