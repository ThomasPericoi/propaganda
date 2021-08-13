<!-- Hero -->
<section id="hp-hero" class="hero hero-big">
    <?php get_template_part('assets/patterns/' .  get_theme_mod('pt_hero_background', 'fish-scales'), null, array(
        'animated' => get_theme_mod('pt_hero_background_animation', false),
        'animation-duration' => get_theme_mod('pt_hero_background_duration', '60'),
        'transform-origin' => get_theme_mod('pt_hero_background_origin', 'center'),
    )); ?>
    <div class="container">
        <div class="align-<?php echo get_theme_mod('pt_hero_alignment', 'center') ?>">
            <h1><span><?php echo get_theme_mod('pt_hero_title', 'Hello there!') ?></span></h1>
            <p class="h3-size"><?php echo get_theme_mod('pt_hero_subtitle', 'Let me explain why I\'m the best') ?></p>
            <?php if (get_theme_mod('pt_hero_button', true) || get_theme_mod('pt_hero_button_2', true)) : ?>
                <div class="button-wrapper align-<?php echo get_theme_mod('pt_hero_alignment', 'center') ?>">
                    <?php if (get_theme_mod('pt_hero_button_1', true)) : ?>
                        <a href="<?php echo get_theme_mod('pt_hero_button_link_1', '#') ?>" class="btn btn-white" <?php if (get_theme_mod('pt_hero_button_external_1', false)) : ?> rel="external" target="_blank" <?php endif; ?>><?php echo get_theme_mod('pt_hero_button_label_1', 'I lead somewhere') ?></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('pt_hero_button_2', true)) : ?>
                        <a href="<?php echo get_theme_mod('pt_hero_button_link_2', '#') ?>" class="btn btn-<?php echo get_theme_mod('pt_hero_button_color_2', false) ? 'primary' : 'secondary'; ?>" <?php if (get_theme_mod('pt_hero_button_external_2', false)) : ?> rel="external" target="_blank" <?php endif; ?>><?php echo get_theme_mod('pt_hero_button_label_2', 'Click me!') ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php get_template_part('templates/socials', null, array(
                'classes' => '',
            )); ?>
        </div>
    </div>
</section>