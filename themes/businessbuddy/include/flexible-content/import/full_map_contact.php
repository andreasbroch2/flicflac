<section class="flexible-inner-section bbh-inner-section map-contact-info">
    <div class="contact-info-container">
        <?php // Check rows exists.
            if( have_rows('map_contact_info') ):

                // Loop through rows.
                while( have_rows('map_contact_info') ) : the_row();
                $icomoon = get_sub_field('icomoon');
                $contact_info = get_sub_field('contact_info');
                ?>
                <div class="contact-card">
                    <span class="<?php echo $icomoon ?>"></span>
                    <?php echo $contact_info; ?>
                </div>
                <?php endwhile;
            endif;
    //  ?>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d35996.62973381844!2d9.55758458036826!3d55.67526300543689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464c83604cdf955f%3A0x5c9413398e9a434f!2sAndk%C3%A6rvej%2019%2C%207100%20Vejle!5e0!3m2!1sda!2sdk!4v1643366171974!5m2!1sda!2sdk" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</section>
