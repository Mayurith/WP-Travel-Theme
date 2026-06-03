<?php

if (!defined('ABSPATH')) {
    exit;
}

class WPT_Hero_Banner_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'wpt-hero-banner';
    }

    public function get_title()
    {
        return esc_html__('WPT Hero Banner', 'wptheme');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories()
    {
        return ['wpt-category'];
    }

    public function get_keywords()
    {
        return ['hero', 'banner', 'slider', 'travel', 'tour'];
    }

    public function get_style_depends()
    {
        return ['swiper', 'wpt-hero-slider'];
    }

    public function get_script_depends()
    {
        return ['swiper', 'wpt-hero-slider'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'hero_slider_section',
            [
                'label' => esc_html__('Hero Slides', 'wptheme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slide_title',
            [
                'label' => esc_html__('Title', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore The World', 'wptheme'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slide_description',
            [
                'label' => esc_html__('Description', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Discover unforgettable travel experiences.', 'wptheme'),
            ]
        );

        $repeater->add_control(
            'slide_button_text',
            [
                'label' => esc_html__('Button Text', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Discover More', 'wptheme'),
            ]
        );

        $repeater->add_control(
            'slide_button_link',
            [
                'label' => esc_html__('Button Link', 'wptheme'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'slide_background_image',
            [
                'label' => esc_html__('Background Image', 'wptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => esc_html__('Slides', 'wptheme'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slide_title' => esc_html__('Explore The World', 'wptheme'),
                    ],
                ],
                'title_field' => '{{{ slide_title }}}',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'wptheme'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'wptheme'),
                'label_off' => esc_html__('No', 'wptheme'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if (empty($settings['slides'])) {
            return;
        }
        ?>

            <section class="wpt-hero-slider swiper absolute h-screen w-full overflow-hidden">

                <div class="swiper-wrapper">

                    <?php foreach ($settings['slides'] as $slide): ?>

                            <div class="swiper-slide relative flex h-screen w-full items-center justify-center overflow-hidden">

                                <!-- Background Image -->
                                <div class="absolute inset-0 scale-105 bg-cover bg-center transition-transform duration-[8000ms] ease-linear"
                                     style="background-image: url('<?php echo esc_url($slide['slide_background_image']['url']); ?>');">
                                </div>

                                <!-- Overlay -->
                                <!-- <div class="absolute inset-0 bg-black/10"></div> -->

                                <!-- Content -->
                                <div class="relative z-10 mx-auto flex max-w-5xl flex-col items-center px-6 text-center text-white">

                                    <h1 class="mb-6 text-5xl font-bold leading-tight md:text-7xl">
                                        <?php echo esc_html($slide['slide_title']); ?>
                                    </h1>

                                      <p class="mb-8 max-w-2xl text-lg text-gray-200 md:text-xl">
                                        <?php echo esc_html($slide['slide_description']); ?>
                                    </p>

                                    <?php if (!empty($slide['slide_button_text'])): ?>

                                            <a href="<?php echo esc_url($slide['slide_button_link']['url']); ?>"
                                               class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-sm font-semibold text-gray-900 transition hover:-translate-y-1 hover:bg-gray-100">

                                                <?php echo esc_html($slide['slide_button_text']); ?>

                                            </a>

                                    <?php endif; ?>

                                </div>

                            </div>

                    <?php endforeach; ?>

                </div>

                <!-- Navigation -->
                <!-- <div class="swiper-button-next text-white"></div> -->
                <!-- <div class="swiper-button-prev text-white"></div> -->

                <!-- Pagination -->
                <!-- <div class="swiper-pagination"></div> -->

            </section>

            <?php
    }
}