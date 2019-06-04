<?php

/* @var $this yii\web\View */

$this->title = 'Product';
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
               <li><a href="/">Home</a></li>
               <li><a href="/site/store">All Categories</a></li>
               <li class="active"><?= \common\models\Categories::GetName($product->category_id) ?></li>
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
         <!-- Product main img -->
         <div class="col-md-5 col-md-push-2">
            <div id="product-main-img">
               <?php foreach ($images as $image): ?>
                  <div class="product-preview">
                     <img src="/admin/uploads/<?= $image->img ?>" alt="">
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
         <!-- /Product main img -->

         <!-- Product thumb imgs -->
         <div class="col-md-2  col-md-pull-5">
            <div id="product-imgs">
               <?php foreach ($images as $image): ?>
                  <div class="product-preview">
                     <img src="/admin/uploads/<?= $image->img ?>" alt="">
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
         <!-- /Product thumb imgs -->

         <!-- Product details -->
         <div class="col-md-5">
            <div class="product-details">
               <h2 class="product-name"><?= $product->name ?></h2>
               <div>
                  <div class="product-rating">
                     <?php for ($i = 0; $i < 5; $i++): ?>
                        <?php if ($i < $stars): ?>
                           <i class="fa fa-star"></i>
                        <?php else: ?>
                           <i class="fa fa-star-o"></i>
                        <?php endif; ?>
                     <?php endfor; ?>
                  </div>
                  <a class="review-link" href="#">10 Review(s) | Add your review</a>
               </div>
               <div>
                  <h3 class="product-price">$<?= $product->price ?>.00
                     <del class="product-old-price">$<?= $product->big_price ?>.00</del>
                  </h3>
                  <span class="product-available">In Stock</span>
               </div>
               <p><?= $product->text ?></p>

               <!--               <div class="product-options">-->
               <!--                  <label>-->
               <!--                     Size-->
               <!--                     <select class="input-select">-->
               <!--                        <option value="0">X</option>-->
               <!--                     </select>-->
               <!--                  </label>-->
               <!--                  <label>-->
               <!--                     Color-->
               <!--                     <select class="input-select">-->
               <!--                        <option value="0">Red</option>-->
               <!--                     </select>-->
               <!--                  </label>-->
               <!--               </div>-->

               <div class="add-to-cart">
                  <div class="qty-label">
                     Qty
                     <div class="input-number">
                        <input type="number" id="id_p_count" value="1">
                        <span class="qty-up">+</span>
                        <span class="qty-down">-</span>
                     </div>
                  </div>
                  <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
               </div>

               <ul class="product-btns">
                  <li>
                     <a href="#" class="add_fav" data-id="<?= $product->id ?>">
                        <?php if (in_array($product->id, $favorites)): ?>
                           <i class="fa fa-heart"></i>
                           <span class="tooltipp">remove from wishlist</span>
                        <?php else: ?>
                           <i class="fa fa-heart-o"></i>
                           <span class="tooltipp">add to wishlist</span>
                        <?php endif; ?>
                     </a>
                  </li>
               </ul>
               <ul class="product-links">
                  <li>Category:</li>
                  <li><a href="/site/store?ProductsSearchStore%5Bcategories%5D%5B%5D=<?=$product->category_id?>"><?= \common\models\Categories::GetName($product->category_id) ?></a></li>
               </ul>

               <ul class="product-links">
                  <li>Share:</li>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-envelope"></i></a></li>
               </ul>

            </div>
         </div>
         <!-- /Product details -->

         <!-- Product tab -->
         <div class="col-md-12">
            <div id="product-tab">
               <!-- product tab nav -->
               <ul class="tab-nav">
                  <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                  <!--                  <li><a data-toggle="tab" href="#tab2">Details</a></li>-->
                  <li><a data-toggle="tab" href="#tab3">Reviews (<?= count($comments) ?>)</a></li>
               </ul>
               <!-- /product tab nav -->

               <!-- product tab content -->
               <div class="tab-content">
                  <!-- tab1  -->
                  <div id="tab1" class="tab-pane fade in active">
                     <div class="row">
                        <div class="col-md-12">
                           <p><?= $product->description ?></p>
                        </div>
                     </div>
                  </div>
                  <!-- /tab1  -->

                  <!-- tab2  -->
                  <!--                  <div id="tab2" class="tab-pane fade in">-->
                  <!--                     <div class="row">-->
                  <!--                        <div class="col-md-12">-->
                  <!--                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad-->
                  <!--                              minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in-->
                  <!--                              voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia-->
                  <!--                              deserunt mollit anim id est laborum.</p>-->
                  <!--                        </div>-->
                  <!--                     </div>-->
                  <!--                  </div>-->
                  <!-- /tab2  -->

                  <!-- tab3  -->
                  <div id="tab3" class="tab-pane fade in">
                     <div class="row">
                        <!-- Rating -->
                        <div class="col-md-3">
                           <div id="rating">
                              <div class="rating-avg">
                                 <span><?= $stars ?></span>
                                 <div class="rating-stars">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                       <?php if ($i < $stars): ?>
                                          <i class="fa fa-star"></i>
                                       <?php else: ?>
                                          <i class="fa fa-star-o"></i>
                                       <?php endif; ?>
                                    <?php endfor; ?>
                                 </div>
                              </div>

                           </div>
                        </div>
                        <!-- /Rating -->
                        <!-- Reviews -->
                        <div class="col-md-6">
                           <div id="reviews">
                              <ul class="reviews">
                                 <?php if (!empty($comments)): ?>
                                    <?php foreach ($comments as $k => $comment): if ($k > 5) break; ?>
                                       <li>
                                          <div class="review-heading">
                                             <h5 class="name"><?= $comment->name ?></h5>
                                             <p class="date"><?= date("F j, Y, g:i a", strtotime($comment->date)) ?></p>
                                             <div class="review-rating">
                                                <?php for ($i = 0; $i < 5; $i++): ?>
                                                   <?php if ($i < $comment->star): ?>
                                                      <i class="fa fa-star"></i>
                                                   <?php else: ?>
                                                      <i class="fa fa-star-o"></i>
                                                   <?php endif; ?>
                                                <?php endfor; ?>
                                             </div>
                                          </div>
                                          <div class="review-body">
                                             <p><?= $comment->comment ?></p>
                                          </div>
                                       </li>
                                    <?php endforeach; ?>
                                 <?php endif; ?>
                              </ul>
                           </div>
                        </div>
                        <!-- /Reviews -->

                        <!-- Review Form -->
                        <div class="col-md-3">
                           <div id="review-form">
                              <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['class' => "review-form"]]); ?>
                              <input class="hide" name="ProductComments[product_id]" type="text" value="<?= $product->id ?>">
                              <input required="required" class="input" name="ProductComments[name]" type="text" placeholder="Your Name">
                              <input required="required" class="input" name="ProductComments[email]" type="email" placeholder="Your Email">
                              <textarea required="required" class="input" name="ProductComments[comment]" placeholder="Your Review"></textarea>
                              <div class="input-rating">
                                 <span>Your Rating: </span>
                                 <div class="stars">
                                    <input id="star5" name="ProductComments[star]" value="5" type="radio"><label for="star5"></label>
                                    <input id="star4" name="ProductComments[star]" value="4" type="radio"><label for="star4"></label>
                                    <input id="star3" name="ProductComments[star]" value="3" type="radio"><label for="star3"></label>
                                    <input id="star2" name="ProductComments[star]" value="2" type="radio"><label for="star2"></label>
                                    <input id="star1" name="ProductComments[star]" value="1" type="radio"><label for="star1"></label>
                                 </div>
                              </div>
                              <button class="primary-btn">Submit</button>
                              <?php \yii\widgets\ActiveForm::end(); ?>
                           </div>
                        </div>
                        <!-- /Review Form -->
                     </div>
                  </div>
                  <!-- /tab3  -->
               </div>
               <!-- /product tab content  -->
            </div>
         </div>
         <!-- /product tab -->
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-md-12">
            <div class="section-title text-center">
               <h3 class="title">Related Products</h3>
            </div>
         </div>
      <?php foreach ($related as $product): $img = \common\models\ProductImages::GetOan($product->id) ?>
         <div class="col-md-3 col-xs-6">
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
                  <p class="product-category"><?= \common\models\Categories::GetName($product->category_id) ?></p>
                  <h3 class="product-name"><a href="/site/view?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
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
                     <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                  </div>
               </div>
               <div class="add-to-cart">
                  <button class="add-to-cart-btn add_cart" data-id="<?= $product->id ?>"><i class="fa fa-shopping-cart"></i> add to cart</button>
               </div>
            </div>
         </div>
      <?php endforeach; ?>

   </div>
   <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /Section -->

<!-- NEWSLETTER -->
<?=$this->render('/layouts/newsletter')?>
<!-- /NEWSLETTER -->