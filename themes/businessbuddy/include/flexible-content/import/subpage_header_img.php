<?php
$text = get_sub_field('text');
$bg_img = get_sub_field('bg_img');
 ?>

 <section class="flexible-inner-section bbh-inner-section subpage-header-img">
     <div class="lazyload bg" data-bgset="<?php echo $bg_img['sizes']['large'] ?>">
 <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-12">
                 <?php echo $text ?>
             </div>
         </div>
     </div>
     </div>
     <div class="shadow">

     </div>
 </section>
