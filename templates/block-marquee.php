<!-- Marquee -->
<div id="marquee" class="background-<?php echo get_theme_mod('pt_marquee_general_color', false) ? 'primary' : 'secondary'; ?> <?php echo !get_theme_mod('pt_marquee_content_uppercase', false) ?: 'uppercase'; ?>">
    <span><?php echo get_theme_mod('pt_marquee_content', "Here is some message!") ?></span>
</div>