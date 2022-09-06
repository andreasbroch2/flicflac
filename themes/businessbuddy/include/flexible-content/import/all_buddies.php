<?php
$top_text = get_sub_field('top_text');
$headline = get_sub_field('headline');
$headline2 = get_sub_field('headline2');

 ?>

 <section class="flexible-inner-section bbh-inner-section all-buddies">
     <div class="breadcrumb"><?php get_breadcrumb(); ?></div>

     <div class="grid-container top-grid">
         <div class="row top-container">
             <div class="col-sm-6">
                 <div class="text">
                     <?php echo $top_text ?>
                 </div>
                 <div class="sorting-container">
                 <?php $area_terms = get_terms(array('taxonomy'=>'area','hide_empty'=>true)); ?>
                 <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter-buddies">
                       <div class="field-wrap">
                           <div class="area">
                                <h3>Område:</h3>
                             <?php
                             $area_terms = get_terms('area', 'orderby=term_order&hide_empty=1');
                             echo '<div class="checkboxes">';
                             foreach ($area_terms as $area_term) :
                                 echo '<div class="checkbox">';
                                     echo '<input type="checkbox" id="'.$area_term->term_id.'" value="'.$area_term->term_id.'" name="area[]">'; // ID of the category as the value of an option
                                     echo '<label for="'.$area_term->term_id.'">'.$area_term->name.'</label>';
                                 echo '</div>';
                             endforeach;
                             echo '</div>'; // .checkboxes
                             ?>
                         </div>
                         <div class="speciale">
                             <?php $speciale_terms = get_terms(array('taxonomy'=>'speciale','hide_empty'=>true)); ?>
                             <h3>Speciale:</h3>
                           <?php
                           $speciale_terms = get_terms('speciale', 'orderby=term_order&hide_empty=1');
                           echo '<div class="checkboxes">';
                           foreach ($speciale_terms as $speciale_term) :
                               echo '<div class="checkbox">';
                                   echo '<input type="checkbox" id="'.$speciale_term->term_id.'" value="'.$speciale_term->term_id.'" name="speciale[]">'; // ID of the category as the value of an option
                                   echo '<label for="'.$speciale_term->term_id.'">'.$speciale_term->name.'</label>';
                               echo '</div>';
                           endforeach;
                           echo '</div>'; // .checkboxes
                           ?>
                           </div>
                         <?php // hidden inputs ?>
                         <input type="hidden" name="security" id="buddies-ajax-nonce" value="<?php echo wp_create_nonce( 'buddies-ajax-nonce' ) ?>"/>
                         <input type="hidden" name="action" value="buddies_ajax">
                        </form>
                </div>
             </div>
              </div>
             <div class="col-sm-6 mapCol">
                 <iframe src="https://snazzymaps.com/embed/375084" width="100%" height="396px" style="border:none;"></iframe>
             </div>
         </div>
          </div>
          <div class="grid-container">
         <div class="row">
             <div class="col-sm-12">
                 <h1><?php echo $headline ?></h1>
             </div>
         </div>
         <div class="row">
              <div class="col-sm-12 col12Buddies">
             <div id="responseBuddies">

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
 </div>
         </div>


 </section>
