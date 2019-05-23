<?php

namespace common\models;

use Yii;

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
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'stars', 'price', 'big_price', 'state', 'views', 'buy_count'], 'integer'],
            [['text', 'description'], 'string'],
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
}
