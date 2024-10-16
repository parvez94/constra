<?php
$topbar_show = get_theme_mod('constra_topbar_visibility');
$topbar_addess = get_theme_mod('constra_topbar_address', '9051 Constra Incorporate, USA');
$topbar_addess_url = get_theme_mod('constra_topbar_address_url');

$facebook_url = get_theme_mod('constra_facebook');
$twitter_url = get_theme_mod('constra_twitter');
$instagram_url = get_theme_mod('constra_instagram');

$constra_phone = get_theme_mod('constra_main_header_phone', '(+9) 847-291-4353');
$constra_email = get_theme_mod('constra_main_header_email', 'office@constra.com');

$constra_btn_text = get_theme_mod('constra_main_header_btn_text', 'Get A Quote');
$constra_btn_url = get_theme_mod('constra_main_header_btn_link');



$has_phone = !empty($constra_phone);
$has_email = !empty($constra_email);

// Determine which <li> should have the 'last' class
$phone_class = $has_phone && !$has_email ? 'last' : '';
$email_class = $has_email ? 'last' : '';



$button_link_type = get_theme_mod('constra_main_header_btn_link_type', 'custom');
if ($button_link_type === 'custom') {
    $button_link = get_theme_mod('constra_main_header_btn_custom_link');
} else {
    $page_id = get_theme_mod('constra_main_header_btn_page_link');
    $button_link = $page_id ? get_permalink($page_id) : "#";
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="body-inner">
        <?php if ($topbar_show) : ?>
            <div id="top-bar" class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <?php if (!empty($topbar_addess)) : ?>
                                <ul class="top-info text-center text-md-left">
                                    <li>
                                        <a target="_blank" href="<?php echo esc_url($topbar_addess_url); ?>">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p class="info-text">
                                                <?php echo esc_html($topbar_addess); ?>
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <!--/ Top info end -->

                        <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                            <ul class="list-unstyled">
                                <li>
                                    <?php if (!empty($facebook_url)) : ?>
                                        <a target="_blank" title="Facebook" href="<?php echo esc_url($facebook_url); ?>">
                                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                        </a>
                                    <?php endif ?>


                                    <?php if (!empty($twitter_url)) : ?>
                                        <a target="_blank" title="Twitter" href="<?php echo esc_url($twitter_url); ?>">
                                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                        </a>
                                    <?php endif ?>

                                    <?php if (!empty($instagram_url)) : ?>
                                        <a target="_blank" title="Instagram" href="<?php echo esc_url($instagram_url); ?>">
                                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                        </a>
                                    <?php endif ?>
                                </li>
                            </ul>
                        </div>
                        <!--/ Top social end -->
                    </div>
                    <!--/ Content row end -->
                </div>
                <!--/ Container end -->
            </div>
        <?php endif; ?>
        <!--/ Topbar end -->

        <!-- Header start -->
        <header id="header" class="header-one">
            <div class="bg-white">
                <div class="container">
                    <div class="logo-area">
                        <div class="row align-items-center">
                            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                                <?php if (has_custom_logo()) : the_custom_logo();  ?>

                                <?php else : ?>
                                    <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                <?php endif; ?>
                            </div><!-- logo end -->

                            <div class="col-lg-9 header-right">
                                <ul class="top-info-box">
                                    <?php if ($has_phone) : ?>
                                        <li class="<?php echo esc_attr($phone_class); ?>">
                                            <div class="info-box">
                                                <div class="info-box-content">
                                                    <p class="info-box-title">Call Us</p>
                                                    <p class="info-box-subtitle">
                                                        <a href="tel:<?php echo esc_html($constra_phone); ?>">
                                                            <?php echo esc_html($constra_phone); ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($has_email) : ?>
                                        <li class="<?php echo esc_attr($email_class); ?>">
                                            <div class="info-box last">
                                                <div class="info-box-content">
                                                    <p class="info-box-title">Email Us</p>
                                                    <p class="info-box-subtitle">
                                                        <a href="mailto:<?php echo esc_html($constra_email); ?>">
                                                            <?php echo esc_html($constra_email); ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (!empty($button_link)) : ?>
                                        <li class="header-get-a-quote">
                                            <a class="btn btn-primary" href="<?php echo esc_url($button_link); ?>">
                                                <?php echo esc_html($constra_btn_text); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul><!-- Ul end -->
                            </div><!-- header right end -->
                        </div><!-- logo area end -->

                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div>

            <div class="site-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div id="navbar-collapse" class="collapse navbar-collapse">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'menu_class' => 'nav navbar-nav mr-auto',
                                        'container' => '',
                                        'fallback_cb' => 'Constra_Nav_Menu::fallback_cb',
                                        'walker' => new Constra_Nav_Menu
                                    ));
                                    ?>
                                </div>
                            </nav>
                        </div>
                        <!--/ Col end -->
                    </div>
                    <!--/ Row end -->

                    <div class="nav-search">
                        <span id="search"><i class="fa fa-search"></i></span>
                    </div><!-- Search end -->

                    <div class="search-block" style="display: none;">
                        <?php echo get_search_form(); ?>
                        <span class="search-close">&times;</span>
                    </div><!-- Site search end -->

                </div>
                <!--/ Container end -->

            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->