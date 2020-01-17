<?php

namespace common\models;

use frontend\helper\Img;

/**
 * This is the model class for table "product_images".
 *
 * @property int $id
 * @property int $product_id
 * @property int $img
 */
class ProductImages extends \yii\db\ActiveRecord
{
   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
      return 'product_images';
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['product_id'], 'integer'],
         [['img'], 'string'],
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
         'img' => 'Image ',
      ];
   }

    /**
     * @return int
     */
    public function getSmImg()
    {
        return Img::getSmImg($this->img) ;
    }

   public static function GetImgs($id)
   {
      return self::find()->where(['product_id' => $id])->all();
   }
   public static function GetOan($id)
   {
      return self::find()->where(['product_id' => $id])->one();
   }
}
