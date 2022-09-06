<?php
$text = get_sub_field('text');
$img = get_sub_field('img');
 ?>

 <section class="flexible-inner-section bbh-inner-section col2_header">

     <div class="grid-container">

         <div class="row">

             <div class="col-sm-6 left">
                 <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
                 <div class="text-container">
                 <div class="text">
                     <?php echo $text ?>
                 </div>
                  </div>
             </div>
             <div class="col-sm-6 right">
                 <img class="lazyload" data-srcset="<?php echo $img['sizes']['large'] ?>" alt="<?php echo $img['alt'] ?>">
             </div>
         </div>
     </div>
 </section>
