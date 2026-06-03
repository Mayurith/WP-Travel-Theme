<?php

get_header();

?>

<main id="primary" class="mt-[-76px] site-main">

    <?php

    while ( have_posts() ) :

        the_post();

        the_content();

    endwhile;

    ?>

</main>

<?php

get_footer();

?>