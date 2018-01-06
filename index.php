<?php
get_header();
?>

<br/>

<?php
if ( have_posts() ) {
    if ( is_single() || is_page() ) {
        the_post();

        get_template_part( 'post', 'none' );
    } else {
        get_template_part( 'posts', 'none' );
    }
} else {
    get_template_part( 'content', 'none' );
}

get_footer();
