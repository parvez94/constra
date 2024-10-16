<?php

function constra_customize_register($wp_customize)
{

    // HEADER PANEL
    $wp_customize->add_panel('constra_header_panel', array(
        'title' => __('Header', 'constra'),
        'priority' => 90
    ));


    // TOP HEADER SECTION
    $wp_customize->add_section('constra_topbar_section', array(
        'title' => __('Top Header', 'constra'),
        'panel' => 'constra_header_panel'
    ));

    // TOP HEADER VISIBILITY SETTING
    $wp_customize->add_setting('constra_topbar_visibility', array(
        'type' => 'theme_mod',
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean'
    ));

    // TOP HEADER VISIBILITY CONTROL
    $wp_customize->add_control('constra_topbar_visibility', array(
        'label' => __('Show Top Header', 'constra'),
        'description' => __('Complete top header show/hide', 'constra'),
        'section' => 'constra_topbar_section',
        'type' => 'checkbox'
    ));


    // TOP HEADER ADDRESS SETTING
    $wp_customize->add_setting('constra_topbar_address', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    // TOP HEADER ADDRESS CONTROL
    $wp_customize->add_control('constra_topbar_address', array(
        'label' => __('Address', 'constra'),
        'section' => 'constra_topbar_section',
        'type' => 'text',
        'active_callback' => function () {
            return get_theme_mod('constra_topbar_visibility', true);
        }
    ));


    // TOP HEADER ADDRESS URL SETTING
    $wp_customize->add_setting('constra_topbar_address_url', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    // TOP HEADER ADDRESS URL CONTROL
    $wp_customize->add_control('constra_topbar_address_url', array(
        'label' => __('Address URL', 'constra'),
        'section' => 'constra_topbar_section',
        'type' => 'url',
        'active_callback' => function () {
            return get_theme_mod('constra_topbar_visibility', true);
        }
    ));


    // FACEBOOK SETTING
    $wp_customize->add_setting('constra_facebook', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    // FACEBOOK CONTROL
    $wp_customize->add_control('constra_facebook', array(
        'label' => __('Facebook URL', 'constra'),
        'section' => 'constra_topbar_section',
        'type' => 'url',
        'active_callback' => function () {
            return get_theme_mod('constra_topbar_visibility', true);
        }
    ));

    // TWITTER SETTING
    $wp_customize->add_setting('constra_twitter', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    // TWITTER CONTROL
    $wp_customize->add_control('constra_twitter', array(
        'label' => __('Twitter URL', 'constra'),
        'section' => 'constra_topbar_section',
        'type' => 'url',
        'active_callback' => function () {
            return get_theme_mod('constra_topbar_visibility', true);
        }
    ));

    // INSTAGRAM SETTING
    $wp_customize->add_setting('constra_instagram', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    // INSTAGRAM CONTROL
    $wp_customize->add_control('constra_instagram', array(
        'label' => __('Instagram URL', 'constra'),
        'section' => 'constra_topbar_section',
        'type' => 'url',
        'active_callback' => function () {
            return get_theme_mod('constra_topbar_visibility', true);
        }
    ));



    // MAIN HEADER SECTION
    $wp_customize->add_section('constra_main_header_section', array(
        'title' => __('Main Header', 'constra'),
        'panel' => 'constra_header_panel'
    ));


    // MAIN HEADER PHONE SETTING
    $wp_customize->add_setting('constra_main_header_phone', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));
    // MAIN HEADER PHONE CONTROL
    $wp_customize->add_control('constra_main_header_phone', array(
        'label' => __('Phone', 'constra'),
        'section' => 'constra_main_header_section',
        'type' => 'text',
    ));


    // MAIN HEADER EMAIL SETTING
    $wp_customize->add_setting('constra_main_header_email', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    // MAIN HEADER EMAIL CONTROL
    $wp_customize->add_control('constra_main_header_email', array(
        'label' => __('Email address', 'constra'),
        'section' => 'constra_main_header_section',
        'type' => 'email',
    ));


    // MAIN HEADER BUTTON TEXT SETTING
    $wp_customize->add_setting('constra_main_header_btn_text', array(
        'type' => 'theme_mod',
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    // MAIN HEADER BUTTON TEXT CONTROL
    $wp_customize->add_control('constra_main_header_btn_text', array(
        'label' => __('Button Text', 'constra'),
        'section' => 'constra_main_header_section',
        'type' => 'text',
    ));




    // MAIN HEADER BUTTON LINK TYPE SETTING
    $wp_customize->add_setting('constra_main_header_btn_link_type', array(
        'default' => 'custom', // 'custom' or 'page'
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // MAIN HEADER BUTTON LINK TYPE CONTROL
    $wp_customize->add_control('constra_main_header_btn_link_type', array(
        'label' => __('Button Link Type', 'constra'),
        'section' => 'constra_main_header_section',
        'type' => 'select',
        'choices' => array(
            'custom' => __('Custom URL', 'constra'),
            'page'   => __('Select Page', 'constra'),
        ),
    ));

    // MAIN HEADER BUTTON LINK (Custom URL)
    $wp_customize->add_setting('constra_main_header_btn_custom_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('constra_main_header_btn_custom_link', array(
        'label' => __('Button URL', 'constra'),
        'section' => 'constra_main_header_section',
        'type' => 'url',
        'active_callback' => function () {
            return get_theme_mod('constra_main_header_btn_link_type', 'custom') === 'custom';
        },
    ));

    // MAIN HEADER BUTTON LINK (Select Page)
    $wp_customize->add_setting('constra_main_header_btn_page_link', array(
        'default' => '',
        'sanitize_callback' => 'absint', // For page ID
    ));

    $wp_customize->add_control('constra_main_header_btn_page_link', array(
        'label' => __('Select Page for Button', 'constra'),
        'section' => 'constra_main_header_section',
        'type' => 'dropdown-pages',
        'active_callback' => function () {
            return get_theme_mod('constra_main_header_btn_link_type', 'custom') === 'page';
        },
    ));
}
add_action("customize_register", "constra_customize_register");
