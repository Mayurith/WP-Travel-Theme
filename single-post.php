<?php get_header(); ?>

<!-- hero section -->
<section class="relative z-10 -mt-28 h-[850px]">
    <div class="relative h-[850px] bg-no-repeat bg-center bg-cover flex items-center justify-center"
        style="background-image: url('<?= has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_template_directory_uri() . '/assets/images/hero-bg.webp'; ?>');">
        <!-- Overlay with fade-in animation -->
        <div class="absolute inset-0 bg-darkblue/40 z-5 opacity-0 animate-fadeIn"></div>
        <div class="relative text-center z-20 w-full">
            <div class="!text-white"><?php the_category(); ?></div>
            <h2 class="!text-white font-semibold"><?php the_title(); ?></h2>
            <div class="!text-white text-md mt-4 mb-4">

                <?php $current_post_id = get_the_ID();
                $specific_post_date = get_the_date('', $current_post_id);

                ?>
                Posted on <?= $specific_post_date; ?>

            </div>
        </div>
    </div>
</section>

<!-- post content -->
<section class="min-h-screen mx-auto mt-10 lg:mt-20 px-3 sm:px-24 px-3 ">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();

            /** Get the content */
            $content = get_the_content();

            /** Remove the first <img> tag from the content */
            $content = preg_replace('/<img[^>]+>/i', '', $content, 1);
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="w-full mt-4">
                    <div class="mt-20 container mx-auto px-0">
                        <div
                            class=" flex flex-col md:flex-row items-center justify-between gap-6 border-t border-b border-gray-light py-6">
                            <!-- Author Info -->
                            <div class="flex items-center space-x-4">
                                <?php
                                // Get the author's email to retrieve their avatar
                                $author_email = get_the_author_meta('user_email');

                                // Display the author's avatar (96x96)
                                echo get_avatar($author_email, 96, '', '', ['class' => 'rounded-full']);
                                ?>
                                <div class="flex flex-col text-lg font-medium text-gray-800">
                                    <div class="text-gray-600 text-sm">Written by</div>
                                    <div>
                                        <?php
                                        echo get_the_author_firstname() . ' ' . get_the_author_lastname(); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Share Icons -->
                            <div class="flex space-x-4 text-xl text-gray-600">
                                <?php
                                $post_url = urlencode(get_permalink());
                                $post_title = urlencode(get_the_title());
                                ?>

                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank"
                                    rel="noopener noreferrer " class="hover:text-blue-600 transition">
                                    <i class="fa-brands fa-facebook-f fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                                </a>

                                <!-- Twitter/X -->
                                <a href="https://x.com/intent/post?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>"
                                    target="_blank" rel="noopener noreferrer" class="hover:text-blue-400 transition">
                                    <i class="fa-brands fa-x-twitter fa-xs rounded-sm border px-3 py-4 border-gray-200"></i>
                                </a>

                                <!-- LinkedIn -->
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>"
                                    target="_blank" rel="noopener noreferrer" class="hover:text-blue-700 transition">
                                    <i class="fa-brands fa-linkedin-in fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                                </a>

                                <!-- WhatsApp -->
                                <a href="https://wa.me/?text=<?php echo $post_title . '%20' . $post_url; ?>" target="_blank"
                                    rel="noopener noreferrer" class="hover:text-green-500 transition">
                                    <i class="fa-brands fa-whatsapp fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                                </a>

                                <!-- Instagram (note: Instagram doesn't support direct post sharing like others) -->
                                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"
                                    class="hover:text-pink-500 transition">
                                    <i class="fa-brands fa-instagram fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                                </a>

                                <!-- Email -->
                                <a href="mailto:?subject=<?php echo $post_title; ?>&body=Check out this post: <?php echo $post_url; ?>"
                                    target="_blank" rel="noopener noreferrer" class="hover:text-red-500 transition">
                                    <i class="fa-regular fa-envelope fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 prose prose-lg prose-slate !max-w-full text-justify">
                        <?= apply_filters('the_content', $content); ?>
                    </div>
                </div>

                <!-- Social Share Icons -->
                <div
                    class="container mx-auto mt-20 sm:px-24 px-3 relative justify-center flex items-center before:content-[''] before:absolute before:left-0 before:right-1/2 before:h-px 
                    before:bg-gray-300 after:content-[''] after:absolute after:right-0 after:left-1/2 after:h-px after:bg-gray-300 mt-20">
                    <?php
                    $post_url = urlencode(get_permalink());
                    $post_title = urlencode(get_the_title());
                    ?>
                    <div class="bg-white flex items-center gap-4 z-5 px-10">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank"
                            rel="noopener noreferrer " class="hover:text-blue-600 transition">
                            <i class="fa-brands fa-facebook-f fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                        </a>

                        <!-- Twitter/X -->
                        <a href="https://x.com/intent/post?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>"
                            target="_blank" rel="noopener noreferrer" class="hover:text-blue-400 transition">
                            <i class="fa-brands fa-x-twitter fa-xs rounded-sm border px-3 py-4 border-gray-200"></i>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>"
                            target="_blank" rel="noopener noreferrer" class="hover:text-blue-700 transition">
                            <i class="fa-brands fa-linkedin-in fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text=<?php echo $post_title . '%20' . $post_url; ?>" target="_blank"
                            rel="noopener noreferrer" class="hover:text-green-500 transition">
                            <i class="fa-brands fa-whatsapp fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                        </a>

                        <!-- Instagram (note: Instagram doesn't support direct post sharing like others) -->
                        <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"
                            class="hover:text-pink-500 transition">
                            <i class="fa-brands fa-instagram fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                        </a>

                        <!-- Email -->
                        <a href="mailto:?subject=<?php echo $post_title; ?>&body=Check out this post: <?php echo $post_url; ?>"
                            target="_blank" rel="noopener noreferrer" class="hover:text-red-500 transition">
                            <i class="fa-regular fa-envelope fa-xs rounded-sm border  px-3 py-4 border-gray-200"></i>
                        </a>
                    </div>
                </div>

                <footer class="container mx-auto mt-20 sm:px-24">
                    <?php
                    $tags = get_the_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="inline-block text-primary text-sm bg-secondary/10 px-3 py-1 rounded mr-2 mb-2 transition">' . esc_html($tag->name) . '</a>';
                        }
                    }
                    ?>
                    <?php //edit_post_link(); ?>
                </footer>
            </article>
            <?php
        endwhile;

        /** Next Previous post */
        ?>
        <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        ?>

        <div class="container mx-auto mt-20 px-3">
            <div
                class=" md:px-20 grid justify-between items-center text-secondary text-base font-medium gap-4 post-navigation">
                <?php if (!empty($prev_post)): ?>
                    <a href="<?= get_permalink($prev_post); ?>"
                        class="hover:text-secondary bg-secondary/10 transition hover:text-white hover:bg-secondary py-2 px-8 rounded-sm cursor-pointer w-full md:w-auto text-center"
                        title="previous post">
                        <span class="flex justify-between"><i class="fa fa-chevron-left nav-icon mr-2"></i> Previous</span>
                    </a>
                <?php else: ?>
                    <span class="w-full md:w-auto text-center">← No previous post</span>
                <?php endif; ?>

                <a href="/blog" class="cursor-pointer w-full md:w-auto flex justify-center">
                    <img src="<?= get_template_directory_uri() . '/assets/images/grip.png'; ?>" alt="">
                </a>

                <?php if (!empty($next_post)): ?>
                    <a href="<?= get_permalink($next_post); ?>"
                        class="hover:text-secondary bg-secondary/10 transition hover:text-white hover:bg-secondary py-2 px-8 rounded-sm cursor-pointer w-full md:w-auto text-center w-auto"
                        title="<?= esc_attr(get_the_title($next_post)); ?>">
                        <span class="flex justify-between">Next <i class="fa fa-chevron-right nav-icon ml-2"></i></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>


        <?php
    else:
        echo '<p>No content found</p>';
    endif;
    ?>
