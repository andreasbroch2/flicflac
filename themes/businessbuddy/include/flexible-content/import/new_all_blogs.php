<section class="flexible-inner-section bbh-inner-section new-all-blogs">
    <div class="grid-container">

            <?php $blog_sort = get_field('blog_sort','option'); ?>
            <?php if ($blog_sort == false): ?>
                <?php $sortOrder = 'ASC' ?>
            <?php elseif ($blog_sort == true): ?>
                <?php $sortOrder = 'DESC' ?>
            <?php endif; ?>
            <?php
            $args = array(
                'post_type'      => 'blog',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => $sortOrder,
            );
            // The Query
            $the_query = new WP_Query( $args );
            // The Loop
            if ( $the_query->have_posts() ) { ?>
            <?php $terms = get_terms(array('taxonomy'=>'category','hide_empty'=>true)); ?>

            <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                  <div class="field-wrap">
                        <?php
                        $terms = get_terms('category', 'orderby=term_order&hide_empty=1');
                        echo '<div class="checkboxes">';
                        echo '<div class="checkbox current">';
                            echo '<input id="resetform" type="radio" name="category" checked>'; // ID of the category as the value of an option
                            echo '<label for="">Alle</label>';
                        echo '</div>';
                        foreach ($terms as $term) :
                            echo '<div class="checkbox">';
                                echo '<input type="radio" value="'.$term->term_id.'" name="category">'; // ID of the category as the value of an option
                                echo '<label for="category">'.$term->name.'</label>';
                            echo '</div>';
                        endforeach;
                        echo '</div>'; // .checkboxes
                        ?>
	                </div>
		            <?php // hidden inputs ?>
		            <input type="hidden" name="security" id="blog-ajax-nonce" value="<?php echo wp_create_nonce( 'blog-ajax-nonce' ) ?>"/>
		            <input type="hidden" name="action" value="blog_ajax">
		        </form>
                <div class="all-blog-posts-container">
                    <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
                        <?php
                        $link = get_the_permalink();
                        //$img = get_the_post_thumbnail();
                        $img = get_the_post_thumbnail_url();
                        $blog_intro_text = get_field('blog_intro_text');
                        ?>
                        <div class="blog-box">
                            <a class="img" href="<?php echo $link; ?>" >
                                <div class="thumbnail-img lazyload" data-bgset="<?php echo bbh_webp($img) ?>" >
                                </div>
                            </a>
                            <div class="textbox">
                                <div class="content">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p class="text"><?php echo $blog_intro_text ?></p>
                                </div>
                                <div class="link">
                                    <a href="<?php echo $link; ?>" >Læs indlæg</a>
                                </div>
                            </div>
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
</section>
