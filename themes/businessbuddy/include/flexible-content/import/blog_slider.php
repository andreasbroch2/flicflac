<?php
$header_text = get_sub_field('header_text');
 ?>

 <section class="flexible-inner-section bbh-inner-section blog-slider">
     <div class="grid-container">
         <div class="row first">
             <div class="col-sm-6 left">
                 <?php echo $header_text ?>
             </div>
             <div class="col-sm-6 right">
                 <button class="blog-arrow-left" type="button" name="button"><img class="lazyload" data-srcset="/wp-content/themes/businessbuddy/assets/images/left.svg" alt="Pil Venstre"></button>
                 <button class="blog-arrow-right" type="button" name="button"><img class="lazyload" data-srcset="/wp-content/themes/businessbuddy/assets/images/right.svg" alt="Pil Højre"></button>
             </div>
         </div>
         <div class="row second">
             <div class="col-sm-12">
                  <?php // The Query
                  $args = array(
                  'post_type' => 'blog',
                  'posts_per_page' => -1
                  );
                  $the_query = new WP_Query( $args );
                  if ( $the_query->have_posts() ) {
                  // The Loop
                  $i = 0;
                  ?>
                  <div class="post-container">
                  <?php
                  while ( $the_query->have_posts() ) {
                      $i++;
                      $the_query->the_post();
                      $post_title = get_the_title();
                      $img = get_the_post_thumbnail_url();
                      $blog_intro_text = get_field('blog_intro_text');

                          if ($i == 1) {
                              ?>
                              <div class="post">
                                  <img class="lazyload post-img" data-srcset="<?php echo $img ?>" alt="Blog billede">
                                  <div class="text">
                                      <h3><?php echo $post_title ?></h3>
                                      <p><?php echo substr_replace($blog_intro_text, "...", 80); ?></p>
                                  </div>
                                  <a href="<?php echo get_permalink(); ?>" target="" class="">Læs mere <img class="lazyload readmoreArrow" data-srcset="/wp-content/themes/businessbuddy/assets/images/right.svg" alt="arrow-right"></a>
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
