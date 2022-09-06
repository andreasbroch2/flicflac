<?php
$pricepacks = get_sub_field('pricepacks');
$headline = get_sub_field('headline_whitepaper');
$img = get_sub_field('image_whitepaper');
$buyform = get_sub_field('buy_form_id');
$paperform = get_sub_field('whitepaper_form_id');
?>

<section class="flexible-inner-section bbh-inner-section col2_header">
    <div class="grid-container">
        <div class="row">
            <div class="col-sm-6 left">
                <div class="header-text">
                    <h2><?php echo $headline ?></h2>
                </div>
                <img class="lazyload big-img" data-srcset="<?php echo $img['sizes']['large'] ?>" alt="<?php echo $img['alt'] ?>">
                <iframe frameborder="0" style="height:600px;width:99%;border:none;" src='https://forms.zohopublic.eu/businessbuddy/form/Signup/formperma/V-aJq0-D7UnK57V3PRB2SNvni7Vv3spYzPQOoEff-uo'></iframe>
            </div>
            <div class="col-sm-6 right">
                <div class="header-text">
                    <h2>Få et stærkt Advisory Board til din virksomhed</h2>
                </div>
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
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <iframe frameborder="0" style="height:800px;width:99%;border:none;" src='https://forms.zohopublic.eu/businessbuddy/form/AdvisoryBoardOpstning/formperma/8ioesQFYNweHIrQ0krHo_yr3rD0EA_s1LH5wh38RC0g'></iframe>
            </div>
        </div>
    </div>
</section>