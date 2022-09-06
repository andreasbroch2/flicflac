<?php
add_action('wp_ajax_buddies_ajax', 'buddies_ajax'); // Change names according to your form
add_action('wp_ajax_nopriv_buddies_ajax', 'buddies_ajax'); // Change names according to your form
/*-------------- Function to execute -------------*/
function buddies_ajax(){
    // check for nonce security
    $nonce = $_POST['security'];
    if ( ! wp_verify_nonce( $nonce, 'buddies-ajax-nonce' ) ){
        die;
    }

    $args = array(
        'orderby' => 'ID',
        'order'  => 'ASC',
        'post_type' => 'employee',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );

    // compare on all taxonomies
    $taxonomies = get_object_taxonomies('employee', '');
    foreach($taxonomies as $tax) {
        $terms = get_terms($tax->name, 'hide_empty=0');
        if( isset( $_POST[$tax->name] ) && !empty( $_POST[$tax->name] )){
            $tax = array(
                'taxonomy' => $tax->name,
                'field' => 'term_id',
                'terms' => $_POST[$tax->name],
                'operator' => 'IN'
            );
            array_push($args['tax_query'], $tax);
        }
    }

    $the_query = new WP_Query( $args );

    ob_start();

    if( $the_query->have_posts() ) : ?>
<?php
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

   ?>
        <?php
        wp_reset_postdata();
    else :
        echo '<div class="grid-container"><h4 class="no-matches">Der findes ingen buddies i den valgte kategori.</h4></div>';
    endif;
    $buddies = ob_get_clean(); // Save case markup in output buffer

    $send = array(
        'buddies' => $buddies
    );
    wp_send_json($send); // Send json

    wp_die();
}
