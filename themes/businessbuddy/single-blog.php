<?php get_header(); ?>
</div>
</div>
<?php
$img = get_the_post_thumbnail_url();
$blog_text = get_field('blog_text');
$hide = get_field('blog_hide_img_title');
$header_headline = get_field('header_headline');
// $archive = get_post_type_archive_link('blog');
?>
<section class="single-blog-post">
    <div class="lazyload bg" data-bgset="<?php echo $img ?>">
        <div class="overlay">


        <div class="pad-container">
            <div class="breadcrumbs-container single-post large-grid-container">

              <p id="breadcrumbs"><span><span>
                <a href="/">Forside</a>
                <span class="bread-seperator">&gt;</span>
                <a href="/blogs">Blog</a>
                <span class="bread-seperator">&gt;</span>
                <strong class="breadcrumb_last" aria-current="page"><?php echo get_the_title() ?></strong>
                </span></span></p>
            </div>
        </div>
        <div class="grid-container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><?php echo $header_headline ?></h1>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div id="primary" <?php generate_content_class();?>>
    	<main id="main" <?php generate_main_class(); ?>>
    		<?php
    		do_action( 'generate_before_main_content' ); ?>
            <div class="pad-container">
			    <div class="small-grid-container">

                    <div class="blog-content">
                        <?php echo $blog_text ?>
                        <?php
            					//Include flexible content
            					include(STYLESHEETPATH . '/include/flexible-content/flexible-content.php');
            			?>
                    </div>

                </div>
            </div>



    	</main><!-- #main -->
    </div><!-- #primary -->
</section>

<?php get_footer(); ?>
