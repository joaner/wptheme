<div class="mdl-grid posts">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--10-col-phone">
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
            <div class="mdl-card__actions">
                <span class="mdl-color-text--grey-400"><?php echo the_date(); ?></span>
            </div>
        </a>
    </div>
    <?php endwhile; ?>
</div>
<footer class="mdl-grid mdl-grid--no-spacing mdl-color--indigo footer-section">
    <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-phone mdl-typography--text-left">
        <?php if ($pager = get_previous_posts_link()): ?>
        <?php echo str_replace('<a ', '<a class="mdl-navigation__link mdl-color-text--white mdl-color--indigo" ', $pager); ?>
        <?php endif; ?>
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-phone mdl-typography--text-right">
        <?php if ($pager = get_next_posts_link()): ?>
        <?php echo str_replace('<a ', '<a class="mdl-navigation__link mdl-color-text--white mdl-color--indigo" ', $pager); ?>
        <?php endif; ?>
    </div>
</footer>
</div>
