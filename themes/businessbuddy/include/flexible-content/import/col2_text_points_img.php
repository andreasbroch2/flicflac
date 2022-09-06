<?php
$text = get_sub_field('text');
$img = get_sub_field('img');
 ?>

 <section class="flexible-inner-section bbh-inner-section col2-text-points-img">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6 left">
                 <div class="header-text">
                     <?php echo $text ?>
                 </div>
                 <?php
                 // check if the repeater field has rows of data
                 if( have_rows('points') ):
                     ?>
                     <div class="points">
                     <?php
                     // loop through the rows of data
                     while ( have_rows('points') ) : the_row();
                        $point_img = get_sub_field('point_img');
                        $point_text = get_sub_field('point_text');
                         ?>
                         <div class="point">
                             <img class="lazyload" data-srcset="<?php echo $point_img['sizes']['large'] ?>" alt="<?php echo $point_img['alt'] ?>">
                             <div class="text">
                                <?php echo $point_text ?> 
                             </div>

                         </div>
                         <?php
                     endwhile;
                     ?>
                      </div>
                     <?php
                 endif;
                 ?>
             </div>
             <div class="col-sm-6 right">
                 <img class="lazyload big-img" data-srcset="<?php echo $img['sizes']['large'] ?>" alt="<?php echo $img['alt'] ?>">
             </div>
         </div>
     </div>
 </section>
