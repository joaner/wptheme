<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset">
        <?php if ( is_home() && ! is_front_page() ) : ?>
        	  <header>
        	    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        	  </header>
        	<?php endif; ?>

      <article>
        <?php
        the_content();
        ?>
        <div class="mdl-grid" style="justify-content: space-between;">
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
      <hr/>
      <footer>
        <nav class="clearfix">
            <?php if ($pager_post = get_adjacent_post()): ?>
              <a href="<?php echo get_permalink( $pager_post->ID ); ?>" class="mdl-button mdl-js-button mdl-button--raised">
                <i class="material-icons">chevron_left</i>
                <?php echo get_the_title( $pager_post->ID ); ?>
              </a>
            <?php endif; ?>
            <?php if ($pager_post = get_next_post()): ?>
              <a href="<?php echo get_permalink( $pager_post->ID ); ?>" style="float: right;" class="mdl-button mdl-js-button mdl-button--raised">
                <?php echo get_the_title( $pager_post->ID ); ?>
                <i class="material-icons">chevron_right</i>
              </a>
            <?php endif; ?>
        </nav>
        <?php comments_template(); ?>
      </footer>
    </div>
  </div>