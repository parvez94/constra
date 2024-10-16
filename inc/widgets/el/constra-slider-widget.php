<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly

class Elementor_Custom_Slider_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'custom_slider';
    }

    public function get_title()
    {
        return __('Custom Slider', 'constra');
    }

    public function get_icon()
    {
        return 'eicon-slider-full-screen';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {
        // Start Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Slider Content', 'constra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        // Slider Items Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'bg_image',
            [
                'label' => __('Background Image', 'constra'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Slide Title', 'constra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Slide Title', 'constra'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sub_title',
            [
                'label' => __('Slide Subtitle', 'constra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Slide Subtitle', 'constra'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'constra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Learn More', 'constra'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label' => __('Button URL', 'constra'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'constra'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ]
            ]
        );


        $this->add_control(
            'slides',
            [
                'label' => __('Slides', 'constra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('Slide 1', 'constra'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();






        // Start Style Section for Title
        $this->start_controls_section(
            'style_section_title',
            [
                'label' => __('Title', 'constra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'constra'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'constra'),
                'selector' => '{{WRAPPER}} .slide-title',
            ]
        );

        $this->end_controls_section();




        // Start Style Section for Subtitle
        $this->start_controls_section(
            'style_section_subtitle',
            [
                'label' => __('Subtitle', 'constra'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Subtitle Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .slide-sub-title',
            ]
        );

        $this->end_controls_section();




        // Start Style Section for Buttons
        $this->start_controls_section(
            'style_section_button',
            [
                'label' => __('Button', 'text-domain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Button Text Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider.btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Button Background Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider.btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .slider.btn',
            ]
        );

        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $is_edit = \Elementor\Plugin::$instance->editor->is_edit_mode();
?>
        <div class="banner-carousel banner-carousel-1 mb-0">
            <?php foreach ($settings['slides'] as $slide) : ?>
                <div class="banner-carousel-item" style="background-image:url(<?php echo esc_url($slide['bg_image']['url']); ?>)">
                    <div class="slider-content">
                        <div class="container h-100">
                            <div class="row align-items-center h-100">
                                <div class="col-md-12 text-center">
                                    <h2 class="slide-title" <?php echo $is_edit ? '' : 'data-animation-in="slideInLeft"'; ?>><?php echo esc_html($slide['title']); ?></h2>
                                    <h3 class="slide-sub-title" <?php echo $is_edit ? '' : 'data-animation-in="slideInRight"'; ?>><?php echo esc_html($slide['sub_title']); ?></h3>
                                    <p <?php echo $is_edit ? '' : 'data-animation-in="slideInLeft"  data-duration-in="1.2"'; ?>>
                                        <?php if (!empty($slide['button_text']) && !empty($slide['button_url']['url'])) : ?>
                                            <a href="<?php echo esc_url($slide['button_url']['url']); ?>" class="slider btn btn-primary"><?php echo esc_html($slide['button_text']); ?></a>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php
    }
}
