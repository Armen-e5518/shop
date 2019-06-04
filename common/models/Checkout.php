<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "checkout".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $notes
 * @property string $date
 * @property string $status
 */
class Checkout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checkout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['notes'], 'string'],
            [['date'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
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
            'email' => 'Email',
            'phone' => 'Phone',
            'notes' => 'Notes',
            'date' => 'Date',
            'status' => 'status',
        ];
    }
}
