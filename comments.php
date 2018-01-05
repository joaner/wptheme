<?php if (!empty($comments)): ?>
<ul class="mdl-list comments">
    <?php foreach ($comments as $comment): ?>
    <li class="mdl-list__item mdl-list__item--three-line" id="comment-<?php comment_ID() ?>">
        <span class="mdl-list__item-primary-content">
            <?php echo get_avatar($comment, 40, '', '', array('class' => 'mdl-list__item-avatar')); ?>
            <span class="mdl-typography--body-1">
                <?php echo get_comment_author_link(); ?>
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="mdl-color-text--grey-400">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf(
                            __('%1$s at %2$s'),
                            get_comment_date(),
                            get_comment_time()
                        );
                    ?>
                </a>
            </span>
            <p class="mdl-list__item-text-body">
                <?php echo get_comment_text($comment); ?>
            </p>
        </span>
        <?php
            /* FIXME reply link does not show
        <span class="mdl-list__item-secondary-content">
            <a class="mdl-list__item-secondary-action" href="<?php
                echo htmlspecialchars( get_comment_reply_link( array(), $comment, $post ) );
                ?>"><i class="material-icons">reply</i></a>
        </span>
            */
        ?>
      </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>