<?php

namespace frontend\helper;

use common\models\Categories;
use common\models\ProductImages;
use common\models\Products;
use Yii;
use yii\helpers\Html;
use yii\helpers\Json;


/**
 * Site controller
 */
class Helper
{
    public static function getData($url)
    {
        //$url = 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/bluzki-i-rubashki?_ga=2.152896895.738933329.1578161378-1835853945.1578161378';
        // $url = 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/bluzki-i-rubashki';
        //  $url = 'https://www.wildberries.am/catalog/muzhchinam/odezhda/bryuki-i-shorty';
        $all_html = self::getContent($url);
        $pages = [];
        \phpQuery::newDocumentHTML($all_html);
        $parent_id = null;
        foreach (pq('.i-breadcrumbs.breadcrumbs div') as $k => $i) {
            if ($k > 0) {
                $dd = pq($i);
                $cat = $dd->find('span')->html();
                self::DD($cat);
                $existCat = Categories::findOne(['name' => $cat, 'parent_id' => $parent_id]);
                if (empty($existCat)) {
                    $catModel = new Categories();
                    $catModel->name = $cat;
                    $catModel->parent_id = $parent_id;
                    $catModel->save();
                    $parent_id = $catModel->id;
                } else {
                    $parent_id = $existCat->id;
                }
            }
        }
        foreach (pq('.dtList') as $i) {
            $dd = pq($i);
            array_push($pages, $dd->find('.ref_goods_n_p')->attr('href'));
        }

        foreach ($pages as $k => $page) {
//            if ($k > 10) {
//                die;
//            }
            self::getFromProduct($page, $parent_id);
        }
    }

    public static function getFromProduct($url, $parent_id)
    {
        $price = null;
        $content = self::getContent($url);
        $dom = \phpQuery::newDocumentHTML($content);
        $article = pq($dom)->find('span.j-article')->html();
        $cos = pq($dom)->find('span.final-cost')->html();
        $name = pq($dom)->find('span.name')->html();
        $sizes = pq($dom)->find('.j-size-list.size-list.j-smart-overflow-instance')->html();
        $composition = pq($dom)->find('span.j-composition.collapsable-content.j-toogle-height-instance')->html();
        $error = pq($dom)->find('p.card-error-report-info')->html();
        $description = pq($dom)->find('.params.j-collapsable-card-add-info.i-collapsable-v1')->html();
        $text = pq($dom)->find('.j-description.description-text.collapsable-content.j-toogle-height-instance')->html();
        if (!empty($cos)) {
            preg_match_all('!\d+!', $cos, $matches);
            self::DD($cos);
            $price = $matches[0][0];
        }
        $sizes_arr = [];

        foreach (pq('.size-list label') as $i) {
            $dd = pq($i);
            $siz = $dd->find('span')->html();
            array_push($sizes_arr, $siz);
        }
        if (empty(Products::findOne(['article' => $article]))) {
            $model = new Products();
            $model->article = $article;
            $model->name = $name;
            $model->sizes = Json::encode($sizes_arr);
            $model->composition = $composition;
            $model->error_info = $error;
            $model->description = Html::decode(trim($description));
            $model->category_id = $parent_id;
            $model->text = Html::decode(trim($text));
            $model->price = (int)$price;
            $model->save();

            foreach (pq('#scrollImage li') as $i) {
                $dd = pq($i);
                $img = $dd->find('a')->attr('href');
                if (strpos($img, '.jpg') !== false) {
                    $imgModel = new ProductImages();
                    $imgModel->img = $img;
                    $imgModel->product_id = $model->id;
                    $imgModel->save();
                }
            }
        }
    }

    public static function getContent($url)
    {
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Accept-language: en-US,en;q=0.9,ru;q=0.8\r\n" .
                    "Cookie: route=3a2c1a81ea8010497318bd4800321a289721f5e8; mobile_client=0; .AspNetCore.Antiforgery.stpccMUKFUM=CfDJ8OZvhYDWZcdJrE6x1lKb8afrgqq0qzhdqXsb7q-SGISmfm0Q7R9WXJpOCCJ7mbCYLwNPqvCV7SpwbT1F5LmGr4LNXJrzr9zlEr6TqhjiN75Tyw-2ArEgi1PPnn2eEi1F7rP2iFvG6mamoczLyRnjMH4; BasketUID=6df297a3-a42f-4126-a5f7-dc907b10abda; ___wbu=947c7d86-de0f-42d3-9143-170ef29deff8.1578161376; _gcl_au=1.1.1972867891.1578161377; _ga=GA1.2.1835853945.1578161378; _gid=GA1.2.738933329.1578161378; __catalogOptions=Sort%3APopular%26CardSize%3Ac246x328; _wbSes=CfDJ8OZvhYDWZcdJrE6x1lKb8afUutAtCJJ5735AQTC9KnPczP2bSwJrzhZnV0B0%2B%2B2VMNdWXqKu52Tn3wVrrWp6n0qgaiuwnwIiLxGdIc02HzTCSv1Am542fWjWgBpEaBIS3iCponG62FyC190OkzmVWcVepzpe6%2FeI54b%2BCGvmUzsW; ___wbs=94f14099-08c0-4ded-99f0-3fe089e96d1b.1578237285; __store=507_3158; __region=30_48_1_40; __pricemargin=1.00--; _dc_gtm_UA-2093267-11=1; .AspNetCore.Culture=c%3Dhy%7Cuic%3Dhy; ncache=0%3B507_3158%3B30_48_1_40%3B1.00--%3BSort%3APopular%26CardSize%3Ac246x328%3Bc%3Dhy%7Cuic%3Dhy\r\n"
            ]
        ];

        $context = stream_context_create($opts);
        return file_get_contents($url, false, $context);
    }

    public static function DD($x)
    {
        echo '<pre>';
        print_r($x);
        echo '</pre>';
    }

    public static function getCategoryTree()
    {
        self::fetchCategoryTreeList();
    }

    public static function fetchCategoryTreeList($parent = null, $user_tree_array = '', $d = 1)
    {

        if (!is_array($user_tree_array))
            $user_tree_array = array();

        $cats = Categories::findAll(['parent_id' => $parent]);
        if (!empty($cats)) {
            $class = $d == 1 ? 'id="tree"' : '';
            $user_tree_array[] = '<ul ' . $class . '>';
            foreach ($cats as $cat) {
                $user_tree_array[] = "<li>" . $cat->name . "</li>";
                $user_tree_array = self::fetchCategoryTreeList($cat->id, $user_tree_array, 2);
            }
            $user_tree_array[] = "</ul>";
        }
        return $user_tree_array;
    }

}