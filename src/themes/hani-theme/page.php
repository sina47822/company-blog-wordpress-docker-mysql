<?php get_header(); ?>
<?php get_template_part( 'templates/page-title' ) ?>

<div class="main-page-wrapper single-page">
    <div class="content-section">
        <div class="container">
            <article id="post-<?php the_ID() ?>" <?php post_class() ?>>
                <?php while (have_posts()): the_post() ?>

                    <div class="post-content position-relative">
                        <?php the_content() ?>
                    </div>
                    
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

</div>
<?php get_footer(); ?>
