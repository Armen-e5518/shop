<?php

namespace common\models;

/**
 * This is the model class for table "product_comments".
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property int $star
 * @property string $date
 */
class ProductComments extends \yii\db\ActiveRecord
{
   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
      return 'product_comments';
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['product_id', 'star'], 'integer'],
         [['comment'], 'string'],
         [['date'], 'safe'],
         [['name', 'email'], 'string', 'max' => 255],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels()
   {
      return [
         'id' => 'ID',
         'product_id' => 'Product ID',
         'name' => 'Name',
         'email' => 'Email',
         'comment' => 'Comment',
         'star' => 'Star',
         'date' => 'Date',
      ];
   }

   public static function GetAll($id)
   {
      return self::find()->where(['product_id' => $id])->orderBy(['id' => SORT_DESC])->all();
   }

   public static function GetCountRate($comment)
   {
      if (empty($comment)) return 0;
      $all = 0;
      $c = 0;
      foreach ($comment as $item) {
         if ($item->star > 0) {
            $all += $item->star;
            $c++;
         }
      }
      return round($all / $c, 2);
   }
}
