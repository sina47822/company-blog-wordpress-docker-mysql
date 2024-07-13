<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <div class="post-inner">
        <?php if(has_post_thumbnail()): ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink( ) ?>">
                    <?php the_post_thumbnail( ) ?>
                </a>
            </div>
        <?php endif;?>

        <div class="post-content">
            <h2 class="title">
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
            </h2>
        </div>

        <div class="post-excerpt mb-3" >
            <?php if(has_excerpt()): ?>
                <?php the_excerpt() ?>

            <?php else: ?>
                <?php echo wp_trim_words(get_the_content() , 15 , '...'); ?>
            <?php endif; ?>
        </div>

        <div class="post-meta d-flex align-items-center justify-content-between">
            <div>
                <i class="fal fa-pen-line"></i>
                <span>دسته : <?php echo get_the_category(get_the_ID())[0]->name ?></span>
            </div>
            <div>
                <i class="fal fa-calendar"></i>
                <span>تاریخ انتشار: <?php echo get_the_date() ?></span>
            </div>
        </div>


        <div class="post-footer d-flex align-items-center justify-content-between">
            <div class="author">
                <span>نویسنده : <?php echo get_the_author() ?></span>
            </div>
            <div class="more">
                <a href="<?php echo the_permalink() ?>">بیشتر بخوانید...</a>
            </div>
        </div>
    </div>
</article>