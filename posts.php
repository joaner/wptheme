<div class="mdl-grid posts">
	  <?php
        // Start the loop.
		while ( have_posts() ) : the_post();
      ?>
      <div class="mdl-cell mdl-cell--6-col mdl-cell--10-col-phone">
        <a class="mdl-card mdl-shadow--2dp post" href="<?php echo esc_url( get_permalink() ); ?>">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
          </div>
          <div class="mdl-card__supporting-text">
            <?php echo the_excerpt(); ?>
          </div>
          <div class="mdl-card__menu">
            <button class="mdl-button mdl-button--icon mdl-js-button">
              <i class="material-icons">chevron_right</i>
            </button>
          </div>
        </a>
      </div>
      <?php
		endwhile;
      ?>
      </div>
      <footer class="mdl-grid">
        <nav class="clearfix">
          <?php if ($pager = get_previous_posts_link()): ?>
          <button class="mdl-button mdl-js-button ">
            <?php echo $pager; ?>
          </button>
          <?php endif; ?>
          <?php if ($pager = get_next_posts_link()): ?>
          <button class="mdl-button mdl-js-button " style="float: right;"><?php echo $pager; ?></button>
          <?php endif; ?>
        </nav>
      </footer>
</div>