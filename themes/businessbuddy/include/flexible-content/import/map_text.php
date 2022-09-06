<?php
$text = get_sub_field('text');
$link = get_sub_field('link');
 ?>

 <section class="flexible-inner-section bbh-inner-section map-text">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6 left">
                     <div class="text">
                         <?php echo $text ?>
                     </div>
             </div>
             <div class="col-sm-6 right">
                 <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="btn"><?php echo $link['title'] ?></a>
             </div>
         </div>

     </div>

     <iframe src="https://snazzymaps.com/embed/375084" width="100%" height="396px" style="border:none;"></iframe>
 </section>
