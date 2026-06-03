<?php

/*
|--------------------------------------------------------------------------
| Dynamic Footer Loader
|--------------------------------------------------------------------------
*/

if ( is_page_template( 'templates/landing-page.php' ) ) {

    get_template_part(
        'template-parts/footers/footer',
        'minimal'
    );

} else {

    get_template_part(
        'template-parts/footers/footer',
        'default'
    );

}

wp_footer();

?>

</body>
</html>