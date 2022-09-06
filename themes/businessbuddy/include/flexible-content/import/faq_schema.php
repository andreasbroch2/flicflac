<?php $heading = get_sub_field( 'heading' );
$faq_on_page = get_sub_field( 'faq_on_page' );
//FAQ function
function generate_faq_schema () {
   if ( have_rows('faq_repeater') ) {
       $schema = [
           '@context'   => "https://schema.org",
           '@type'      => "FAQPage",
           'mainEntity' => array()
       ];
       while ( have_rows('faq_repeater') ) : the_row();
           $questions = [
               '@type'          => 'Question',
               'name'           => get_sub_field('question'),
               'acceptedAnswer' => [
                   '@type' => "Answer",
                   'text' => get_sub_field('answer')
               ]
           ];
           array_push($schema['mainEntity'], $questions);
       endwhile;
       echo '<script type="application/ld+json">'. json_encode($schema) .'</script>';
   }
}
// Echo FAQ
echo generate_faq_schema(); ?>
<?php
// FAQ page section
if ($faq_on_page): ?>
<section class="flexible-inner-section bbh-inner-section faq-schema has-padding">
    <div class="grid-container">
        <div class="row">
            <div class="col-sm-12">
                <div class="faq-container">
                    <?php if ($heading): ?>
                        <div class="heading-container">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif;
                    // check if the repeater field has rows of data
                    if( have_rows('faq_repeater') ):
                        ?><div class="collapse-section"><?php
                        while ( have_rows('faq_repeater') ) : the_row();
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');
                            ?>
                            <div class="info">
                                <button class="headline"><?php if ($question) { echo $question; } ?></button>
                                <div class="text" style="display:none"><?php if ($answer) { echo $answer; } ?></div>
                            </div>
                            <?php
                        endwhile;
                        ?></div><?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
