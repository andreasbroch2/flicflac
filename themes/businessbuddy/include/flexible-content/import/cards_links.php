<?php
$text = get_sub_field('text');
 ?>

 <section class="flexible-inner-section bbh-inner-section cards-links">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-12">
                 <div class="text">
                     <?php echo $text ?>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-12">
                 <?php
                 // check if the repeater field has rows of data
                 if( have_rows('cards') ):
                     ?>
                     <div class="cards">
                     <?php
                     // loop through the rows of data
                     while ( have_rows('cards') ) : the_row();
                         $link = get_sub_field('link');
                         $headline = get_sub_field('headline');
                         $img = get_sub_field('img');
                         $card_text = get_sub_field('card_text');
                         ?>
                         <a class="" target="<?php echo $link['target'] ?>" href="<?php echo $link['url'] ?>">
                         <div class="card">
                             <div class="content">
                             <h3><?php echo $headline ?></h3>
                             <img class="lazyload" data-srcset="<?php echo $img['sizes']['large'] ?>" alt="<?php echo $img['alt'] ?>">
                             <p><?php echo $card_text ?></p>
                             </div>
                            <span><?php echo $link['title'] ?></span>
                         </div>
                         </a>
                         <?php
                     endwhile;
                     ?>
                    </div>
                     <?php
                 endif;
                 ?>
             </div>
         </div>
     </div>
 </section>
