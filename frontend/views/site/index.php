<?php

/* @var $this yii\web\View */

$this->title = 'Arm Shop';
$this->params['menu'] = 'home';
$this->params['word'] = '';
?>

<!-- SECTION -->
<div class="section">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">
         <!-- shop -->
         <div class="col-md-4 col-xs-6">
            <div class="shop">
               <div class="shop-img">
                  <img src="/main/img/shop01.png" alt="">
               </div>
               <div class="shop-body">
                  <h3>Laptop<br>Collection</h3>
                  <a href="/site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>
         </div>
         <!-- /shop -->
         <!-- shop -->
         <div class="col-md-4 col-xs-6">
            <div class="shop">
               <div class="shop-img">
                  <img src="/main/img/shop03.png" alt="">
               </div>
               <div class="shop-body">
                  <h3>Accessories<br>Collection</h3>
                  <a href="/site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=4" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>
         </div>
         <!-- /shop -->

         <!-- shop -->
         <div class="col-md-4 col-xs-6">
            <div class="shop">
               <div class="shop-img">
                  <img src="/main/img/shop02.png" alt="">
               </div>
               <div class="shop-body">
                  <h3>Cameras<br>Collection</h3>
                  <a href=" /site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=3" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
               </div>
            </div>
         </div>
         <!-- /shop -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">

         <!-- section title -->
         <div class="col-md-12">
            <div class="section-title">
               <h3 class="title">New Products</h3>
               <div class="section-nav">
                  <ul class="section-tab-nav tab-nav">
                     <li class="active"><a data-toggle="tab" href="#tab11">Laptops</a></li>
                     <li><a data-toggle="tab" href="#tab12">Smartphones</a></li>
                     <li><a data-toggle="tab" href="#tab13">Cameras</a></li>
                     <li><a data-toggle="tab" href="#tab14">Accessories</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- /section title -->

         <!-- Products tab & slick -->
         <div class="col-md-12 home-prod">
            <div class="row">
               <div class="products-tabs">
                  <div id="tab11" class="tab-pane active">
                     <div class="products-slick" data-nav="#slick-nav-11">
                        <?php if (!empty($laptops)): ?>
                           <?php foreach ($laptops as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?=\frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?=\frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-11" class="products-slick-nav"></div>
                  </div>
                  <div id="tab12" class="tab-pane ">
                     <div class="products-slick" data-nav="#slick-nav-12">
                        <?php if (!empty($smartphones)): ?>
                           <?php foreach ($smartphones as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="<?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-12" class="products-slick-nav"></div>
                  </div>
                  <div id="tab13" class="tab-pane ">
                     <div class="products-slick" data-nav="#slick-nav-13">
                        <?php if (!empty($cameras)): ?>
                           <?php foreach ($cameras as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="<?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-13" class="products-slick-nav"></div>
                  </div>
                  <div id="tab14" class="tab-pane ">
                     <div class="products-slick" data-nav="#slick-nav-14">
                        <?php if (!empty($accessories)): ?>
                           <?php foreach ($accessories as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="<?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-14" class="products-slick-nav"></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Products tab & slick -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-md-12">
            <div class="hot-deal">
               <ul class="hot-deal-countdown">
                  <li>
                     <div>
                        <h3>02</h3>
                        <span>Days</span>
                     </div>
                  </li>
                  <li>
                     <div>
                        <h3>10</h3>
                        <span>Hours</span>
                     </div>
                  </li>
                  <li>
                     <div>
                        <h3>34</h3>
                        <span>Mins</span>
                     </div>
                  </li>
                  <li>
                     <div>
                        <h3>60</h3>
                        <span>Secs</span>
                     </div>
                  </li>
               </ul>
               <h2 class="text-uppercase">hot deal this week</h2>
               <p>New Collection Up to 50% OFF</p>
               <a class="primary-btn cta-btn" href="/site/store">Shop now</a>
            </div>
         </div>
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
   <!-- container -->
   <div class="container ">
      <!-- row -->
      <div class="row">

         <!-- section title -->
         <div class="col-md-12">
            <div class="section-title">
               <h3 class="title">Top selling</h3>
               <div class="section-nav">
                  <ul class="section-tab-nav tab-nav">
                     <li class="active"><a data-toggle="tab" href="#tab21">Laptops</a></li>
                     <li><a data-toggle="tab" href="#tab22">Smartphones</a></li>
                     <li><a data-toggle="tab" href="#tab23">Cameras</a></li>
                     <li><a data-toggle="tab" href="#tab24">Accessories</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- /section title -->

         <!-- Products tab & slick -->
         <div class="col-md-12">
            <div class="row">
               <div class="products-tabs home-prod">
                  <div id="tab21" class="tab-pane active">
                     <div class="products-slick" data-nav="#slick-nav-21">
                        <?php if (!empty($top_laptops)): ?>
                           <?php foreach ($top_laptops as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="<?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-21" class="products-slick-nav"></div>
                  </div>
                  <div id="tab22" class="tab-pane ">
                     <div class="products-slick" data-nav="#slick-nav-22">
                        <?php if (!empty($top_smartphones)): ?>
                           <?php foreach ($top_smartphones as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="<?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-22" class="products-slick-nav"></div>
                  </div>
                  <div id="tab23" class="tab-pane ">
                     <div class="products-slick" data-nav="#slick-nav-23">
                        <?php if (!empty($top_cameras)): ?>
                           <?php foreach ($top_cameras as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="<?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-23" class="products-slick-nav"></div>
                  </div>
                  <div id="tab24" class="tab-pane ">
                     <div class="products-slick" data-nav="#slick-nav-24">
                        <?php if (!empty($top_accessories)): ?>
                           <?php foreach ($top_accessories as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                              <div class="product">
                                 <div class="product-img">
                                    <img src="<?= $img->img ?>" alt="">
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
                                    <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                                    <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                                    <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                       <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
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
                                       <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                    </div>
                                 </div>
                                 <div class="add-to-cart">
                                    <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     <div id="slick-nav-24" class="products-slick-nav"></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /Products tab & slick -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-md-4 col-xs-6">
            <div class="section-title">
               <h4 class="title">Top selling</h4>
               <div class="section-nav">
                  <div id="slick-nav-3" class="products-slick-nav"></div>
               </div>
            </div>

            <div class="products-widget-slick" data-nav="#slick-nav-3">

               <?php if (!empty($top_sell_laptops)): ?>
                  <div>
                     <?php foreach ($top_sell_laptops as $k => $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                        <div class="product-widget">
                           <div class="product-img">
                              <img src="<?= $img->img ?>" alt="">
                           </div>
                           <div class="product-body">
                              <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                              <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                              <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                 <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
                              </h4>
                           </div>
                        </div>
                        <?php if (++$k % 3 == 0 && count($top_sell_laptops) !== $k): echo '</div><div>' ?><?php endif; ?>
                     <?php endforeach; ?>
                  </div>
               <?php endif; ?>
            </div>
         </div>

         <div class="col-md-4 col-xs-6">
            <div class="section-title">
               <h4 class="title">Top selling</h4>
               <div class="section-nav">
                  <div id="slick-nav-4" class="products-slick-nav"></div>
               </div>
            </div>

            <div class="products-widget-slick" data-nav="#slick-nav-4">
               <?php if (!empty($top_sell_smartphones)): ?>
                  <div>
                     <?php foreach ($top_sell_smartphones as $k => $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                        <div class="product-widget">
                           <div class="product-img">
                              <img src="<?= $img->img ?>" alt="">
                           </div>
                           <div class="product-body">
                              <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                              <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                              <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                 <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
                              </h4>
                           </div>
                        </div>
                        <?php if (++$k % 3 == 0 && count($top_sell_smartphones) !== $k): echo '</div><div>' ?><?php endif; ?>
                     <?php endforeach; ?>
                  </div>
               <?php endif; ?>
            </div>
         </div>

         <div class="clearfix visible-sm visible-xs"></div>

         <div class="col-md-4 col-xs-6">
            <div class="section-title">
               <h4 class="title">Top selling</h4>
               <div class="section-nav">
                  <div id="slick-nav-5" class="products-slick-nav"></div>
               </div>
            </div>

            <div class="products-widget-slick" data-nav="#slick-nav-5">
               <?php if (!empty($top_sell_cameras)): ?>
                  <div>
                     <?php foreach ($top_sell_cameras as $k => $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
                        <div class="product-widget">
                           <div class="product-img">
                              <img src="<?= $img->img ?>" alt="">
                           </div>
                           <div class="product-body">
                              <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                              <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
                              <h4 class="product-price">$<?= \frontend\helper\Price::getNormalPrice($product->price)  ?>
                                 <del class="product-old-price">$<?= \frontend\helper\Price::getBigPrice($product->price)  ?></del>
                              </h4>
                           </div>
                        </div>
                        <?php if (++$k % 3 == 0 && count($top_sell_cameras) !== $k): echo '</div><div>' ?><?php endif; ?>
                     <?php endforeach; ?>
                  </div>
               <?php endif; ?>
            </div>
         </div>

      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<?=$this->render('/layouts/newsletter')?>
<!-- /NEWSLETTER -->
