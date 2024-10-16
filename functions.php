<?php

require_once(get_theme_file_path('/inc/add-plugin.php'));

require(get_theme_file_path('/inc/constra-nav-menu.php'));
require(get_theme_file_path('/inc/widgets/constra-recent-posts-widget.php'));
require(get_theme_file_path('/inc/widgets/constra-footer-about-widget.php'));


// Include Customizer
include_once(get_theme_file_path('/inc/customizer.php'));

// Theme Setup
function constra_theme_setup()
{

    load_theme_textdomain("constra", get_template_directory() . "/languages");

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'caption', 'gallery', 'style', 'script'));
    add_theme_support('post-formats', array('video'));

    register_nav_menu('main-menu', __('Primary Menu', 'constra'));

    add_image_size('constra_featured_image', 1200, 800, true);
}
add_action("after_setup_theme", "constra_theme_setup");


// Enqueue
function constra_enqueue()
{

    wp_enqueue_style('bootstrap-css', get_theme_file_uri('/assets/plugins/bootstrap/bootstrap.min.css'), null, '1.0');
    wp_enqueue_style('all-css', get_theme_file_uri('/assets/plugins/fontawesome/css/all.min.css'), null, '1.0');
    wp_enqueue_style('animate-css', get_theme_file_uri('/assets/plugins/animate-css/animate.css'), null, '1.0');
    wp_enqueue_style('slick-css', get_theme_file_uri('/assets/plugins/slick/slick.css'), null, '1.0');
    wp_enqueue_style('slick-theme-css', get_theme_file_uri('/assets/plugins/slick/slick-theme.css'), null, '1.0');
    wp_enqueue_style('colorbox-css', get_theme_file_uri('/assets/plugins/colorbox/colorbox.css'), null, '1.0');
    wp_enqueue_style('constra-css', get_theme_file_uri('/assets/css/style.css'), null, '1.0');
    wp_enqueue_style('style-css', get_stylesheet_uri(), null, time());



    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/assets/plugins/bootstrap/bootstrap.min.js'), array('jquery'), '1.0', true);

    wp_enqueue_script('slick-js', get_theme_file_uri('/assets/plugins/slick/slick.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('slick-animation-js', get_theme_file_uri('/assets/plugins/slick/slick-animation.min.js'), array('jquery'), '1.0', true);

    wp_enqueue_script('colorbox-js', get_theme_file_uri('/assets/plugins/colorbox/jquery.colorbox.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('shuffle-js', get_theme_file_uri('/assets/plugins/shuffle/shuffle.min.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('map-api-js', "https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU", array(), '1.0', true);
    wp_enqueue_script('map-js', get_theme_file_uri('/assets/plugins/google-map/map.js'), array(), '1.0', true);
    wp_enqueue_script('script-js', get_theme_file_uri('/assets/js/script.js'), array('jquery'), '1.0', true);
}
add_action("wp_enqueue_scripts", "constra_enqueue");




function constra_admin_enqueue($hook_suffix)
{
    if ('widgets.php' === $hook_suffix) {

        wp_enqueue_media();
        wp_enqueue_script('constra-widget-media-uploader', get_template_directory_uri() . '/assets/js/constra-widget-media-uploader.js', array('jquery'), null, true);
    }
}

add_action('admin_enqueue_scripts', 'constra_admin_enqueue');
add_action('customize_controls_enqueue_scripts', 'constra_load_media_uploader');




// Register Sidebar
function constra_sidebar_register()
{

    register_sidebar(array(
        'name' => __('Sidebar', 'constra'),
        'id' => 'constra_sidebar',
        'description' => __('Add widgets for blog sidebar', 'constra'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Left', 'constra'),
        'id' => 'constra_footer_left',
        'before_widget' => '<div class="col-lg-4 col-md-6 footer-widget footer-about">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Middle', 'constra'),
        'id' => 'constra_footer_middle',
        'before_widget' => '<div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'constra'),
        'id' => 'constra_footer_right',
        'before_widget' => '<div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action("widgets_init", "constra_sidebar_register");



// Custom Pagination
function constra_pagination()
{

    $pages = paginate_links(array(
        'type' => 'array',
        'prev_text' => '<i class="fas fa-angle-double-left"></i>',
        'next_text' => '<i class="fas fa-angle-double-right"></i>'
    ));

    if ($pages) {
        echo '<nav class="paging" aria-label="Page navigation example"><ul class="pagination">';

        foreach ($pages as $page) {
            $page = str_replace("page-numbers", "page-link", $page);

            if (strpos($page, 'current') !== false) {

                echo '<li class="page-item active">' . $page . '</li>';
            } else {
                echo '<li class="page-item">' . $page . '</li>';
            }
        }

        echo '</ul></nav>';
    }
}



// Custom Widget
function constra_custom_widget()
{
    register_widget('Constra_Recent_Posts_Widget');
    register_widget('Constra_Footer_About_Widget');
}
add_action("widgets_init", "constra_custom_widget");


// Modify default widget classes
function constra_tag_cloud($args)
{
    $args['format'] = 'list';

    return $args;
}
add_action("widget_tag_cloud_args", "constra_tag_cloud");



// Comments
// class Custom_Comment_Walker extends Walker_Comment
// {
//     // Starts each comment block with your custom structure
//     function start_el(&$output, $comment, $depth = 0, $args = array(), $current_object_id = 0)
//     {
//         $GLOBALS['comment'] = $comment;
//         $indent = ($depth) ? str_repeat("\t", $depth) : '';

//         // Start comment <li> tag
//         $output .= $indent . '<li ' . comment_class('comment', $comment, null, false) . ' id="comment-' . $comment->comment_ID . '">';

//         $classes = 'd-flex';

//         // Add 'comment' class for top-level comments
//         if ($depth === 0) {
//             $classes .= ' comment';
//         }

//         // Main comment structure
//         $output .= '<div class="' . $classes . '">'; // Comment container

//         // Add avatar
//         $output .= get_avatar($comment, 80, '', esc_attr(get_comment_author()), array('class' => 'comment-avatar'));

//         // Comment body
//         $output .= '<div class="comment-body">';

//         // Meta data for author and date
//         $output .= '<div class="meta-data">';
//         $output .= '<span class="comment-author mr-3">' . get_comment_author() . '</span>';
//         $output .= '<span class="comment-date float-right">' . get_comment_date() . ' at ' . get_comment_time() . '</span>';
//         $output .= '</div>'; // Close meta-data

//         // Comment content
//         $output .= '<div class="comment-content"><p>' . get_comment_text() . '</p></div>';

//         // Check if 'post' exists in $args and if not, get the global $post object
//         $post = !empty($args['post']) ? $args['post'] : get_post();

//         // Always show reply link for all comments (both top-level and nested)

//         $output .= '<div class="text-left">';
//         $output .= get_comment_reply_link(array(
//             'reply_text' => '<span class="comment-reply-link comment-reply font-weight-bold">Reply</span>',
//             'add_below'  => 'comment',
//             'respond_id' => 'respond',
//             'post_id'    => $post->ID, // Pass the post ID explicitly
//         ), $comment, $post);
//         $output .= '</div>'; // Close text-left


//         $output .= '</div>'; // Close comment-body
//         $output .= '</div>'; // Close comment d-flex
//     }



//     // Ends each comment block
//     function end_el(&$output, $comment, $depth = 0, $args = array())
//     {
//         $output .= '</li>'; // Close the comment <li> tag
//     }

//     // Starts the list before the children comments (adds a <ul> with 'comments-reply' class)
//     function start_lvl(&$output, $depth = 0, $args = array())
//     {
//         $indent = str_repeat("\t", $depth);
//         $output .= "\n$indent<ul class='comments-reply'>\n"; // Add the 'comments-reply' class here
//     }

//     // Ends the list of child comments
//     function end_lvl(&$output, $depth = 0, $args = array())
//     {
//         $indent = str_repeat("\t", $depth);
//         $output .= "$indent</ul>\n"; // Close nested <ul> with the class 'comments-reply'
//     }
// }



// Remember to close the nested <ul> after all replies
// add_action('wp_list_comments', 'close_nested_comments', 10, 2);
// function close_nested_comments($output, $args)
// {
//     return $output . '</ul>'; // Close the replies list
// }


// function constra_reply_link_class($class)
// {
//     $class = str_replace("class='comment-reply-link", "class='comment-reply-link comment-reply font-weight-bold", $class);
//     return $class;
// }

// add_filter('comment_reply_link', 'constra_reply_link_class');



function constra_register_new_widgets($widgets_manager)
{

    // Include your widget files
    require_once(__DIR__ . '/inc/widgets/el/constra-slider-widget.php');
    require_once(__DIR__ . '/inc/widgets/el/constra-accordion-widget.php');

    // Register your widgets
    $widgets_manager->register(new \Elementor_Custom_Slider_Widget());
    $widgets_manager->register(new \Elementor_Custom_Accordion_Widget());
}
add_action('elementor/widgets/register', 'constra_register_new_widgets');
