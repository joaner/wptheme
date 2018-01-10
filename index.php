<?php
get_header();
?>

<br/>

<?php
if ( have_posts() ) {
    if ( is_single() || is_page() ) {
        the_post();

        get_template_part( 'post' );
    } else {
        get_template_part( 'posts' );
    }
} else {
    get_template_part( 'none' );
}


get_footer();