</section>

<!-- Related posts -->
<section class="container mx-auto mt-20 sm:px-24 px-3">
    <?php
    /** Get categories of current post */
    $categories = get_the_category();
    $cat_ids = [];

    if (!empty($categories)) {
        foreach ($categories as $cat) {
            $cat_ids[] = $cat->term_id;
        }
    }

    /** WP_Query args for random posts in same category */
    $args = [
        'posts_per_page' => 4,
        'post__not_in' => [get_the_ID()],
        'category__in' => $cat_ids,
        'orderby' => 'rand',
    ];

    $related_query = new WP_Query($args);

    if ($related_query->have_posts()):
        ?>
        <div class="mt-30 overflow-hidden">
            <h3 class="text-primary text-center font-semibold">You might also like</h3>

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-8 mt-8">
                <?php while ($related_query->have_posts()):
                    $related_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="rounded-sm group overflow-hidden">
                        <div class="relative overflow-hidden">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('post-thumbnail', [
                                    'class' => 'w-full !h-[300px] object-cover rounded mb-4 transition-transform duration-300 group-hover:scale-110'
                                ]); ?>
                                <!-- Overlay on hover -->
                                <div
                                    class="absolute inset-0 bg-darkblue/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded">
                                </div>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumbnail.png"
                                    alt="Default thumbnail"
                                    class="w-full !h-[300px] object-cover rounded mb-4 transition-transform duration-300 hover:scale-105" />
                            <?php endif; ?>
                        </div>
                        <div class="text-lg text-primary font-semibold"><?php the_title(); ?></div>
                        <p class="text-gray-600 text-sm mt-2"><?= wp_trim_words(get_the_excerpt(), 10); ?></p>
                        <button
                            class="flex items-center text-secondary bg-secondary/10 hover:text-white hover:bg-secondary py-2 px-8 mt-4 rounded-sm cursor-pointer">
                            <div class="text-sm font-medium"><span class="ml-2">Read More</span></div>
                            <div class="text-3xl flex items-center">
                                <i class="lni lni-arrow-angular-top-right text-secondary ml-2"></i>
                            </div>
                        </button>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
    endif;
    wp_reset_postdata();
    ?>
</section>

<?php get_footer(); ?>