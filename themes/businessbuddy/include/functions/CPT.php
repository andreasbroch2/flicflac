<?php
/*----------- Reviews - Anmeldelser -----------*/
function create_review_cpt() {
    $cpt = 'review';
    $cpt_singular = 'Anmeldelse';
    $cpt_plural = 'Anmeldelser';

    $labels = array(
        'add_new_item' => __('Tilføj ny '.$cpt_singular,'bbh'),
        'add_new' => __( 'Tilføj ny','bbh'),
        'all_items' => __('Alle '.$cpt_plural ,'bbh'),
        'edit_item' => __('Rediger '.$cpt_singular,'bbh'),
        'name' => __($cpt_singular,'bbh'),
        'name_admin_bar' => __($cpt_singular,'bbh'),
        'new_item' => __('Ny '.$cpt_singular,'bbh'),
        'not_found' => __('Ingen '.$cpt_singular.' fundet','bbh'),
        'not_found_in_trash' => __('Ingen '.$cpt_plural .' fundet i papirkurv','bbh'),
        'parent_item_colon' => __('Forældre '.$cpt_singular,'bbh'),
        'search_items' => __('Søg '.$cpt_plural ,'bbh'),
        'view_item' => __('Se '.$cpt_singular,'bbh'),
        'view_items' => __('Se '.$cpt_plural ,'bbh'),
        'menu_name' => __($cpt_plural, 'bbh')
    );
    $args = array(
        'labels' => $labels,
        'supports' => array( 'editor', 'thumbnail', 'title' ),
        'menu_icon' => 'dashicons-smiley',
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'hierarchical' => false,
        'exclude_from_search' => true,
        'show_in_rest' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    );
    register_post_type($cpt, $args);
}
add_action( 'init', 'create_review_cpt', 0 );


/*----------- Blog - Posts -----------*/

