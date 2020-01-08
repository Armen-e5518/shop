<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

Yii::$app->language = 'en-US';
AppAsset::register($this);
$categories = \common\models\Categories::find()->all();
$cook = \Yii::$app->request->cookies->get('favorites');
$carts = \Yii::$app->request->cookies->get('carts');
$cook_count = $cook ? count($cook->value) : 0;
$carts_count = $carts ? count($carts->value) : 0;
$carts = $carts ? $carts->value : [];
//var_dump(Yii::t('app','dev'));
//die;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/main/css/bootstrap.min.css"/>
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/main/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/main/css/slick-theme.css"/>
    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/main/css/nouislider.min.css"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/main/css/font-awesome.min.css">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/main/css/style.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="tel:+37494322396"><i class="fa fa-phone"></i>+37494-32-23-96 <?=Yii::t('app','dev')?></a></li>
                <li><a href="mailto:armen5518@gmail.com"><i class="fa fa-envelope-o"></i>armen5518@gmail.com</a></li>
                <li><a target="_blank"
                       href="https://www.google.com/maps/place/%D0%9E%D0%BF%D0%B5%D1%80%D0%BD%D1%8B%D0%B9+%D1%82%D0%B5%D0%B0%D1%82%D1%80/@40.1860722,44.5162101,18z/data=!4m5!3m4!1s0x406abce217b8839d:0x80bc65ebce1f70f!8m2!3d40.1858221!4d44.5150673"><i
                                class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->
    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="/" class="logo">
                            <img src="/main/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <?php $form = \yii\widgets\ActiveForm::begin([
                            'action' => '/site/store',
                            'method' => 'get',
                        ]); ?>
                        <input class="input" value="<?= !empty($this->params['word']) ? $this->params['word'] : ''; ?>"
                               name="ProductsSearchStore[word]" placeholder="Search here">
                        <button class="search-btn">Search</button>
                        <?php \yii\widgets\ActiveForm::end(); ?>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div id="Wishlist">
                            <a href="/site/wish-list">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty" id="fav_count"><?= $cook_count ?></div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="cart-cont" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty" id="carts_id"><?= $carts_count ?></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list" id="cart-list">
                                    <?php if (!empty($carts)): ?>
                                        <?php foreach ($carts as $cart):
                                            $model = \common\models\Products::findOne($cart['id']);
                                            $img = \common\models\ProductImages::GetOan($cart['id'])->img;
                                            ?>
                                            <div class="product-widget" data-id="<?= $cart['id'] ?>">
                                                <div class="product-img">
                                                    <img src="/admin/uploads/<?= $img ?>" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a
                                                                href="/site/view?id=<?= $model->id ?>"><?= $model->name ?></a>
                                                    </h3>
                                                    <h4 class="product-price" data-price="<?= $model->price ?>">
                                                        <span class="qty"><span
                                                                    class="product_count"><?= $cart['count'] ?></span>x</span>$<?= $model->price ?>
                                                        .00
                                                    </h4>
                                                </div>
                                                <button class="delete remove_cart" data-id="<?= $model->id ?>"><i
                                                            class="fa fa-close"></i></button>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="cart-summary">
                                    <small><span class="item-count"></span> Item(s) selected</small>
                                    <h5>SUBTOTAL: $<span class="total-price"></span>.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="/site/carts-list">View Cart</a>
                                    <a href="/site/checkout">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">

                <li class="<?= !empty($this->params['menu']) && $this->params['menu'] == 'home' ? 'active' : '' ?>"><a
                            href="/">Home</a></li>
                <li class="<?= !empty($this->params['menu']) && $this->params['menu'] == 'shop' ? 'active' : '' ?>"><a
                            href="/site/store">Shop</a></li>
                <!--            <li><a href="#">Categories</a></li>-->
                <!--            <li><a href="#">Laptops</a></li>-->
                <!--            <li><a href="#">Smartphones</a></li>-->
                <!--            <li><a href="#">Cameras</a></li>-->
                <!--            <li><a href="#">Accessories</a></li>-->
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
<?= $content ?>
<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut.</p>
                        <ul class="footer-links">
                            <li><a href="tel:+37494322396"><i class="fa fa-phone"></i>+37494-32-23-96</a></li>
                            <li><a href="mailto:armen5518@gmail.com"><i class="fa fa-envelope-o"></i>armen5518@gmail.com</a>
                            </li>
                            <li><a target="_blank"
                                   href="https://www.google.com/maps/place/%D0%9E%D0%BF%D0%B5%D1%80%D0%BD%D1%8B%D0%B9+%D1%82%D0%B5%D0%B0%D1%82%D1%80/@40.1860722,44.5162101,18z/data=!4m5!3m4!1s0x406abce217b8839d:0x80bc65ebce1f70f!8m2!3d40.1858221!4d44.5150673"><i
                                            class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="/site/store">Hot deals</a></li>
                            <li><a href="/site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=1">Laptops</a></li>
                            <li><a href="/site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=2">Smartphones</a></li>
                            <li><a href="/site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=3">Cameras</a></li>
                            <li><a href="/site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=4">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="/site/about">About Us</a></li>
                            <li><a href="/site/contact">Contact Us</a></li>
                            <li><a href="/site/policy">Privacy Policy</a></li>
                            <li><a href="/">Orders and Returns</a></li>
                            <li><a href="/">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="/site/carts-list">View Cart</a></li>
                            <li><a href="/site/wish-list">Wishlist</a></li>
                            <li><a href="/site/help">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->
<!-- jQuery Plugins -->
<script src="/main/js/jquery.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
<script src="/main/js/bootstrap.min.js"></script>
<script src="/main/js/slick.min.js"></script>
<script src="/main/js/nouislider.min.js"></script>
<script src="/main/js/jquery.zoom.min.js"></script>
<script src="/main/js/main.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
