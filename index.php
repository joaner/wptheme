<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
    <?php if (is_single() || is_page()): the_post();?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <header class="page-header">
        <h1>
          <?php single_post_title(); ?>
        </h1>
      </header>
      <article>
        <?php
        the_content();
        ?>
      </article>
      <hr/>
      <footer>
        <nav>
          <ul class="pager">
            <?php if ($pager_post = get_adjacent_post()): ?>
            <li class="previous">
              <a href="<?php echo get_permalink( $pager_post->ID ); ?>">
                <span aria-hidden="true">&larr;</span>
                <?php echo get_the_title( $pager_post->ID ); ?>
              </a>
            </li>
            <?php endif; ?>
            <?php if ($pager_post = get_next_post()): ?>
            <li class="next">
              <a href="<?php echo get_permalink( $pager_post->ID ); ?>">
                <?php echo get_the_title( $pager_post->ID ); ?>
                <span aria-hidden="true">&rarr;</span>
              </a>
            </li>
            <?php endif; ?>
          <ul>
        </nav>
      </footer>
    </div>
  </div>
    <?php else: ?>
  <br/>
  <div class="row">
    <div class="col-md-7 col-md-offset-1">
      <div class="list-group">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
         the_title( sprintf( '<a href="%s" class="list-group-item" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );

			// End the loop.
			endwhile;
      ?>
      </div>
      <nav>
        <ul class="pager">
          <?php if ($pager = get_previous_posts_link()): ?>
          <li class="previous">
            <?php echo $pager; ?>
          </li>
          <?php endif; ?>
          <?php if ($pager = get_next_posts_link()): ?>
          <li class="next"><?php echo $pager; ?></li>
          <?php endif; ?>
        <ul>
      </nav>
    </div>

    <div class="col-md-3">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
  <?php endif; ?>

    <?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

<?php get_footer(); ?>
