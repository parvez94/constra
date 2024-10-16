<?php if (post_password_required()) {
    return;
} ?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="comments-heading">
            <?php printf(
                _nx(
                    'One comment',
                    '%1$s comments',
                    get_comments_number(),
                    'comments title',
                    'constra'
                ),
                number_format_i18n(get_comments_number())
            ); ?>
        </h3>

        <ol class="comments-list">
            <?php wp_list_comments(array(
                'style'         => 'ol',
                'avatar_size'   => 80,
            )); ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'constra'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'constra')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'constra')); ?></div>
            </nav>
        <?php endif; ?>


        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'constra'); ?></p>
        <?php endif; ?>

    <?php endif; ?>


    <?php
    // Comment form customization
    $comment_form_args = array(
        'fields' => array(
            'author' => '<div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="d-block">
                                    <input class="form-control" name="author" id="name" placeholder="Your Name" type="text" required>
                                </label>
                            </div>
                         </div>',
            'email'  => '<div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="d-block">
                                    <input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required>
                                </label>
                            </div>
                         </div>',
            'url'    => '<div class="col-md-4">
                            <div class="form-group">
                                <label for="website" class="d-block">
                                    <input class="form-control" name="url" id="website" placeholder="Your Website" type="url">
                                </label>
                            </div>
                         </div>',
        ),
        'comment_field' => '<div class="col-md-12">
                                <div class="form-group">
                                    <label for="message" class="w-100">
                                        <textarea class="form-control required-field" id="message" name="comment" placeholder="Your Comment" rows="10" required></textarea>
                                    </label>
                                </div>
                            </div>',
        'class_form' => 'row',
        'submit_button' => '<div class="clearfix">
                                <button class="btn btn-primary" type="submit" aria-label="post-comment">Post Comment</button>
                            </div>',
        'title_reply' => '<h3 class="title-normal">Add a comment</h3>'
    );

    comment_form($comment_form_args);

    ?>


</div><!-- #comments -->