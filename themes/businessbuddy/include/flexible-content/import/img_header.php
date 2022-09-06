<?php
$text = get_sub_field('text');
$img = get_sub_field('img');
 ?>

 <section class="flexible-inner-section bbh-inner-section img-header">
     <div class="lazyload bg" data-bgset="<?php echo $img['sizes']['large'] ?>">
         <div class="overlay">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-12">
                <div class="text">
                 <?php echo $text ?>
                </div>
             </div>
         </div>
     </div>
     </div>
    </div>
     <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
 </section>
