<?php

namespace common\models;

use yii\web\UploadedFile;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property int $brend_id
 * @property string $name
 * @property string $text
 * @property string $description
 * @property int $stars
 * @property int $price
 * @property int $state
 * @property int $views
 * @property int $buy_count
 * @property int $imageFiles
 * @property int $article
 * @property int $error_info
 * @property int $sizes
 * @property int $color
 * @property int $composition
 */
class Products extends \yii\db\ActiveRecord
{
    public $url;
    public $categories = [];
    public $brends = [];
    public $price_from = 100;
    public $price_to = 1000000;
    public $sort = 0;
    public $count = 18;
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
            [['category_id', 'brend_id', 'stars', 'price', 'state', 'views', 'buy_count','article'], 'integer'],
            [['text', 'description','url'], 'string'],
            [['name','error_info','sizes','color','composition'], 'string'],
        ];
    }

    public function upload($id)
    {
        if ($this->validate()) {
            // ProductImages::deleteAll(['product_id' => $id]);
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
            'brend_id' => 'Brend ID',
            'name' => 'Name',
            'text' => 'Text',
            'description' => 'Description',
            'stars' => 'Stars',
            'price' => 'Price',
            'state' => 'State',
            'views' => 'Views',
            'buy_count' => 'Buy Count',
            'article' => 'Article',
            'error_info' => 'error_info',
            'sizes' => 'sizes',
            'color' => 'color',
            'composition' => 'composition',
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

    public static function GetCountByBrId($id)
    {
        return self::find()->where(['brend_id' => $id])->count();
    }
}
