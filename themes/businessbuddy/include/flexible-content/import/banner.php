<?php
$img = get_sub_field('img');
$text = get_sub_field('text');
$link = get_sub_field('link');
$link2 = get_sub_field('link2');
 ?>

 <section class="flexible-inner-section bbh-inner-section banner">
     <div class="lazyload bg" data-bgset="<?php echo $img['sizes']['large'] ?>">
         <div class="overlay">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6 left">
                 <h2><?php echo $text ?></h2>
             </div>

             <?php if ($link2): ?>
                 <div class="col-sm-6 right links2">
                     <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="btn-white"><?php echo $link['title'] ?></a>
                     <a href="<?php echo $link2['url'] ?>" target="<?php echo $link2['target'] ?>" class="btn-white link2"><?php echo $link2['title'] ?></a>
                 </div>
             <?php else: ?>
                 <div class="col-sm-6 right">
                     <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="btn-white"><?php echo $link['title'] ?></a>
                 </div>
             <?php endif; ?>
         </div>
     </div>
    </div>
     </div>
 </section>
