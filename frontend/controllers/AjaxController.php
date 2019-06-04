<?php

namespace frontend\controllers;

use common\models\ProductImages;
use common\models\Products;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class AjaxController extends Controller
{
   public function beforeAction($action)
   {
      $this->enableCsrfValidation = false;
      return parent::beforeAction($action);
   }

   /**
    * Displays homepage.
    *
    * @return mixed
    */
   public function actionAddFav()
   {
      if (Yii::$app->request->isAjax) {
         \Yii::$app->response->format = Response::FORMAT_JSON;
         $post = Yii::$app->request->post();
         if (!empty($post['id'])) {
            $cookies_request = \Yii::$app->request->cookies;
            $cookies_response = \Yii::$app->response->cookies;
            $value = [];
            $cookie = $cookies_request->get('favorites');
            $action = 'Add';
            $value = $cookie ? (array)$cookie->value : [];
            if (($key = array_search($post['id'], $value)) !== false) {
               unset($value[$key]);
               $action = 'Remove';
            } else {
               array_push($value, $post['id']);
            }
            $cookies_response->add(new \yii\web\Cookie([
               'name' => 'favorites',
               'value' => $value,
            ]));
         }
      }
      return $action;
   }

   public function actionAddCart()
   {
      if (Yii::$app->request->isAjax) {
         \Yii::$app->response->format = Response::FORMAT_JSON;
         $post = Yii::$app->request->post();
         if (!empty($post['id'])) {
            $cookies_request = \Yii::$app->request->cookies;
            $cookies_response = \Yii::$app->response->cookies;
            $action = 'Add';
            $cookie = $cookies_request->get('carts');
            $value = $cookie ? (array)$cookie->value : [];
            $key = $this->Filter($value, $post['id']);
            if ($key !== false) {
               $temp = $value[$key];
               unset($value[$key]);
               array_push($value, [
                  'id' => $post['id'],
                  'count' => $temp['count'] + $post['count']
               ]);
            } else {
               array_push($value, [
                  'id' => $post['id'],
                  'count' => $post['count']
               ]);
            }

            $cookies_response->add(new \yii\web\Cookie([
               'name' => 'carts',
               'value' => $value,
            ]));
         }
      }
      return [
         'action' => $action,
         'product' => Products::findOne($post['id']),
         'img' => ProductImages::GetOan($post['id'])->img,
      ];
   }

   public function actionRemoveCart()
   {
      if (Yii::$app->request->isAjax) {
         \Yii::$app->response->format = Response::FORMAT_JSON;
         $post = Yii::$app->request->post();
         if (!empty($post['id'])) {
            $cookies_request = \Yii::$app->request->cookies;
            $cookies_response = \Yii::$app->response->cookies;
            $action = 'Remove';
            $cookie = $cookies_request->get('carts');
            $value = $cookie ? (array)$cookie->value : [];
            $key = $this->Filter($value, $post['id']);
            if ($key !== false) {
               unset($value[$key]);
            }
            $cookies_response->add(new \yii\web\Cookie([
               'name' => 'carts',
               'value' => $value,
            ]));
         }
      }
      return [
         'action' => $action,
      ];
   }

   function Filter($array, $id)
   {
      foreach ($array as $k => $a) {
         if ($a['id'] == $id) {
            return $k;
         }
      }
      return false;
   }
}