<?php

class Constra_Recent_Posts_Widget extends WP_Widget
{

    public function __construct()
    {

        parent::__construct(
            'constra_recent_posts',
            __('Constra Recent Posts', 'constra'),
            array(
                'description' => __('Display recent posts', 'constra')
            )
        );
    }


    public function form($instance)
    {

        $title = isset($instance['title']) ? $instance['title'] : '';
        $num_of_posts = isset($instance['num_of_posts']) ? $instance['num_of_posts'] : '';
?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title) ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('num_of_posts'); ?>">Number of posts to show:</label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('num_of_posts'); ?>" name="<?php echo $this->get_field_name('num_of_posts'); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($num_of_posts) ?>" size="3">
        </p>

    <?php
    }



    public function update($new_instance, $old_instance)
    {

        $instance = []; //title num_of_posts show_date

        $instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['num_of_posts'] = !empty($new_instance['num_of_posts']) ? strip_tags($new_instance['num_of_posts']) : '';

        return $instance;
    }


    public function widget($args, $instance)
    {

        $title = apply_filters('widget_title', $instance['title']);
        $custom_class = 'recent-posts';

        $args['before_widget'] = str_replace('class="', 'class="' . $custom_class . ' ', $args['before_widget']);

        echo $args['before_widget'];
        echo $args['before_title'];
        echo $title;
        echo $args['after_title'];
    ?>

        <ul class="list-unstyled">

            <?php
            $query = new WP_Query(array(
                'posts_per_page' => $instance['num_of_posts'],
                'status_type' => 'published'
            ));

            if ($query->have_posts()) {

                while ($query->have_posts()) {
                    $query->the_post();

            ?>
                    <li class="d-flex align-items-center">
                        <div class="posts-thumb">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail', array('loading' => 'lazy')); ?>
                            </a>
                        </div>
                        <div class="post-info">
                            <h4 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                        </div>
                    </li>
            <?php
                }
            } else {
                echo "<h5>No posts found.</h5>";
            }

            ?>

        </ul>
<?php

        echo $args['after_widget'];
    }
}
