<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--10-col mdl-cell--1-offset-desktop">
        <?php if ( is_home() && ! is_front_page() ) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
        <?php endif; ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content(); ?>

            <?php
            // post content include <!--nextpage--> to toggle this
            $linkPagesHtml = wp_link_pages( array(
            	'before'      => '<div class="mdl-grid" style="justify-content: space-between;">',
            	'after'       => '</div>',
            	'separator'   => '',
            	'next_or_number' => 'next',
            	'previouspagelink' => '<i class="material-icons">chevron_left</i>',
            	'nextpagelink'  => '<i class="material-icons">chevron_right</i>',
                'echo'        => false,
            ) );

            if ($linkPagesHtml) {
                echo str_replace('<a ', '<a class="mdl-js-button mdl-button--fab" ', $linkPagesHtml);
                echo '<br/>';
            }

            ?>
            <div class="mdl-grid" style="justify-content: space-between;">
                <div class="mdl-cell--middle">
                    <time datetime="<?php the_time('Y-m-d H:i:s'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
                </div>
                <div class="mdl-cell--middle">
                    <?php
                    $tags = get_the_tags();
                    if (!empty($tags)):
                    ?>
                        <span class="tags">
                            <?php foreach ($tags as $tag): ?>
                                <a href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag" class="mdl-chip">
                                    <span class="mdl-chip__text"><?php echo $tag->name; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </span>
                    <?php endif; ?>
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)):
                    ?>
                    <span class="categorys">
                        <?php foreach ($categories as $category): ?>
                        <a href="<?php echo get_category_link( $category->term_id ); ?>" rel="category" class="mdl-chip">
                            <span class="mdl-chip__text"><?php echo $category->name; ?></span>
                        </a>
                        <?php endforeach; ?>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
        </article>
		<footer>
        	<?php comments_template(); ?>
		</footer>
    </div>
</div>
<footer class="mdl-grid mdl-grid--no-spacing mdl-color--indigo footer-section">
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-typography--text-left">
        <?php if ($pager_post = get_adjacent_post()): ?>
        <a href="<?php echo get_permalink( $pager_post->ID ); ?>"
           class="mdl-navigation__link mdl-color-text--white mdl-color--indigo">
            <i class="material-icons">chevron_left</i>
            <span><?php echo get_the_title( $pager_post->ID ); ?></span>
        </a>
        <?php endif; ?>
    </div>
    <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-typography--text-right">
        <?php if ($pager_post = get_next_post()): ?>
        <a href="<?php echo get_permalink( $pager_post->ID ); ?>"
           class="mdl-navigation__link mdl-color-text--white mdl-color--indigo">
            <span><?php echo get_the_title( $pager_post->ID ); ?></span>
            <i class="material-icons">chevron_right</i>
        </a>
        <?php endif; ?>
    </div>
</footer>
