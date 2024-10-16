<?php
the_post();
get_header(); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="post-content post-single">
                    <div class="post-media post-image">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid', 'loading' => 'lazy')); ?>
                    </div>
                    <div class="post-body">
                        <div class="entry-header">
                            <div class="post-meta">
                                <span class="post-author">
                                    <i class="far fa-user"></i>
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"> <?php echo get_the_author(); ?></a>
                                </span>
                                <span class="post-cat">
                                    <i class="far fa-folder-open"></i>
                                    <a href="#"> <?php echo get_the_category_list(" "); ?></a>
                                </span>
                                <span class="post-meta-date"><i class="far fa-calendar"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="post-comment"><i class="far fa-comment"></i>
                                    <?php
                                    $comments_num = get_comments_number();

                                    if ($comments_num <= 0) {
                                        echo __("No Comments", "constra");
                                    } elseif ($comments_num == 1) {
                                        echo esc_html($comments_num) . __(" Comment", "constra");
                                    } else {
                                        echo esc_html($comments_num) . __(" Comments", "constra");
                                    }
                                    ?>
                                </span>
                            </div>
                            <h2 class="entry-title">
                                <?php the_title(); ?>
                            </h2>
                        </div><!-- header end -->

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <div class="tags-area d-flex align-items-center justify-content-between">
                            <div class="post-tags">
                                <?php echo get_the_tag_list(); ?>
                            </div>
                            <div class="share-items">
                                <ul class="post-social-icons list-unstyled">
                                    <li class="social-icons-head">Share:</li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div><!-- post-body end -->
                </div><!-- post content end -->

                <div class="author-box d-nlock d-sm-flex">
                    <div class="author-img mb-4 mb-md-0">
                        <?php echo get_avatar(get_the_author_meta('ID')); ?>
                    </div>
                    <div class="author-info">
                        <h3><?php echo get_the_author_meta('display_name') ?></h3>
                        <p class="mb-2">
                            <?php echo get_the_author_meta('description'); ?>
                        </p>
                        <p class="author-url mb-0">Website:
                            <span>
                                <a href="<?php echo get_the_author_meta('user_url'); ?>">
                                    <?php echo get_the_author_meta('user_url'); ?>
                                </a>
                            </span>
                        </p>

                    </div>
                </div> <!-- Author box end -->


                <?php

                if (comments_open() || get_comments_number()) {

                    comments_template();
                }

                ?>

            </div><!-- Content Col end -->

            <div class="col-lg-4">

                <?php get_sidebar(); ?>
            </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

    </div><!-- Conatiner end -->
</section><!-- Main container end -->

<?php get_footer(); ?>