<?php

use yii\widgets\ActiveForm;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/3/2019
 * Time: 3:35 PM
 */
$model = new \common\models\Subscribers();
$socs = \common\models\Socsites::find()->all();
?>
<div id="newsletter" class="section">
   <!-- container -->
   <div class="container">
      <!-- row -->
      <div class="row">
         <div class="col-md-12">
            <div class="newsletter">
               <p>Sign Up for the <strong>NEWSLETTER</strong></p>
               <?php $form = ActiveForm::begin(['action' => '/subscribers/create']); ?>
               <input class="input" required="required" name="Subscribers[email]" type="email" placeholder="Enter Your Email">
               <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
               <?php ActiveForm::end(); ?>
               <ul class="newsletter-follow">
                  <?php foreach ($socs as $soc): ?>
                     <li>
                        <a title="<?=$soc->name?>" target="_blank" href="<?=$soc->link?>"><i class="<?=$soc->icon?>"></i></a>
                     </li>
                  <?php endforeach; ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- /row -->
   </div>
   <!-- /container -->
</div>
