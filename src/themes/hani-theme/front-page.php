<?php

$background_img = hani_settings('background-img');

?>
<?php get_template_part( 'parts/header' ) ?>


<div>
    <div class="img-fullscreen-background" style="background-image: url(<?php echo esc_url( $background_img['url'] ) ?>);">
        <div class="d-flex aligns-item-center">
            <div class="text-on-img container">
                <h2>
                    <span>you dont have to</span>
                    <span>run your bussiness</span>
                    <span>like they told you</span>
                </h2>
                <p>thats the describe of the title upeer this text show</p>
            </div>
            <div class="other-side-img"></div>
        </div>
    </div>
</div>

<div><?php the_content() ?></div>
<?php get_footer(); ?>
