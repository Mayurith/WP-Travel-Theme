<?php

if (!defined('ABSPATH')) {
    exit;
}

class WPT_Tour_Grid_Widget extends \Elementor\Widget_Base
{

    /**
     * Widget Name
     */
    public function get_name()
    {

        return 'wpt-tour-grid';

    }

    /**
     * Widget Title
     */
    public function get_title()
    {

        return __('WPT Tour Grid', 'custom-tour-theme');

    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {

        return 'eicon-posts-grid';

    }

    /**
     * Widget Category
     */
    public function get_categories()
    {

        return ['wpt-category'];

    }

    /**
     * Widget Keywords
     */
    public function get_keywords()
    {

        return ['tour', 'travel', 'destination', 'grid'];

    }

    /**
     * Register Controls
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Tour Settings', 'custom-tour-theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Tours Count', 'custom-tour-theme'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_control(
            'show_price',
            [
                'label' => __('Show Price', 'custom-tour-theme'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'custom-tour-theme'),
                'label_off' => __('Hide', 'custom-tour-theme'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render Widget
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $tour_query = new WP_Query([

            'post_type' => 'tour',

            'posts_per_page' => $settings['posts_per_page'],

            'post_status' => 'publish',

        ]);

        if ($tour_query->have_posts()):
            ?>

            <section class="py-20">

                <div class="mx-auto max-w-7xl px-4 lg:px-8">

                    <div class="mb-12">

                        <h2 class="text-4xl font-bold text-gray-900">

                            Featured Tours

                        </h2>

                    </div>

                    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

                        <?php
                        while ($tour_query->have_posts()):

                            $tour_query->the_post();

                            $price = get_post_meta(
                                get_the_ID(),
                                'tour_price',
                                true
                            );

                            ?>

                            <article
                                class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                                <!-- Thumbnail -->
                                <div class="relative h-72 overflow-hidden">

                                    <?php if (has_post_thumbnail()): ?>

                                        <?php the_post_thumbnail(
                                            'large',
                                            [
                                                'class' => 'h-full w-full object-cover transition duration-500 hover:scale-110'
                                            ]
                                        ); ?>

                                    <?php endif; ?>

                                </div>

                                <!-- Content -->
                                <div class="p-6">

                                    <h3 class="mb-3 text-2xl font-bold text-gray-900">

                                        <a href="<?php the_permalink(); ?>">

                                            <?php the_title(); ?>

                                        </a>

                                    </h3>

                                    <div class="mb-5 text-sm leading-7 text-gray-600">

                                        <?php echo wp_trim_words(
                                            get_the_excerpt(),
                                            18
                                        ); ?>

                                    </div>

                                    <!-- Footer -->
                                    <div class="flex items-center justify-between">

                                        <?php if (
                                            'yes' === $settings['show_price']
                                            && !empty($price)
                                        ): ?>

                                            <div class="text-xl font-bold text-blue-600">

                                                $
                                                <?php echo esc_html($price); ?>

                                            </div>

                                        <?php endif; ?>

                                        <a href="<?php the_permalink(); ?>"
                                            class="rounded-full bg-gray-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-600">

                                            View Tour

                                        </a>

                                    </div>

                                </div>

                            </article>

                            <?php

                        endwhile;

                        wp_reset_postdata();

                        ?>

                    </div>

                </div>

            </section>

            <?php

        else:

            ?>

            <p>

                <?php esc_html_e(
                    'No tours found.',
                    'custom-tour-theme'
                ); ?>

            </p>

            <?php

        endif;

    }

}