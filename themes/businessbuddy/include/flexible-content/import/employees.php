<?php $headline = get_sub_field('headline'); ?>
<section class="flexible-inner-section bbh-inner-section employees">
    <div class="grid-container">
          <div class="employeeheadline">
              <?php echo $headline; ?>
          </div>

          <div class="employee-container">
              <?php
              $args = array(
                  'post_type'      => 'employee',
                  'orderby'        => 'title',
                  'order'          => 'ASC',
              );
              $query = new WP_Query($args);
              $postsdisplayed = $query->found_posts;
              $posts = $query->posts;

              if($posts):
              foreach($posts as $post):?>
              <?php setup_postdata($post);?>
              <div class="employee">
                <a href="<?php echo the_permalink() ?>">
                  <div class="img lazyload" data-bgset="<?php echo bbh_webp(get_the_post_thumbnail_url('','medium'))?>"></div>
                  <div class="details">
                      <h3 class="name">
                          <?php the_title(); ?>
                      </h3>
                      <span class="description"><?php the_content() ?></span>
                      <a class="read_more" href="<?php echo the_permalink() ?>">Læs mere</a>
                  </div>
                  </a>
              </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>

              <?php
              endif;
               ?>
           </div>
    </div>
</section>
