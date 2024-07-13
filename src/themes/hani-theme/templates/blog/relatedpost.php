<?php

$args = [
    'categoty__in' => wp_get_post_categories($post->ID),
    'posts_per_page' => '6',
    'post__not_in' => [$post->ID]
];
$query = new WP_Query($args);

?>
<?php if($query->have_posts()): ?>
<div class="related-post my-5">
    <div class="comments-post my-5">
        <div class="section-title position-relative mb-3">
            <div class="title">
                <div class="d-flex align-items-center">
                    <i class="fal fa-arrows-retweet ms-3"></i>
                    <span>مقالات مرتبط</span>

                    
                </div>
        </div>
    </div>

    <div>
        <div class="owl-carousel owl-theme position-relativ" data-slider-items="3" data-navigation="false" data-pagination="ture" data-loop="false">
            <?php while($query->have_posts()) : $query->the_post() ?>
                <div class="item post-inner">

                    <div class="post-thumb position-relativ">
                        <span class="date"><?php echo get_the_date() ?></span>
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail() ?></a>
                    </div>
                    <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
                        <h2 class="title me-2"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                    </div>

                </div>
            <?php endwhile; ?>

        </div>
    </div>
</div>
<?php endif;
wp_reset_postdata();
?>

