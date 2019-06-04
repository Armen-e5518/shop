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
      <H1>Thank you! </H1>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<?=$this->render('/layouts/newsletter')?>
<!-- /NEWSLETTER -->