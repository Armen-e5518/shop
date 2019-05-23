<?php

namespace common\models;

use Yii;

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
}
