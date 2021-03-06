<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

function format_comment($comment) {
    ?>
    <li class="mdl-list__item mdl-list__item--three-line" id="comment-<?php comment_ID() ?>">
        <span class="mdl-list__item-primary-content">
            <?php echo get_avatar($comment, 40, '', '', array('class' => 'mdl-list__item-avatar')); ?>
            <span class="mdl-typography--body-1">
                <?php echo get_comment_author_link(); ?>
                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"
                   class="mdl-color-text--grey-400">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf(
                            __('%1$s at %2$s', 'material-side'),
                            get_comment_date(),
                            get_comment_time()
                        );
                    ?>
                </a>
            </span>
            <p class="mdl-list__item-text-body">
                <?php echo get_comment_text($comment); ?>
                <?php if ( $comment->comment_approved == '0' ): ?>
                    <br/>
                    <em class="comment-awaiting-moderation mdl-color-text--red"><?php _e( 'Your comment is awaiting moderation.', 'material-side' ); ?></em>
                <?php endif; ?>
            </p>
        </span>
        <?php
        $url = add_query_arg( 'replytocom', $comment->comment_ID, get_permalink( $comment->comment_post_ID ) );
        ?>
        <span class="mdl-list__item-secondary-content">
            <a class="mdl-list__item-secondary-action" href="<?php echo esc_url( $url ); ?>"><i class="material-icons">reply</i></a>
        </span>
    <?php
}

?>

<?php
// comment list
if ( have_comments() ):
?>
<ul class="mdl-list comments">
    <?php
    wp_list_comments( array(
        'type' => 'comment',
        'callback' => 'format_comment',
    ) );
    ?>
</ul>
<?php
the_comments_navigation(); ?>
<?php endif; ?>
<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'material-side' ); ?></p>
<?php
else:
?>
<?php
// submit comment form
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$tips_req = ( $req ? ' *' : '' );
$aria_req = ( $req ? " aria-required='true' " : '' );

$fields = array(
    'author' => array(
		'label' => __( 'Name', 'material-side' ) . $tips_req,
		'value' => esc_attr( $commenter['comment_author'] ),
	),
	'email' => array(
		'label' => __( 'Email', 'material-side' ) . $tips_req,
		'value' => esc_attr( $commenter['comment_author_email'] ),
	),
	'url' => array(
		'label' => __( 'Website', 'material-side' ),
		'value' => esc_attr( $commenter['comment_author_url'] ),
	),
);

foreach ($fields as $field => $labels) {
	// render each field html
	$fields[$field] = <<<html
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display: block;">
	    <input class="mdl-textfield__input" type="text"
	           id="comment-form-{$field}"
	           name="{$field}"
	           {$aria_req}
	           value="{$labels['value']}">
	    <label class="mdl-textfield__label" for="comment-form-{$field}">{$labels['label']}</label>
	</div>
html;
}

$label = __( 'Comment', 'material-side' );

$args =  array(
	'comment_field' => <<<html
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	    <textarea class="mdl-textfield__input" type="text" rows="3" name="comment" id="comment"
	              aria-required="true"></textarea>
	    <label class="mdl-textfield__label" for="comment">{$label} *</label>
	</div>
html
,
	'class_submit' => 'mdl-button mdl-js-button mdl-button--raised mdl-button--colored',
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);

comment_form($args);

endif;
?>

<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
