<?php
/**
 * Template Name: Blog Page
 */

get_header();
?>

<main id="primary">

    <!-- Page Banner -->
    <section class="bg-slate-900 py-24 text-white">

        <div class="mx-auto max-w-7xl px-4 lg:px-8">

            <div class="max-w-3xl">

                <span class="mb-4 block uppercase tracking-[0.3em] text-sky-400">
                    Our Blog
                </span>

                <h1 class="mb-6 text-5xl font-bold lg:text-6xl">
                    Travel Stories & Guides
                </h1>

                <p class="text-lg text-slate-300">
                    Discover travel inspiration, destination insights,
                    expert tips, and unforgettable experiences.
                </p>

            </div>

        </div>

    </section>

    <!-- Blog Section -->
    <section class="py-20">

        <div class="mx-auto max-w-7xl px-4 lg:px-8">

            <div class="grid gap-12 lg:grid-cols-12">

                <!-- Posts -->
                <div class="lg:col-span-8">

                    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                        <?php while (have_posts()):
                            the_post(); ?>

                            <?php get_template_part(
                                'template-parts/post/card'
                            ); ?>

                        <?php endwhile; ?>
                    </div>

                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-4">

                    <div class="sticky top-24 space-y-8">

                        <!-- Search -->
                        <div class="rounded-3xl bg-white p-6 shadow-sm">

                            <h3 class="mb-4 text-xl font-bold">
                                Search
                            </h3>

                            <?php get_search_form(); ?>

                        </div>

                        <!-- Categories -->
                        <div class="rounded-3xl bg-white p-6 shadow-sm">

                            <h3 class="mb-4 text-xl font-bold">
                                Categories
                            </h3>

                            <ul class="space-y-3">

                                <?php
                                wp_list_categories([
                                    'title_li' => '',
                                ]);
                                ?>

                            </ul>

                        </div>

                        <!-- Recent Posts -->
                        <div class="rounded-3xl bg-white p-6 shadow-sm">

                            <h3 class="mb-4 text-xl font-bold">
                                Recent Posts
                            </h3>

                            <ul class="space-y-4">

                                <?php
                                $recent_posts = wp_get_recent_posts([
                                    'numberposts' => 5,
                                ]);

                                foreach ($recent_posts as $post):
                                    ?>

                                    <li>

                                        <a href="<?php echo get_permalink($post['ID']); ?>" class="hover:text-sky-500">
                                            <?php echo esc_html($post['post_title']); ?>
                                        </a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>