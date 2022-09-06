<?php
$headline = get_sub_field('headline');
$headline2 = get_sub_field('headline2');
 ?>
 <section class="flexible-inner-section bbh-inner-section all-employees">
     <div class="breadcrumb"><?php get_breadcrumb(); ?></div>
     <div class="grid-container">
         <div class="row">
             <div class="col-sm-12">
                 <h1><?php echo $headline ?></h1>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-12">
                 <?php // The Query
                 $args = array(
                 'post_type' => 'employee',
                 'posts_per_page' => -1,
                 'order' => 'ASC',
                 'tax_query' => array(
                     array(
                         'taxonomy' => 'position', // the custom vocabulary
                         'field'    => 'slug',
                         'terms'    => array('businessbuddy'),      // provide the term slugs
                     ),
                 ),
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
                     $post_id = get_the_id();
                     $post_title = get_the_title();
                     $img = get_the_post_thumbnail_url();
                     $btn_text = get_field('btn_text');

                     $title_array = explode(' ', $post_title);
                     $first_name = $title_array[0];


                     $areas = get_the_terms($post_id, 'area');
                     $speciales = get_the_terms($post_id, 'speciale');



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
                                  <p><span>Område: </span>
                                      <?php $glue = ''; ?>
                             <?php foreach ($areas as $area): ?>
                             <?php echo $glue . $area->name ?>
                             <?php $glue = ', '; ?>
                         <?php endforeach; ?>
                          </p>
                        <?php endif; ?>

                             <a class="btn" href="<?php echo get_permalink(); ?>"><?php echo $btn_text ?></a>
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
         <?php if ($headline2): ?>
         <div class="grid-container">
         <div class="row">
             <div class="col-sm-12">
                 <h2><?php echo $headline2 ?></h2>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-12">
                 <?php // The Query
                 $args = array(
                 'post_type' => 'employee',
                 'posts_per_page' => -1,
                 'order' => 'ASC',
                 'tax_query' => array(
                     array(
                         'taxonomy' => 'position', // the custom vocabulary
                         'field'    => 'slug',
                         'terms'    => array('personale'),      // provide the term slugs
                     ),
                 ),
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
                     $post_id2 = get_the_id();
                     $post_title = get_the_title();
                     $areas2 = get_the_terms($post_id2, 'area');
                     $speciales2 = get_the_terms($post_id2, 'speciale');
                     $btn_text2 = get_field('btn_text');
                     $img2 = get_the_post_thumbnail_url();

                     $title_array = explode(' ', $post_title);
                     $first_name = $title_array[0];


                         if ($i == 1) {
                             ?>
                             <div class="buddy">
                                 <img class="lazyload" data-srcset="<?php echo $img2?>" alt="Buddy">
                             <h3><?php echo $post_title ?></h3>
                             <?php if ($speciales2): ?>
                                  <p><span>Speciale:</span>
                                      <?php $glue = ''; ?>
                             <?php foreach ($speciales2 as $special2): ?>
                                 <?php echo $glue . $special2->name ?>
                                 <?php $glue = ', '; ?>
                             <?php endforeach; ?>
                                   </p>
                              <?php endif; ?>
                             <?php if ($areas2): ?>
                                  <p><span>Område: </span>
                                       <?php $glue = ''; ?>
                             <?php foreach ($areas2 as $area2): ?>
                             <?php echo $glue . $area2->name ?>
                              <?php $glue = ', '; ?>
                         <?php endforeach; ?>
                          </p>
                        <?php endif; ?>
                             <a class="btn" href="<?php echo get_permalink(); ?>"><?php echo $btn_text2 ?></a>
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
     <?php endif; ?>

 </section>
