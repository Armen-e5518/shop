<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "socsites".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $icon
 */
class Socsites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'socsites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'icon'], 'string', 'max' => 255],
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
            'link' => 'Link',
            'icon' => 'Icon',
        ];
    }
}
