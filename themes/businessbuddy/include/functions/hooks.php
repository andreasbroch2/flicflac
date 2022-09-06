<?php add_action( 'generate_before_header','top_bar' );
function top_bar() {
$title = get_field('top_bar_text', 'option');
$phone_number = get_field('top_bar_phone_num', 'option');
$email = get_field('top_bar_email', 'option');
$typewriter = get_field( 'typewriter_heading', 'option'); ?>
    <div class="top-bar">
        <div class="large-grid-container">
            <div class="top-bar-container">
                <div class="top-bar-titel">
                 <?php if ($typewriter && isset($typewriter['variations']) && count($typewriter['variations'])):
        			$variations = array_map(function($el){
        				return $el['text'];
        			}, $typewriter['variations']);
        			$variationsJson = htmlspecialchars(json_encode($variations), ENT_QUOTES, 'UTF-8');
        			$lengthClass = mb_strlen($typewriter['text_base']) >= 20  ? 'long-text' : ''; ?>
        			    <p class="typewriter-text">
        				    <?php echo $typewriter['text_base'] ?>
                        </p>
        				<span class="txt-rotate" data-period="2000" data-rotate="<?php echo $variationsJson ?>">
        					<?php echo $variations[0]; ?>
        				</span>
        		<?php endif; ?>
                </div>
                <div class="top-bar-links">
                <a id="phone-number" href="tel:+45<?php echo $phone_number ?>"><span><?php echo "(+45) " . $phone_number ?></span></a>
                <a id="email-adress" href="mailto:<?php echo $email ?>"><span><?php echo $email ?></span></a>
                </div>
                <a href="https://vpn.complimentawork.dk/cgi-bin/WebObjects/CamClientPortal.woa/wa/login?clinicPk=0000C0A8C102000007D5020000000129AB8D3CB5E911D4AD" target="_blank" class="mobile-top-bar-button">Bestil Tid</a>
            </div>
        </div>
    </div>
<?php }
add_action( 'generate_after_footer_content','add_bottom_bar' );
function add_bottom_bar() {
    $copyright_text = get_field('copyright_text','option');
    $cookie_link = get_field('cookie_link','option');
    $gdpr_link = get_field('gdpr_link','option'); ?>
    <div class="grid-container">
        <div class="copyright-bottom-bar">
            <p><?php echo $copyright_text ?></p>
            <div class="bottom-btn-container">
                <a href="<?php echo $cookie_link['url'] ?>" target="<?php echo $cookie_link['target'] ?>" class="btn"><?php echo $cookie_link['title'] ?></a>
                <span class="btn-seperator">|</span>
                <a href="<?php echo $gdpr_link['url'] ?>" target="<?php echo $gdpr_link['target'] ?>" class="btn"><?php echo $gdpr_link['title'] ?></a>
            </div>
        </div>
    </div>
<?php }
// add_action( 'generate_after_header','frontpage_cover_content' );
function frontpage_cover_content() {

if ( is_front_page() || is_page('book-et-moede')) {
    $choice = get_field('frontpage_background_choice');
    $focus = get_field('frontpage_cover_focus');
    $mobile_focus = get_field('frontpage_cover_mobile_focus');
    $hide_wave = get_field('hide_wave');
    $frontpage_mobile_background_img = get_field('frontpage_mobile_background_img');?>
    <?php if (is_front_page()): ?>
        <div class="background-overlay-cover is-frontpage"></div>
    <?php elseif (is_page('book-et-moede')): ?>
        <div class="background-overlay-cover is-booking"></div>
    <?php endif;
     if (is_front_page()): ?>
        <div class="frontpage-outer-cover is-frontpage">
    <?php elseif (is_page('book-et-moede')): ?>
        <div class="frontpage-outer-cover is-booking">
    <?php endif; ?>
    <div class="wave-container <?php if ($choice == "img") { echo "img-background"; } ?>">
        <?php if ($frontpage_mobile_background_img): ?>
            <div class="frontpage-cover-container mobile-background-img lazyload <?php if ($mobile_focus == "center") { echo "mobile-focus-center"; } elseif($mobile_focus == "right"){ echo "mobile-focus-right"; } ?>" data-bgset="<?php echo bbh_webp($frontpage_mobile_background_img['sizes']['medium']) ?>">
                <div id="cover-filter"></div>
            </div>
        <?php endif;
         if($choice == "color") {
            $frontpage_background_color = get_field('frontpage_background_color'); ?>
            <div class="frontpage-cover-container" style="background-color:<?php echo $frontpage_background_color; ?>">
            <div id="cover-filter hidden"></div>
        <?php } elseif ($choice == "img") {
            $frontpage_background_img = get_field('frontpage_background_img'); ?>
            <div class="frontpage-cover-container <?php if ($frontpage_mobile_background_img){ echo "hide-cover";} ?> background-img lazyload <?php if ($focus == "center") { echo "focus-center"; } elseif($focus == "right"){ echo "focus-right"; } ?>" data-bgset="<?php echo bbh_webp($frontpage_background_img['sizes']['large']) ?>">
            <div id="cover-filter"></div>
        <?php } else{ ?>
            <div class="frontpage-cover-container <?php if ($frontpage_mobile_background_img){ echo "hide-cover";} ?> <?php if ($focus == "center") { echo "focus-center"; } elseif($focus == "right"){ echo "focus-right"; } ?>" >
            <div id="cover-filter"></div>
        <?php }

        if($choice == "video") {
            if (file_exists(get_stylesheet_directory() . '/template-parts/video-background.php')) {
    			include( get_stylesheet_directory() . '/template-parts/video-background.php');
    		}
        } elseif($choice == "embed") {
            if (file_exists(get_stylesheet_directory() . '/template-parts/youtube-background.php')) {
    			include( get_stylesheet_directory() . '/template-parts/youtube-background.php');
    		}
        } ?>
            </div>
            <?php if ($hide_wave == false): ?>
                <img class="lazyload frontpage-wave" data-src="/wp-content/themes/businessbuddy/template-parts/bolge.svg" alt="wave graphic">
            <?php endif; ?>
    </div>
    <div class="pad-container">
        <div class="grid-container">
            <?php if (is_front_page()): ?>
                <div class="frontpage-flex-container is-frontpage">
            <?php elseif (is_page('book-et-moede')): ?>
                <div class="frontpage-flex-container is-booking">
            <?php endif; ?>
                <div class="frontpage-textbox">
                <?php $frontpage_title_text = get_field('frontpage_title_text');
                $frontpage_button = get_field('frontpage_button');
                if ($frontpage_title_text) {
                    echo $frontpage_title_text;
                }
                $frontpage_icon_text = get_field('frontpage_icon_text');
                    if( have_rows('frontpage_icon_text') ): ?>
                    <br><br>
                    <div class="frontpage-icons">
                    <?php
                        while( have_rows('frontpage_icon_text') ) : the_row();
                            $icomoon = get_sub_field('icomoon');
                            $text = get_sub_field('text'); ?>
                            <div class="i-text">
                                <span class="<?php echo $icomoon ?>"></span><p><?php echo $text ?></p>
                            </div>
                            <br>

                    <?php endwhile; ?>
                    </div>
                    <?php endif;
                    if ($frontpage_button): ?>
                    <br><br>
                    <div class="bbh-btn">
                        <a href="<?php echo $frontpage_button['url'] ?>" target="<?php echo $frontpage_button['target'] ?>" ><?php echo $frontpage_button['title'] ?></a>
                    </div>
                <?php endif; ?>
                </div>
                <?php $contact_form_num = get_field('frontpage_contact_form_choice'); ?>
                <div class="frontpage-contact-form contact-form-<?php echo $contact_form_num ?>">
                    <?php $frontpage_contact_form = get_field('frontpage_contact_form');
                    echo $frontpage_contact_form;
                    echo do_shortcode(sprintf('[gravityform id=%s]',$contact_form_num));
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php }
 }
add_action( 'wp_head','frontpage_header_sizes' );
function frontpage_header_sizes() {
    if ( is_front_page() || is_page('book-et-moede')) { ?>
    <style>
        /*h2{font-size:42px}*/.main-navigation .main-nav ul li a,.main-navigation .menu-bar-items,.menu-toggle{color:#fff}#fixed-header{box-shadow:unset}#masthead{padding:40px}#masthead .site-logo a img{max-height:80px}#masthead .site-logo{visibility:hidden}#masthead .site-logo.white-logo{display:block;visibility:visible}@media screen and (max-width:920px){#masthead .main-navigation .main-nav ul li.booking-btn{margin-left:5px}#masthead .main-navigation .main-nav ul li a{padding-left:10px;padding-right:10px}#masthead .site-logo a img{max-height:65px!important}}@media screen and (max-width:800px){#masthead .site-logo a img{max-height:60px!important}#masthead .main-navigation .main-nav ul li a{padding-left:9px;padding-right:9px}}
    </style>
<?php }
}
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Forside</a>';
    if (is_category() || is_single()) {
            if (is_single()) {
                echo " &nbsp;&nbsp;&#62;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#62;&nbsp;&nbsp;";
        echo the_title();
    }
}
