

<?php get_header(); ?>
<?php get_template_part( 'templates/page-title' ) ?>

<div class="main-page-wrapper single-post">
    <div class="content-section">
        <div class="container">
            <article id="post-<?php the_ID() ?>" <?php post_class() ?>>
                <?php while (have_posts()): the_post() ?>
                    <?php if(has_post_thumbnail()): ?>

                        <div class="post-thumbnail">
                            <?php echo the_post_thumbnail() ?>
                        </div>
                    <?php endif; ?>
                    <div class="post-details d-flex align-items-center justify-content-center mt-3 mb-5 ">
                        <div class="d-flex align-items-center ms-3">
                            <i class="fal fa-calendar ms-1"></i>
                            <span>تاریخ انتشار: <?php echo get_the_date() ?></span>
                        </div>
                        <div class="d-flex align-items-center ms-3">
                            <i class="fal fa-eye ms-1"></i>
                            <span>تعداد بازدید: <?php
                            global $post;
                            echo get_post_meta( $post->ID, '_post_view_count', true );
                            ?>
                            </span>
                        </div>
                        <div class="d-flex align-items-center ms-3">
                            <i class="fal fa-user ms-1"></i>
                            <span>نام نویسنده : <?php echo get_the_author() ?> </span>
                        </div>
                        <div class="d-flex align-items-center ms-3">
                            <i class="fal fa-folder ms-1"></i>
                            <span>نام دسته بندی : <?php echo get_the_category_list(' , ') ?> </span>
                        </div>
                    </div>
                    <div class="post-content position-relative">

                        <div class="sticky-side">
                            <div class="post-tags mb-2">
                                <div>
                                    <i class="fal fa-tags"></i>
                                    برچسب ها
                                </div>
                                <?php echo get_the_tag_list('',', ')?>
                            </div>
                            <div class="post-share hani-share-opener">
                                <div>
                                    <i class="fal fa-share-nodes"></i>
                                    اشتراک گذاری
                                </div>
                            </div>

                        </div>
                        <?php the_content() ?>
                    </div>
                    
                    <?php get_template_part( 'templates/blog/relatedpost' ) ?>

                    <?php if(comments_open() || get_comments_number()): ?>
                    

                        <div class="comments-post my-5">
                            <div class="section-title position-relative mb-3">
                                <div class="title">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-comment-alt-lines ms-3"></i>
                                        <span>نظرات</span>
                                    </div>
                                </div>
                            </div>


                            <?php comments_template() ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>

            </article>
        </div>

    </div>

    <div class="hani-modal share-modal">
        <div class="body">
            <i class="fal fa-xmark close-share-modal"></i>
                
            <div>
                <p class="desc">
                    با استفاده از روش های زیر می توانید این نوشته را با دوستانتان به اشتراک بگذارید    
                </p>
            </div>
            <div class="d-flex align-items-center justify-content-center my-4">
                <a href="https://telegram.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title(); ?>" target="_blank">
                    <i class="fal fa-paper-plane"></i>
                </a>
                <a href="https://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink();?>" target="_blank">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="https://facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
            <input type="text" class="short-link" value="<?php echo get_bloginfo('url') . "/?p=" . $post->ID ?>" name="" id="" >
        </div>
    </div>
</div>

<?php get_footer(); ?>