<?php
$text = get_sub_field('text');
$headline = get_sub_field('headline');
 ?>

<section class="flexible-inner-section bbh-inner-section new-contact-form">
    <div class="grid-container">
        <div class="row">
            <div class="col-sm-6">
                <div class="text">
                <?php echo $text ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="cForm">
                    <h2><?php echo $headline ?></h2>
                <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
