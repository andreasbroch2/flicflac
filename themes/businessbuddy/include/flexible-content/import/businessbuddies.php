<?php
$text = get_sub_field('text');
$link = get_sub_field('link');
wp_enqueue_script('slickjs');
wp_enqueue_style('slick');
 ?>

 <section class="flexible-inner-section bbh-inner-section businessbuddies">
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-6">
                 <div class="text">
                     <?php echo $text ?>
                 </div>
             </div>
             <div class="col-sm-6 right">
                 <?php if ($link): ?>
                     <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="btn"><?php echo $link['title'] ?></a>
                 <?php endif; ?>
                 <div class="arrows">
                     <button type="button" class="left-arrow" name="button"><img class="lazyload" data-srcset="/wp-content/themes/businessbuddy/assets/images/left.svg" alt="Venstre pil"></button>
                     <button type="button" class="right-arrow" name="button"><img class="lazyload" data-srcset="/wp-content/themes/businessbuddy/assets/images/right.svg" alt="Højre pil"></button>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-12">
                  <?php // The Query
                  $args = array(
                  'post_type' => 'employee',
                  'posts_per_page' => -1,
                  'order' => 'ASC'
                  );
                  $the_query = new WP_Query( $args );
                  if ( $the_query->have_posts() ) {
                  // The Loop
                  $i = 0;
                  ?>
                  <div class="buddy-container">
                  <?php
                  while ( $the_query->have_posts() ) {
                      $i++;
                      $the_query->the_post();
                      $post_title = get_the_title();
                      $post_id = get_the_id();
                      $speciale = get_field('speciale');
                      $territory = get_field('territory');
                      $img = get_the_post_thumbnail_url();
                      $btn_text = get_field('btn_text');
                      $areas = get_the_terms($post_id, 'area');
                      $speciales = get_the_terms($post_id, 'speciale');
                      $title_array = explode(' ', $post_title);
                      $first_name = $title_array[0];


                          if ($i == 1) {
                              ?>
                              <div class="buddy">
                                  <img class="lazyload" data-srcset="<?php echo $img?>" alt="Buddy">
                              <h3><?php echo $post_title ?></h3>
                              <?php if ($speciales): ?>
                                   <p><span>Speciale:</span>
                                       <?php $glue = ''; ?>
                              <?php foreach ($speciales as $special): ?>
                                  <?php echo $glue . $special->name ?>
                                   <?php $glue = ', '; ?>
                              <?php endforeach; ?>
                                    </p>
                               <?php endif; ?>
                              <?php if ($areas): ?>
                                  <?php $glue = ''; ?>
                                   <p><span>Område: </span>
                              <?php foreach ($areas as $area): ?>
                              <?php echo $glue . $area->name ?>
                               <?php $glue = ', '; ?>
                          <?php endforeach; ?>
                           </p>
                         <?php endif; ?>
                              <a href="<?php echo get_permalink(); ?>"><?php echo $btn_text ?></a>
                                </div>
                              <?php
                                $i = 0;
                          }
                      }
                 } else {
                  // no posts found
                 }
                 /* Restore original Post Data */
                  wp_reset_postdata(); ?>
                       </div>
             </div>
         </div>
     </div>
 </section>
