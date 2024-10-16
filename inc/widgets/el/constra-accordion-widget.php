<?php

if (!defined('ABSPATH')) exit;

class Elementor_Custom_Accordion_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'custom_accordion';
    }

    public function get_title()
    {
        return __('Constra Accordion', 'constra');
    }

    public function get_icon()
    {
        return 'eicon-accordion';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'accordion_content_section',
            [
                'label' => __('Accordion Content', 'constra'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_tab_title',
            [
                'label' => __('Title', 'constra'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $repeater->add_control(
            'accordion_tab_content',
            [
                'label' => __('Description', 'constra'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true
            ]
        );

        $this->add_control(
            'constra_accordion',
            [
                'label' => __('Accordion', 'constra'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_tab_title' => __('Accordion 1', 'constra')
                    ]
                ],
                'title_field' => '{{{ accordion_tab_title }}}'
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="accordion accordion-group" id="our-values-accordion">

            <?php foreach ($settings['constra_accordion'] as $index => $accordion) : ?>

                <?php
                $heading_id = 'heading' . $index;
                $collapse_id = 'collapse' . $index;
                ?>

                <div class="card">
                    <div class="card-header p-0 bg-transparent" id="<?php echo esc_attr($heading_id); ?>">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                <?php echo esc_html($accordion['accordion_tab_title']) ?>
                            </button>
                        </h2>
                    </div>

                    <div id="<?php echo esc_attr($collapse_id); ?>" class="collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-parent="#our-values-accordion">
                        <div class="card-body">
                            <?php echo esc_html($accordion['accordion_tab_content']) ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

<?php
    }
}
