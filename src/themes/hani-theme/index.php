<?php get_header(); ?>
<?php get_template_part( 'templates/page-title' ) ?>

<div class="main-page-wrapper single-page">
    <div class="content-section">
        <div class="container">
            <div class="row my-5">
                <div class="col-12 col-md-2">
                    <?php dynamic_sidebar('sidebar-blog') ?>
                </div>
                <div class="col12 col-md-10">
                    <div class="row">
                        <?php if (have_posts()): ?>
                            <?php while(have_posts()): the_post() ?>
                                <div class="col12 col-md-4 mb-3">
                                    <?php echo get_template_part('templates/blog/grid') ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="pagination">
                        <?php echo paginate_links([
                            'type' => 'list',
                            'prev_text' => '<i class="fal fa-angle-right"></i>',
                            'next_text' => '<i class="fal fa-angle-left"></i>',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>
