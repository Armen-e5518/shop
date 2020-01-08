<?php

/* @var $this yii\web\View */

$this->title = 'Checkout';
$this->params['breadcrumbs'][] = $this->title;
$this->params['word'] = '';
$this->params['menu'] = 'shop';
$price = 0;
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-md-12">
            <h3 class="breadcrumb-header">Checkout</h3>
            <ul class="breadcrumb-tree">
               <li><a href="#">Home</a></li>
               <li class="active">Checkout</li>
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
         <?php $form = \yii\widgets\ActiveForm::begin(); ?>
         <div class="col-md-7">
            <!-- Billing Details -->
            <div class="billing-details">
               <div class="section-title">
                  <h3 class="title">Billing address</h3>
               </div>
               <div class="form-group">
                  <input class="input" required="required" type="text" name="Checkout[name]" placeholder="Name">
               </div>
               <div class="form-group">
                  <input class="input" required="required" type="email" name="Checkout[email]" placeholder="Email">
               </div>
               <div class="form-group">
                  <input class="input" required="required" type="tel" name="Checkout[phone]" placeholder="Telephone">
               </div>
            </div>
            <!-- /Billing Details -->

            <!-- Order notes -->
            <div class="order-notes">
               <textarea class="input" name="Checkout[notes]" placeholder="Order Notes"></textarea>
            </div>
            <!-- /Order notes -->
         </div>

         <!-- Order Details -->
         <div class="col-md-5 order-details">
            <div class="section-title text-center">
               <h3 class="title">Your Order</h3>
            </div>
            <div class="order-summary">
               <div class="order-col">
                  <div><strong>PRODUCT</strong></div>
                  <div><strong>TOTAL</strong></div>
               </div>
               <div class="order-products">
                  <?php if (!empty($carts)): ?>
                     <?php foreach ($carts as $ke=>$cart):
                        $prod = \common\models\Products::findOne($cart['id']);
                        $price += $prod->price * $cart['count'];
                        ?>
                        <div class="order-item">
                           <div class="order-col">
                              <div><strong>( <?= $cart['count'] ?> X )</strong> <?= $prod->name ?></div>
                              <div class="i-price" data-price="<?= $prod->price * $cart['count'] ?>">
                                 $<?= $prod->price * $cart['count'] ?>
                                 <span class="delete-i" data-id="<?= $cart['id'] ?>" title="Delete">X</span>
                              </div>
                           </div>
                           <input type="hidden" name="Products[<?=$ke?>][id]" value="<?= $prod->id ?>">
                           <input type="hidden" name="Products[<?=$ke?>][count]" value="<?= $cart['count'] ?>">
                        </div>
                     <?php endforeach; ?>
                  <?php endif; ?>
               </div>
               <div class="order-col">
                  <div>Shiping</div>
                  <div><strong>FREE</strong></div>
               </div>
               <div class="order-col">
                  <div><strong>TOTAL</strong></div>
                  <div><strong class="order-total">$<span><?= $price ?></span></strong></div>
               </div>
            </div>
            <div class="input-checkbox">
               <input type="checkbox" required="required" id="terms">
               <label for="terms" id="conditions">
                  <span></span>
                  I've read and accept the <a href="#">terms & conditions</a>
               </label>
            </div>
            <button type="submit" class="primary-btn order-submit">Place order</button>
         </div>
         <!-- /Order Details -->
         <?php \yii\widgets\ActiveForm::end(); ?>
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<?=$this->render('/layouts/newsletter')?>
<!-- /NEWSLETTER -->