<div class="post">
    <div class="post-media post-video">
        <div class="embed-responsive embed-responsive-16by9">
            <!-- Change the url -->

            <?php
            $defaultVideoURL = 'https://www.youtube.com/embed/mbwuj58UEPg?title=0&amp;byline=0&amp;portrait=0&amp;color=8aba56';

            if (function_exists('get_field')) {
                $videoURL = get_field('video_url');
            }

            $videoURL = !empty($videoURL) ? $videoURL : $defaultVideoURL;
            ?>
            <iframe class="embed-responsive-item" src="<?php echo esc_url($videoURL); ?>" allowfullscreen></iframe>
        </div>
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
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        </div><!-- header end -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>

        <div class="post-footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Continue Reading</a>
        </div>

    </div><!-- post-body end -->
</div><!-- 1st post end -->