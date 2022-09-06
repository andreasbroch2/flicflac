<?php
$headline = get_sub_field('headline');
$link = get_sub_field('link');
$text = get_sub_field('text');
 ?>

 <section class="flexible-inner-section bbh-inner-section col1-textfield-btn">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6 left">
                 <h2><?php echo $headline ?></h2>
             </div>
             <div class="col-sm-6 right">
                 <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="btn"><?php echo $link['title'] ?></a>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-12">
                 <?php echo $text ?>
             </div>
         </div>
     </div>
 </section>
