<?php

class Constra_Footer_About_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'constra_footer_about',
            __('Constra About Us', 'constra'),
            [
                'description' => __('About Us widgets for footer')
            ]
        );
    }


    public function form($instance)
    {

        $title = isset($instance['title']) ? $instance['title'] : '';

        $image_url = isset($instance['image']) ? $instance['image'] : '';

        $description = isset($instance['description']) ? $instance['description'] : '';

?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title) ?>" />
        </p>

        <p>
            <input class="constra-media-url" type="hidden" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo esc_url($image_url); ?>" />

            <button type="button" class="button constra-select-media">
                <?php
                echo empty($image_url) ? 'Select Image' : 'Change Image'
                ?>
            </button>

        <div class="constra-image-preview" style="margin-top:10px; background-color: #f0f0f0">

            <?php if (!empty($image_url)): ?>
                <img src="<?php echo esc_url($image_url); ?>" style="max-width:100%; height:auto;" />
            <?php endif; ?>

        </div>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('description'); ?>">Description:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" rows="4"><?php echo esc_html($description); ?></textarea>
        </p>

<?php
    }



    public function update($new_instance, $old_instance)
    {

        $instance = [];

        $instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';

        $instance['image'] = !empty($new_instance['image']) ? esc_url($new_instance['image']) : '';


        $instance['description'] = !empty($new_instance['description']) ? strip_tags($new_instance['description']) : '';

        return $instance;
    }



    public function widget($args, $instance)
    {

        $title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
        $image_url = !empty($instance['image']) ? esc_url($instance['image']) : '';
        $description = !empty($instance['description']) ? esc_html($instance['description']) : '';

        // Output the widget content
        echo $args['before_widget'];

        // Display the title if it's set
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Display the image if the URL is set
        if (!empty($image_url)) {
            echo '<img loading="lazy" width="200px" class="footer-logo" src="' . $image_url . '" alt="' . esc_attr($title) . '">';
        }

        // Display the description if it's set
        if (!empty($description)) {
            echo '<p>' . $description . '</p>';
        }

        echo $args['after_widget'];
    }
}
