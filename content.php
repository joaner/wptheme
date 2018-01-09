<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
	    <?php
			/* translators: %s: Name of current post */
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
	        	'after' => '</div>',
	    		'link_before' => '<span>',
				'link_after'  => '</span>',
	    		'pagelink' => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
	    		'separator' => '<span class="screen-reader-text">, </span>',
	    	) );
	    ?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
	    <?php // twentyfifteen_entry_meta(); ?>
	    <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
