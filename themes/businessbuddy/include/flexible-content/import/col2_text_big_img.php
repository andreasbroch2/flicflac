<?php
$text = get_sub_field('text');
$img = get_sub_field('img');
 ?>

 <section class="flexible-inner-section bbh-inner-section col2-text-big-img">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6 text-container">
                 <div class="text">
                     <?php echo $text ?>
                 </div>
             </div>
             <div class="col-sm-6 img-container">
                 <img class="lazyload" data-srcset="<?php echo $img['sizes']['large'] ?>" alt="<?php echo $img['alt'] ?>">
             </div>
         </div>
     </div>
 </section>
