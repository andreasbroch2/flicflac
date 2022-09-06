<?php
$header = get_sub_field('header');
$pricepacks = get_sub_field('pricepacks');
?>

<section class="flexible-inner-section bbh-inner-section single-pricepack">
    <div class="grid-container">
        <?php if ($header) : ?>
            <div class="row">
                <div class="col-sm-12 headline">
                    <div class="header">
                        <h2><?php echo $header ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12">
                <?php if ($pricepacks) : ?>
                    <div class="pricepacks">
                        <?php foreach ($pricepacks as $pricepack) :
                            $permalink = get_permalink($pricepack->ID);
                            $title = get_the_title($pricepack->ID);
                            $prices_price = get_field('prices_price', $pricepack->ID);
                            $prices_description = get_field('prices_description', $pricepack->ID);
                            $prices_list = get_field('prices_list', $pricepack->ID);
                            $prices_tax = get_field('prices_tax', $pricepack->ID);
                            $prices_btn = get_field('prices_btn', $pricepack->ID);
                            $prices_btn_id = get_field('prices_btn_id', $pricepack->ID);
                        ?>
                            <div class="pricepack">
                                <div class="price">
                                    <p><?php echo $prices_price ?></p>
                                </div>
                                <div class="text">
                                    <h3><?php echo $title ?></h3>
                                    <?php echo $prices_description ?>
                                    <?php echo $prices_list ?>
                                    <p class="small-text"><?php echo $prices_tax ?></p>
                                </div>
                                <div class="pricepack-btn">
                                    <button class="btn" id="<?php echo $prices_btn_id ?>"><?php echo $prices_btn['title'] ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.pricepack-btn button#advisory-board-form').on('click', function() {
            SleekNote.triggerOnClick('872b9472-4b4b-489b-b050-183d4ced63ed');
        });
    });
    </script>