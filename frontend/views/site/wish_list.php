<?php

/* @var $this yii\web\View */

$this->title = 'Wish list';
$this->params['breadcrumbs'][] = $this->title;
$this->params['word'] = '';
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
               <li><a href="#">Wish list</a></li>
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


         <!-- STORE -->
         <div id="store" class="col-md-12">

            <div class="row">
               <!-- product -->
               <?php if (!empty($products)): ?>
                  <?php foreach ($products as $id):
                     $product = \common\models\Products::findOne($id);
                     $img = \common\models\ProductImages::GetOan($id)
                     ?>
                     <div class="col-md-4 col-xs-6">
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
                              <p class="product-category">Category</p>
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
                                    <i class="fa fa-heart"></i>
                                    <span
                                        class="tooltipp">remove from wishlist</span></button>
                                 <!--                                 <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>-->
                                 <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                              </div>
                           </div>
                           <div class="add-to-cart">
                              <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               <?php endif; ?>
            </div>
            <!-- /store products -->

         </div>
         <!-- /STORE -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<?=$this->render('/layouts/newsletter')?>
<!-- /NEWSLETTER -->