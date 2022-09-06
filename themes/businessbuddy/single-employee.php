<?php get_header(); ?>
</div>
</div>
<?php
$only_text = get_field('only_text');
$img = get_field('img');
$title = get_field('title');
$quote = get_field('quote');
$text = get_field('text');
$download_btn = get_field('download_btn');
$link = get_field('download_file');
// $archive = get_post_type_archive_link('blog');
?>
<section class="single-employees">
    
    <div id="primary" <?php generate_content_class();?>>
    	<main id="main" <?php generate_main_class(); ?>>
    		<?php
    		do_action( 'generate_before_main_content' ); ?>

            <?php
					//Include flexible content
					include(STYLESHEETPATH . '/include/flexible-content/flexible-content.php');
			?>


    	</main><!-- #main -->
    </div><!-- #primary -->
</section>

<?php get_footer(); ?>
