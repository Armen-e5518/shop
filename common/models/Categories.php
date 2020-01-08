<?php

namespace common\models;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 */
class Categories extends \yii\db\ActiveRecord
{
   /**
    * {@inheritdoc}
    */
   public static function tableName()
   {
      return 'categories';
   }

   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['name'], 'required'],
         [['parent_id'], 'integer'],
         [['name'], 'string', 'max' => 255],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels()
   {
      return [
         'id' => 'ID',
         'name' => 'Name',
         'parent_id' => 'Parent',
      ];
   }

   public static function GetAll()
   {
      return self::find()->select(['name', 'id'])->indexBy('id')->column();
   }

   public static function GetName($id)
   {
      return self::findOne($id)['name'];
   }
}
