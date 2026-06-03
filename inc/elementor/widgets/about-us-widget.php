<?php

/**
 * @package WP_Travel_Theme
 * @version 1.0.0
 * @description Elementor About Us Widget.
 */

if (!defined('ABSPATH')) {
    exit;
}

class WPT_About_Us_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'wpt-about-us';
    }

    public function get_title()
    {
        return esc_html__('WPT About Us', 'wptheme');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
    }

    public function get_categories()
    {
        return ['wpt-category'];
    }

    public function get_keywords()
    {
        return ['about us', 'info', 'travel', 'tour'];
    }

    protected function register_controls()
    {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'wptheme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'ABOUT US',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'We are Professional Planners For your',
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
            ]
        );

        $this->add_control(
            'phone_text',
            [
                'label' => __('Phone Text', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Speak to our Destination Experts at Direct Call',
            ]
        );

        $this->add_control(
            'phone_number',
            [
                'label' => __('Phone Number', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+1 546 378 654',
            ]
        );

        $this->end_controls_section();

        /*
        |--------------------------------------------------------------------------
        | Images
        |--------------------------------------------------------------------------
        */

        $this->start_controls_section(
            'image_section',
            [
                'label' => __('Images', 'wptheme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'main_image',
            [
                'label' => __('Main Image', 'wptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'secondary_image',
            [
                'label' => __('Secondary Image', 'wptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => __('Badge Text', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Paradise on Earth',
            ]
        );

        $this->end_controls_section();

        /*
        |--------------------------------------------------------------------------
        | Features Repeater
        |--------------------------------------------------------------------------
        */

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_text',
            [
                'label' => __('Feature', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->start_controls_section(
            'features_section',
            [
                'label' => __('Features', 'wptheme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => __('Feature List', 'wptheme'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    ['feature_text' => 'All places and activities are carefully picked by us'],
                    ['feature_text' => '98 Course Completion Rates'],
                    ['feature_text' => 'We are an award winning agency'],
                    ['feature_text' => 'Trusted by more than 80,000 customers'],
                ],
                'title_field' => '{{{ feature_text }}}',
            ]
        );

        $this->end_controls_section();

        /*
        |--------------------------------------------------------------------------
        | Button
        |--------------------------------------------------------------------------
        */

        $this->start_controls_section(
            'button_section',
            [
                'label' => __('Button', 'wptheme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'wptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Read More',
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'wptheme'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="py-24">
            <div class="mx-auto max-w-7xl px-4 lg:px-8">

                <div class="grid items-center gap-16 lg:grid-cols-2">

                    <!-- Left Images -->
                    <div class="relative">

                        <!-- Main Image -->
                        <div class="relative w-full max-w-[520px] rounded-full">

                            <img src="<?php echo esc_url($settings['main_image']['url']); ?>" alt=""
                                class="h-[600px] w-[400px] rounded-t-[220px] rounded-b-[220px] object-cover">

                            <!-- Floating Badge -->
                            <div class="absolute right-0 top-16 rounded-full bg-white px-8 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="h-8 w-8 rounded-full bg-cyan-400"></div>

                                    <span class="text-xl font-medium">
                                        <?php echo esc_html($settings['badge_text']); ?>
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- Overlapping Image -->
                        <div class="absolute -bottom-16 right-0">

                            <img src="<?php echo esc_url($settings['secondary_image']['url']); ?>" alt=""
                                class="h-[420px] w-[360px] rounded-t-[180px] rounded-b-[180px] border-[20px] border-white object-cover shadow-xl">

                        </div>

                    </div>

                    <!-- Right Content -->
                    <div>

                        <!-- Subtitle -->
                        <span class="mb-4 block text-lg uppercase tracking-[0.3em] text-cyan-400">
                            <?php echo esc_html($settings['subtitle']); ?>
                        </span>

                        <!-- Title -->
                        <h2 class="mb-8 max-w-xl text-5xl font-bold leading-tight text-slate-900 lg:text-6xl">
                            <?php echo wp_kses_post($settings['title']); ?>
                        </h2>

                        <!-- Description -->
                        <div class="mb-8 flex gap-6">

                            <div class="mt-3 h-[2px] w-16 bg-cyan-400"></div>

                            <p class="max-w-lg text-lg leading-8 text-slate-500">
                                <?php echo wp_kses_post($settings['description']); ?>
                            </p>

                        </div>

                        <!-- Phone -->
                        <p class="mb-10 text-lg font-medium text-cyan-400">

                            <?php echo esc_html($settings['phone_text']); ?>

                            <span class="font-bold">
                                <?php echo esc_html($settings['phone_number']); ?>
                            </span>

                        </p>

                        <!-- Features -->
                        <ul class="mb-12 space-y-5">

                            <?php foreach ($settings['features'] as $feature): ?>

                                <li class="flex items-center gap-4">

                                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-cyan-400 text-white">
                                        ✓
                                    </span>

                                    <span>
                                        <?php echo esc_html($feature['feature_text']); ?>
                                    </span>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                        <!-- Button -->
                        <a href="<?php echo esc_url($settings['button_link']['url']); ?>"
                            class="inline-flex items-center gap-3 rounded-sm bg-cyan-400 px-8 py-5 text-lg font-semibold text-white transition hover:bg-cyan-500">

                            <?php echo esc_html($settings['button_text']); ?>

                            <span>→</span>

                        </a>

                    </div>

                </div>

            </div>
        </section>
        <?php
    }
}