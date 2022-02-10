<?php if (get_theme_mod('pt_marquee_displayed', true)) : ?>
    <!-- Marquee -->
    <div id="marquee" class="background-<?php echo $args['color']; ?> <?php echo !get_theme_mod('pt_marquee_content_uppercase', false) ?: 'uppercase'; ?>">
        <span><?php echo $args['text']; ?></span>
    </div>
<?php endif; ?>