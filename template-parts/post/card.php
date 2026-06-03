<article class="overflow-hidden rounded-3xl bg-white shadow-sm hover:shadow-xl transition">

    <a href="<?php the_permalink(); ?>">

        <?php the_post_thumbnail(
            'large',
            [
                'class' => 'h-72 w-full object-cover'
            ]
        ); ?>

    </a>

    <div class="p-6">

        <div class="mb-4">

            <?php
            $category = get_the_category();

            if (!empty($category)):
                ?>

                <span class="rounded-full bg-sky-100 px-4 py-2 text-sm text-sky-600">

                    <?php echo esc_html(
                        $category[0]->name
                    ); ?>

                </span>

            <?php endif; ?>

        </div>

        <h3 class="mb-4 text-2xl font-bold">

            <a href="<?php the_permalink(); ?>">

                <?php the_title(); ?>

            </a>

        </h3>

        <p class="mb-6 text-gray-600">

            <?php echo wp_trim_words(
                get_the_excerpt(),
                20
            ); ?>

        </p>

        <div class="flex items-center justify-between">

            <span class="text-sm text-gray-500">

                <?php echo get_the_date(); ?>

            </span>

            <a href="<?php the_permalink(); ?>" class="font-semibold text-sky-500">
                Read More →
            </a>

        </div>

    </div>

</article>