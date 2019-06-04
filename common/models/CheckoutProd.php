<?php

namespace common\models;

/**
 * This is the model class for table "checkout_prod".
 *
 * @property int $id
 * @property int $checkout_id
 * @property int $product_id
 * @property int $count
 */
class CheckoutProd extends \yii\db\ActiveRecord
{
   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
      return 'checkout_prod';
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['checkout_id', 'product_id','count'], 'integer'],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels()
   {
      return [
         'id' => 'ID',
         'checkout_id' => 'Checkout ID',
         'product_id' => 'Product ID',
         'count' => 'count',
      ];
   }

   public static function GetAllByProdId($id)
   {
      return (new \yii\db\Query())
         ->select(
            [
               'cp.count',
               'p.*',
            ])
         ->from(self::tableName() . ' cp')
         ->leftJoin(Products::tableName() . ' p', 'p.id = cp.product_id')
         ->where(['cp.checkout_id' => $id,])
         ->all();
   }
}
