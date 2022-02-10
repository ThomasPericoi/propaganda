<?php if (get_theme_mod('pt_notification_displayed', true)) : ?>
    <!-- Notifications -->
    <section id="hp-notification" class="notification">
        <div class="container">
            <div class="inner-wrapper background-<?php echo get_theme_mod('pt_notification_background_color', false) ? 'primary' : 'secondary'; ?>">
                <h3><?php echo get_theme_mod('pt_notification_content', "I'd really like you to see this!"); ?></h3>
                <a href="<?php echo get_theme_mod('pt_notification_button_link', '#'); ?>" class="btn btn-<?php echo get_theme_mod('pt_notification_button_color', true) ? 'primary' : 'secondary'; ?>" <?php if (get_theme_mod('pt_notification_button_external', false)) : ?> rel="external" target="_blank" <?php endif; ?>><?php echo get_theme_mod('pt_notification_button_label', 'Click me!'); ?></a>
            </div>
        </div>
    </section>
<?php endif; ?>