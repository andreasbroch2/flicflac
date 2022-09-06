<?php $blog_sort = get_field('blog_sort','option'); ?>
<?php if ($blog_sort == false): ?>
    <?php $sortOrder = 'ASC' ?>
<?php elseif ($blog_sort == true): ?>
    <?php $sortOrder = 'DESC' ?>
<?php endif; ?>

<?php
add_action('wp_ajax_blog_ajax', 'blog_ajax'); // Change names according to your form
add_action('wp_ajax_nopriv_blog_ajax', 'blog_ajax'); // Change names according to your form
/*-------------- Function to execute -------------*/
function blog_ajax(){
    // check for nonce security
    $nonce = $_POST['security'];
    if ( ! wp_verify_nonce( $nonce, 'blog-ajax-nonce' ) )
        die;

    $args = array(
        'orderby'        => 'date',
        'order'          => $sortOrder,
        'post_type' => 'blog',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );

    // compare on all taxonomies

    $tax = array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => $_POST['category'],
        'operator' => 'IN'
    );
    if ($_POST['category'] != 'on') {
        array_push($args['tax_query'], $tax);
    }

    $the_query = new WP_Query( $args );

    ob_start();
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post();
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
                        <a href="<?php echo $link; ?>" >Læs mere</a>
                    </div>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<div class="grid-container"><h4 class="no-matches">Ingen blogindlæg fundet.</h4></div>';
    endif;
    $blogposts = ob_get_clean(); // Save person grid markup in output buffer

    $send = array(
        'blogposts' => $blogposts
    );
    wp_send_json($send); // Send json

    wp_die();
}
