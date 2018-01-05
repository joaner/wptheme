<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
    <?php if (is_single() || is_page()): the_post();?>
	  <?php if ( is_home() && ! is_front_page() ) : ?>
	  <header>
	    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
	  </header>
	<?php endif; ?>
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset">
      <article>
        <?php
        the_content();
        ?>
        <br/>
        <div class="mdl-grid mdl-grid--no-spacing" style="justify-content: space-between;">
          <div class="mdl-cell--middle">
            <time datetime="<?php the_time('Y-m-d H:i:s'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
          </div>
          <?php $categories = get_the_category();
          if ($categories): ?>
          <div class="mdl-cell--middle categorys">
            <?php foreach ($categories as $category): ?>
            <a href="<?php echo get_category_link( $category->term_id ); ?>" rel="category" class="mdl-chip">
              <span class="mdl-chip__text">Basic Chip</span>
            </a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </article>
      <footer>
        <hr/>
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
        <?php comments_template(); ?>
      </footer>
    </div>
	<div class="col-md-3 hidden-xs">
		<div class="post-nav">
		</div>
	</div>
  </div>
    <?php else: ?>
  <br/>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="list-group">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
      ?>

        <a href="<?php echo esc_url( get_permalink() ); ?>" class="list-group-item" rel="bookmark">
          <?php the_title(); ?>

          <span class="pull-right text-muted"><?php echo date('m-d', strtotime($post->post_date)); ?></span>
        </a>
      <?php
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
    <?php
    /*
    <div class="col-md-3">
      <?php get_sidebar(); ?>
    </div>
    */
    ?>
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
