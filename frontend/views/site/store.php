<?php

/* @var $this yii\web\View */
/* @product  common\models\Products */

$this->title = 'Shop';
$this->params['breadcrumbs'][] = $this->title;
$this->params['word'] = $search->word;
$this->params['menu'] = 'shop';
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <!--               <li><a href="#">Accessories</a></li>-->
                    <li class="active">Results ( <?= $total_count ?> )</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'action' => '/site/store',
                    'method' => 'get',
                ]); ?>
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        <?php foreach ($categories as $category): ?>
                            <div class="input-checkbox">
                                <input type="checkbox" name="ProductsSearchStore[categories][]"
                                       <?= in_array($category->id, $search->categories) ? 'checked' : '' ?>
                                       value="<?= $category->id ?>"
                                       id="category-<?= $category->id ?>">
                                <label for="category-<?= $category->id ?>">
                                    <span></span>
                                    <?= $category->name ?>
                                    <small>(<?= \common\models\Products::GetCountByCatId($category->id) ?>)</small>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /aside Widget -->
                <!--              aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <?php foreach ($brends as $brend): ?>
                            <div class="input-checkbox">
                                <input type="checkbox" name="ProductsSearchStore[brends][]"
                                       <?= in_array($brend->id, $search->brends) ? 'checked' : '' ?>
                                       value="<?= $brend->id ?>"
                                       id="brend-<?= $brend->id ?>">
                                <label for="brend-<?= $brend->id ?>">
                                    <span></span>
                                    <?= $brend->name ?>
                                    <small>(<?= \common\models\Products::GetCountByBrId($brend->id) ?>)</small>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--              /aside Widget-->
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input name="ProductsSearchStore[price_from]" id="price-min"
                                   value="<?= $search->price_from ?>" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input name="ProductsSearchStore[price_to]" id="price-max" value="<?= $search->price_to ?>"
                                   type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <div class="s-block">
                    <a title="reset" class="search-btn" href="/site/store">Reset</a>
                    <button class="search-btn"><i class="fa fa-search"></i> Apply</button>
                </div>

                <!-- /aside Widget -->


                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <?php foreach ($get_top as $top): $img = \common\models\ProductImages::GetOan($top->id) ?>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/admin/uploads/<?= $img->img ?>" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="/site/view?id=<?= $top->id ?>"><?= $top->name ?></a>
                                </h3>
                                <h4 class="product-price">$<?= $top->price ?>.00
                                    <del class="product-old-price">$<?= $top->big_price ?>.00</del>
                                </h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select" name="ProductsSearchStore[sort]">
                                <option value="0">Price</option>
                                <option value="1" <?= $search->sort == 1 ? 'selected' : '' ?>>Popular</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select" name="ProductsSearchStore[count]">
                                <option value="20">20</option>
                                <option value="50" <?= $search->count == 50 ? 'selected' : '' ?>>50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <!--                  <li><a href="#"><i class="fa fa-th-list"></i></a></li>-->
                    </ul>
                </div>
                <!-- /store top filter -->
                <?php \yii\widgets\ActiveForm::end(); ?>
                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/admin/uploads/<?= $img->img ?>" alt="">
                                        <div class="product-label">
                                            <?php if ($product->state == 1): ?>
                                                <span class="sale">-30%</span>
                                            <?php elseif ($product->state == 2): ?>
                                                <span class="new">NEW</span>
                                            <?php elseif ($product->state == 3): ?>
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a
                                                    href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a>
                                        </h3>
                                        <h4 class="product-price">$<?= $product->price ?>.00
                                            <del class="product-old-price">$<?= $product->big_price ?>.00</del>
                                        </h4>
                                        <div class="product-rating">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <?php if ($i < $product->stars): ?>
                                                    <i class="fa fa-star"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-star-o"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist add_fav" data-id="<?= $product->id ?>">
                                                <?php if (in_array($product->id, $favorites)): ?>
                                                    <i class="fa fa-heart"></i>
                                                    <span class="tooltipp">remove from wishlist</span>
                                                <?php else: ?>
                                                    <i class="fa fa-heart-o"></i>
                                                    <span class="tooltipp">add to wishlist</span>
                                                <?php endif; ?>
                                            </button>
                                            <!--                                 <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>-->
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i
                                                    class="fa fa-shopping-cart"></i> add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $pages,
                        'options' => [
                            'class' => 'store-pagination'
                        ]
                    ]); ?>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<?= $this->render('/layouts/newsletter') ?>
<!-- /NEWSLETTER -->
<script>
    var _From = <?=$search->price_from?>;
    var _To = <?=$search->price_to?>;
</script>