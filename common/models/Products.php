<?php

namespace common\models;

use yii\web\UploadedFile;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $text
 * @property string $description
 * @property int $stars
 * @property int $price
 * @property int $big_price
 * @property int $state
 * @property int $views
 * @property int $buy_count
 * @property int $imageFiles
 */
class Products extends \yii\db\ActiveRecord
{
   public $categories = [];
   public $price_from = 100;
   public $price_to = 10000;
   public $sort = 0;
   public $count = 20;
   public $word = '';

   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
      return 'products';
   }

   /**
    * @var UploadedFile[]
    */
   public $imageFiles;

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
//         [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
         [['category_id', 'stars', 'price', 'big_price', 'state', 'views', 'buy_count'], 'integer'],
         [['text', 'description'], 'string'],
         [['name'], 'string', 'max' => 255],
      ];
   }

   public function upload($id)
   {
      if ($this->validate()) {
         foreach ($this->imageFiles as $file) {
            $name = md5(microtime(true)) . '.' . $file->extension;
            $file->saveAs('uploads/' . $name);
            $model = new ProductImages();
            $model->product_id = $id;
            $model->img = $name;
            $model->save();
         }
         return true;
      } else {
         return false;
      }
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels()
   {
      return [
         'id' => 'ID',
         'category_id' => 'Category ID',
         'name' => 'Name',
         'text' => 'Text',
         'description' => 'Description',
         'stars' => 'Stars',
         'price' => 'Price',
         'big_price' => 'Big Price',
         'state' => 'State',
         'views' => 'Views',
         'buy_count' => 'Buy Count',
      ];
   }

   public static function UpdateStars($id, $count)
   {
      $model = self::findOne($id);
      $model->sort = $count;
      return $model->save();
   }

   public static function GetCountByCatId($id)
   {
      return self::find()->where(['category_id' => $id])->count();
   }
}
