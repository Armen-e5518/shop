<?php

namespace common\models\search;

use common\models\Products;
use yii\base\Model;

/**
 * ProductsSearch represents the model behind the search form of `common\models\Products`.
 */
class ProductsSearchStore extends Products
{
   /**
    * {@inheritdoc}
    */
   public function rules()
   {
      return [
         [['categories', 'brends','price_from', 'price_to', 'sort', 'count'], 'integer'],
         [['word'], 'string'],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function scenarios()
   {
      // bypass scenarios() implementation in the parent class
      return Model::scenarios();
   }


   public function search($params)
   {

      $query = Products::find();

      $this->load($params);
//      echo '<pre>';
//      print_r($this->categories);
//      die;
      if (!empty($this->categories[0]) && $this->categories[0] == 0 && empty($this->categories[1])) {
         $this->categories = [];
      }
       if (!empty($this->brends[0]) && $this->brends[0] == 0 && empty($this->brends[1])) {
           $this->brends = [];
       }
      $query->andFilterWhere([
         'category_id' => $this->categories,
         'brend_id' => $this->brends,
      ]);
      $query->andFilterWhere(['>', 'price', $this->price_from])
         ->andFilterWhere(['<', 'price', $this->price_to])
         ->andFilterWhere([
               'or',
               ['like', 'description', $this->word],
               ['like', 'text', $this->word],
               ['like', 'name', $this->word],]
         );

      if ($this->sort == 0) {
         $query->orderBy(['price' => SORT_ASC]);
      } else {
         $query->orderBy(['stars' => SORT_DESC]);
      }
      return $query;
   }
}
