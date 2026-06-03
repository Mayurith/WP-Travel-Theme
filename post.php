<div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
    
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part(
            'template-parts/post/card'
        ); ?>

    <?php endwhile; ?>

</div>