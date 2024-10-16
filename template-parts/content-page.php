<div class="post-content post-single">
    <div class="post-media post-image">
        <?php the_post_thumbnail('large', array('class' => 'img-fluid', 'loading' => 'lazy')); ?>
    </div>

    <div class="post-body">
        <div class="entry-header">
            <h2 class="entry-title">
                <?php the_title(); ?>
            </h2>
        </div><!-- header end -->

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

    </div><!-- post-body end -->
</div><!-- post content end -->