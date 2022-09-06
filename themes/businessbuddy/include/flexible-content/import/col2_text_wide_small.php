<?php
$text_wide = get_sub_field('text_wide');
$text_smal = get_sub_field('text_smal');
 ?>

 <section class="flexible-inner-section bbh-inner-section col2-text-wide-small">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6 wide">
                 <div class="text">
                     <?php echo $text_wide ?>
                 </div>
             </div>
             <div class="col-sm-6 small">
                 <div class="text">
                     <?php echo $text_smal ?>
                 </div>
             </div>
         </div>
     </div>
 </section>
