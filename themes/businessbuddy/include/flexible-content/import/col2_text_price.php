<?php
$text = get_sub_field('text');
$pricepacks = get_sub_field('pricepacks');
 ?>

 <section class="flexible-inner-section bbh-inner-section col2-text-price">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6">
                 <div class="text">
                     <?php echo $text ?>
                 </div>
             </div>
             <div class="col-sm-6">
                 <?php if( $pricepacks ): ?>
                 <div class="pricepacks">
                     <?php foreach( $pricepacks as $pricepack ):
                         $permalink = get_permalink( $pricepack->ID );
                         $title = get_the_title( $pricepack->ID );
                         $prices_price = get_field( 'prices_price', $pricepack->ID );
                         $prices_description = get_field( 'prices_description', $pricepack->ID );
                         $prices_list = get_field( 'prices_list', $pricepack->ID );
                         $prices_tax = get_field( 'prices_tax', $pricepack->ID );
                         $prices_btn = get_field( 'prices_btn', $pricepack->ID );
                         ?>
                         <div class="pricepack">
                             <div class="price">
                                 <p><?php echo $prices_price ?></p>
                             </div>
                             <div class="text">
                                 <h3><?php echo $title ?></h3>
                                 <?php echo $prices_description ?>
                                 <?php echo $prices_list ?>
                                 <p class="small-text"><?php echo $prices_tax ?></p>
                             </div>
                             <div class="pricepack-btn">
                                 <a href="<?php echo $prices_btn['url'] ?>" target="<?php echo $prices_btn['target'] ?>" class="btn"><?php echo $prices_btn['title'] ?></a>
                             </div>
                         </div>
                     <?php endforeach; ?>
                 </div>
                <?php endif; ?>
             </div>
         </div>
     </div>
 </section>
