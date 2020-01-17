<?php

namespace frontend\helper;

use common\models\Categories;
use common\models\ProductImages;
use common\models\Products;
use common\models\Urls;
use http\Url;
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
       // $all_html = self::getContent('ddd.html');

//echo $all_html;
//die;
        $pages = [];
        \phpQuery::newDocumentHTML($all_html);


//        foreach (pq('#top-menu-inner li') as $i) {
//            $dd = pq($i);
//            $href = $dd->find('a')->attr('href');
//
//            if (strpos($href, 'https://www.wildberries.am/catalog/') !== false) {
//                $mod = Urls::findOne(['url'=>$href]);
//                if(empty($mod)){
//                    $m = new Urls();
//                    $m->url = $href;
//                    $m->status = 0;
//                    $m->save();
//                }
//            }
//        }
//        echo 'ok';
//        die;

        $parent_id = null;
        foreach (pq('.i-breadcrumbs.breadcrumbs div') as $k => $i) {
            if ($k > 0) {
                $dd = pq($i);
                $cat = $dd->find('span')->html();
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

    public static function getFromProduct($url, $parent_id, $isColorMod = false)
    {
        $dd = explode("/", $url);

        if (!empty(Products::findOne(['article' => $dd[4]]))) {
            return true;
        }
        //   $url = 'https://www.wildberries.am/catalog/9772420/detail.aspx?targetUrl=GP';
        $price = null;
        $content = self::getContent($url);
        $dom = \phpQuery::newDocumentHTML($content);
        $article = pq($dom)->find('span.j-article')->html();
        $cos = pq($dom)->find('span.final-cost')->html();
        $name = pq($dom)->find('span.name')->html();
        $composition = pq($dom)->find('.j-composition')->html();
        $error = pq($dom)->find('p.card-error-report-info')->html();
        $description = pq($dom)->find('.params.j-collapsable-card-add-info.i-collapsable-v1')->html();
        $text = pq($dom)->find('.j-description.description-text.collapsable-content.j-toogle-height-instance')->html();
        if (!empty($cos)) {
            preg_match_all('!\d+!', $cos, $matches);
            $price = $matches[0][0];
        }
        $sizes_arr = [];
        foreach (pq('.j-size-list label') as $i) {
            $dd = pq($i);
            $siz = $dd->find('span')->html();
            array_push($sizes_arr, $siz);
        }
        $colors_arr = [];
        if (!empty(pq('.j-colors-list')->html()) && !$isColorMod) {
            foreach (pq('.j-colors-list ul li') as $i) {
                $dd = pq($i);
                $color_url = $dd->find('a')->attr('href');
                $color_title = $dd->find('a img')->attr('title');
                $color_img = $dd->find('a img')->attr('src');
                $color_item = [];
                $color_item['id'] = self::getFromProduct($color_url, $parent_id, true);
                $color_item['color'] = $color_title;
                $color_item['img'] = $color_img;
                array_push($colors_arr, $color_item);
            }
//            self::DD($colors_arr);
//           die;
        }
        $model = Products::findOne(['article' => $article]);

        if (empty($model)) {
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
            if (!$model->save()) {
                //   self::DD($model->getErrors());

            };
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
        if (!empty($colors_arr && !$isColorMod)) {

            foreach ($colors_arr as $item) {
                $mod = Products::findOne($item['id']);

                if (!empty($mod)) {
                    $mod->color = Json::encode($colors_arr);
                    $mod->save();
                }
            }
        }
        return $model ? $model->id : null;
    }

    public static function getContent($url)
    {
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Accept-language: en-US,en;q=0.9,ru;q=0.8\r\n" .
                    "Cookie: mobile_client=0; BasketUID=6df297a3-a42f-4126-a5f7-dc907b10abda; ___wbu=947c7d86-de0f-42d3-9143-170ef29deff8.1578161376; _gcl_au=1.1.1972867891.1578161377; _ga=GA1.2.1835853945.1578161378; .AspNetCore.Culture=c%3Dhy%7Cuic%3Dhy; _gid=GA1.2.1196546652.1578395302; route=3a2c1a81ea8010497318bd4800321a289721f5e8; .AspNetCore.Antiforgery.stpccMUKFUM=CfDJ8OZvhYDWZcdJrE6x1lKb8afMdXvdOsdBTBe2EME8etBjwqzBrFNLdLM8oHOvVABRZ6LS-U5OXMUDq9pU7mhlUtoePYszBTXNz2Q65p_D5HNjgdJJ4jW5Zxjqweyt4q-822xh8bZS7KudReKBcZ1Ibjs; _gcl_aw=GCL.1578478616.CjwKCAiAmNbwBRBOEiwAqcwwpSk446toprTWQYPDnzI29VEsqIfXtF4iQ1pF8P23n5cZQf55se_udxoCHrkQAvD_BwE; _gac_UA-2093267-11=1.1578478617.CjwKCAiAmNbwBRBOEiwAqcwwpSk446toprTWQYPDnzI29VEsqIfXtF4iQ1pF8P23n5cZQf55se_udxoCHrkQAvD_BwE; _wbSes=CfDJ8OZvhYDWZcdJrE6x1lKb8aelBtAZBccdYITeEQcGg9Pr%2F2imSpjMbt540XmHbrL0hVvdkXJ9hSOi9KIOgnU9oRnupnYL3itBfNAlyDxAWGkI5aIQtka3PuUV%2FfvK0vi%2FG%2Fz395vExoVJ0saex4HfM1BiMIBHmcTAlv%2FP9b3XXhmc; __catalogOptions=Sort%3APopular%26CardSize%3Ac246x328; ___wbs=2130971e-f6f5-4464-9d8a-9492c08fcf12.1578571968; __wbl=cityId%3D2376595%26regionId%3D2376595%26city%3D%D0%95%D1%80%D0%B5%D0%B2%D0%B0%D0%BD%26phone%3D37498675551%26latitude%3D40%2C177628%26longitude%3D44%2C512546; __store=507_3158; __region=30_48_1_40; __pricemargin=1.00--; ncache=0%3B507_3158%3B30_48_1_40%3B1.00--%3BSort%3APopular%26CardSize%3Ac246x328%3Bc%3Dhy%7Cuic%3Dhy\r\n"
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