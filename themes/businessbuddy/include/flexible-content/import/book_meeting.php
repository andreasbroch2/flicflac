<?php
$text = get_sub_field('text');
 ?>

 <section class="flexible-inner-section bbh-inner-section book-meeting">
     <div class="grid-container">
    
         <div class="row">
             <div class="col-sm-12">
                 <div class="text">
                     <?php echo $text ?>
                 </div>
                 <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice"]'); ?>
             </div>
         </div>
     </div>
 </section>
