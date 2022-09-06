<?php
$header_headline = get_sub_field('header_headline');
 ?>

<section class="flexible-inner-section bbh-inner-section new-all-reviews">
    <div class="grid-container">
        <?php if ($header_headline): ?>
            <div class="row">
                <div class="col-sm-12 headline">
                    <div class="header">
                        <h2><?php echo $header_headline ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    $args = array(
        			'post_type'      => 'review',
        			'posts_per_page' => -1,
        			'order'          => 'DESC',
        		);
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    if ( $the_query->have_posts() ) { ?>
                        <div class="new-all-review-container">
                            <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
                                <div class="review-card">
                                    <?php
                                    $review_img = get_field('review_img');
                                    $review_name = get_field('review_name');
                                    $review_text = get_field('review_text');
                                    $title_place = get_field('jobtitel_og_sted');?>
                                    <?php if ($review_img): ?>
                                        <div class="review-img" style="background-image:url(<?php echo bbh_webp($review_img['sizes']['small'])?>)"></div>
                                    <?php else: ?>
                                        <div class="review-img" style="background-image:url('/wp-content/themes/businessbuddy/template-parts/review-placeholder.png')"></div>
                                    <?php endif; ?>
                                    <div class="review-name"><?php echo $review_name ?></div>
                                    <div class="review-title-place"><?php echo $title_place ?></div>
                                    <div class="review-text"><?php echo $review_text ?></div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php
                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata(); ?>
                </div>
            </div>
    </div>
</section>