function create_blog_cpt() {
    $cpt = 'blog';
    $cpt_singular = 'Blog-indlæg';
    $cpt_plural = 'Blog-indlæg';

    $labels = array(
        'add_new_item' => __('Tilføj nyt '.$cpt_singular,'bbh'),
        'add_new' => __( 'Tilføj ny','bbh'),
        'all_items' => __('Alle '.$cpt_plural ,'bbh'),
        'edit_item' => __('Rediger '.$cpt_singular,'bbh'),
        'name' => __($cpt_singular,'bbh'),
        'name_admin_bar' => __($cpt_singular,'bbh'),
        'new_item' => __('Ny '.$cpt_singular,'bbh'),
        'not_found' => __('Ingen '.$cpt_singular.' fundet','bbh'),
        'not_found_in_trash' => __('Ingen '.$cpt_plural .' fundet i papirkurv','bbh'),
        'parent_item_colon' => __('Forældre '.$cpt_singular,'bbh'),
        'search_items' => __('Søg '.$cpt_plural ,'bbh'),
        'view_item' => __('Se '.$cpt_singular,'bbh'),
        'view_items' => __('Se '.$cpt_plural ,'bbh'),
        'menu_name' => __($cpt_plural, 'bbh')
    );
    $args = array(
        'labels' => $labels,
        'supports' => array( 'editor', 'thumbnail', 'title' ),
        'menu_icon' => 'dashicons-pressthis',
        'taxonomies' => array('category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'hierarchical' => true,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type($cpt, $args);
}
add_action( 'init', 'create_blog_cpt', 0 );

/*----------- Priser - Prices -----------*/

function create_prices_cpt() {
    $cpt = 'prices';
    $cpt_singular = 'Pris-pakke';
    $cpt_plural = 'Pris-pakker';

    $labels = array(
        'add_new_item' => __('Tilføj ny '.$cpt_singular,'bbh'),
        'add_new' => __( 'Tilføj ny','bbh'),
        'all_items' => __('Alle '.$cpt_plural ,'bbh'),
        'edit_item' => __('Rediger '.$cpt_singular,'bbh'),
        'name' => __($cpt_singular,'bbh'),
        'name_admin_bar' => __($cpt_singular,'bbh'),
        'new_item' => __('Ny '.$cpt_singular,'bbh'),
        'not_found' => __('Ingen '.$cpt_singular.' fundet','bbh'),
        'not_found_in_trash' => __('Ingen '.$cpt_plural .' fundet i papirkurv','bbh'),
        'parent_item_colon' => __('Forældre '.$cpt_singular,'bbh'),
        'search_items' => __('Søg '.$cpt_plural ,'bbh'),
        'view_item' => __('Se '.$cpt_singular,'bbh'),
        'view_items' => __('Se '.$cpt_plural ,'bbh'),
        'menu_name' => __($cpt_plural, 'bbh')
    );
    $args = array(
        'labels' => $labels,
        'supports' => array( 'editor', 'thumbnail', 'title' ),
        'menu_icon' => 'dashicons-money-alt',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'show_in_rest' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
    );
    register_post_type($cpt, $args);
}
add_action( 'init', 'create_prices_cpt', 0 );

/*----------- Medarbejdere - Priser -----------*/

function create_employee_cpt() {
    $cpt = 'employee';
    $cpt_singular = 'Medarbejder';
    $cpt_plural = 'Medarbejdere';

    $labels = array(
        'add_new_item' => __('Tilføj nyt '.$cpt_singular,'bbh'),
        'add_new' => __( 'Tilføj ny','bbh'),
        'all_items' => __('Alle '.$cpt_plural ,'bbh'),
        'edit_item' => __('Rediger '.$cpt_singular,'bbh'),
        'name' => __($cpt_singular,'bbh'),
        'name_admin_bar' => __($cpt_singular,'bbh'),
        'new_item' => __('Ny '.$cpt_singular,'bbh'),
        'not_found' => __('Ingen '.$cpt_singular.' fundet','bbh'),
        'not_found_in_trash' => __('Ingen '.$cpt_plural .' fundet i papirkurv','bbh'),
        'parent_item_colon' => __('Forældre '.$cpt_singular,'bbh'),
        'search_items' => __('Søg '.$cpt_plural ,'bbh'),
        'view_item' => __('Se '.$cpt_singular,'bbh'),
        'view_items' => __('Se '.$cpt_plural ,'bbh'),
        'menu_name' => __($cpt_plural, 'bbh')
    );

    $args = array(
        'labels' => $labels,
        'supports' => array( 'editor', 'thumbnail', 'title' ),
        'menu_icon' => 'dashicons-admin-users',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'hierarchical' => true,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'medarbejdere'),
    );
    register_post_type($cpt, $args);
}
add_action( 'init', 'create_employee_cpt', 0 );


// Register Taxonomy Custom Taxonomy
function create_position_tax() {
    $tax = 'position';
    $tax_singular = 'Stilling';
    $tax_plural = 'Stillinger';

  $labels = array(
        'name'              => _x( $tax_plural, 'taxonomy general name', 'bbh' ),
    'singular_name'     => _x( $tax_singular, 'taxonomy singular name', 'bbh' ),
    'search_items'      => __( 'Søg ' . $tax_plural, 'bbh' ),
    'all_items'         => __( 'Alle ' . $tax_plural, 'bbh' ),
    'parent_item'       => __( 'Forældre ' . $tax_singular, 'bbh' ),
    'parent_item_colon' => __( 'Forældre ' . $tax_singular . ':', 'bbh' ),
    'edit_item'         => __( 'Rediger ' . $tax_singular, 'bbh' ),
    'update_item'       => __( 'Opdater ' . $tax_singular, 'bbh' ),
    'add_new_item'      => __( 'Tilføj ny ' . $tax_singular, 'bbh' ),
    'new_item_name'     => __( 'Nyt '. $tax_singular .' navn', 'bbh' ),
    'menu_name'         => __( $tax_singular, 'bbh' ),
  );
  $args = array(
    'labels' => $labels,
    'description' => __( '', 'bbh' ),
    'hierarchical' => true,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
  );
  register_taxonomy( $tax, array('employee'), $args );

}
add_action( 'init', 'create_position_tax' );

function create_area_tax() {
    $tax = 'area';
    $tax_singular = 'Område';
    $tax_plural = 'Områder';

  $labels = array(
        'name'              => _x( $tax_plural, 'taxonomy general name', 'bbh' ),
    'singular_name'     => _x( $tax_singular, 'taxonomy singular name', 'bbh' ),
    'search_items'      => __( 'Søg ' . $tax_plural, 'bbh' ),
    'all_items'         => __( 'Alle ' . $tax_plural, 'bbh' ),
    'parent_item'       => __( 'Forældre ' . $tax_singular, 'bbh' ),
    'parent_item_colon' => __( 'Forældre ' . $tax_singular . ':', 'bbh' ),
    'edit_item'         => __( 'Rediger ' . $tax_singular, 'bbh' ),
    'update_item'       => __( 'Opdater ' . $tax_singular, 'bbh' ),
    'add_new_item'      => __( 'Tilføj ny ' . $tax_singular, 'bbh' ),
    'new_item_name'     => __( 'Nyt '. $tax_singular .' navn', 'bbh' ),
    'menu_name'         => __( $tax_singular, 'bbh' ),
  );
  $args = array(
    'labels' => $labels,
    'description' => __( '', 'bbh' ),
    'hierarchical' => true,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
  );
  register_taxonomy( $tax, array('employee'), $args );

}
add_action( 'init', 'create_area_tax' );

function create_speciale_tax() {
    $tax = 'speciale';
    $tax_singular = 'Speciale';
    $tax_plural = 'Specialer';

  $labels = array(
        'name'              => _x( $tax_plural, 'taxonomy general name', 'bbh' ),
    'singular_name'     => _x( $tax_singular, 'taxonomy singular name', 'bbh' ),
    'search_items'      => __( 'Søg ' . $tax_plural, 'bbh' ),
    'all_items'         => __( 'Alle ' . $tax_plural, 'bbh' ),
    'parent_item'       => __( 'Forældre ' . $tax_singular, 'bbh' ),
    'parent_item_colon' => __( 'Forældre ' . $tax_singular . ':', 'bbh' ),
    'edit_item'         => __( 'Rediger ' . $tax_singular, 'bbh' ),
    'update_item'       => __( 'Opdater ' . $tax_singular, 'bbh' ),
    'add_new_item'      => __( 'Tilføj ny ' . $tax_singular, 'bbh' ),
    'new_item_name'     => __( 'Nyt '. $tax_singular .' navn', 'bbh' ),
    'menu_name'         => __( $tax_singular, 'bbh' ),
  );
  $args = array(
    'labels' => $labels,
    'description' => __( '', 'bbh' ),
    'hierarchical' => true,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
  );
  register_taxonomy( $tax, array('employee'), $args );

}
add_action( 'init', 'create_speciale_tax' );
