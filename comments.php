<?php

if (post_password_required())
    return;
?>

<div id="comments" class="inner-comments">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php echo __('Comment(s)', 'propaganda'); ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 0,
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php echo __('Comment navigation', 'propaganda'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'propaganda')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'propaganda')); ?></div>
            </nav>
        <?php endif; ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php echo __('Comments are sadly closed. You all couldn\'t behave.', 'propaganda'); ?></p>
        <?php endif; ?>
    <?php endif;

    $args = array(
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Your (nice) comment', 'propaganda') . '</label><br /><textarea id="comment" class="input" name="comment" rows="6" aria-required="true"></textarea></p>',
        'label_submit' => 'Send it',
        'class_submit' => 'btn btn-' . (get_theme_mod('pt_comments_general_color', false) ? 'primary' : 'secondary'),
        'class_form' => 'comments-login-form form-' . (get_theme_mod('pt_comments_general_color', false) ? 'primary' : 'secondary'),
    );
    comment_form($args); ?>
</div>