<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php if (get_theme_mod('pt_page_transition_enabled', true)) : ?>
        <?php get_template_part('templates/page-transition'); ?>
    <?php endif; ?>

    <!-- Header -->
    <header class="header <?php echo (get_theme_mod('pt_header_position', false)) ? 'fixed' : '' ?>">
        <div class="container">
            <div class="inner-header">
                <?php if (get_theme_mod('pt_header_logo_is_html', true)) : ?>
                    <a href="<?php bloginfo('url') ?>" class="sitename h3-size naked-link logo-<?php echo get_theme_mod('pt_header_general_color', false) ? 'primary' : 'secondary'; ?>"><?php echo get_theme_mod('pt_header_logo_html', 'Propaganda <span>Theme</span>'); ?></a>
                <?php else : ?>
                    <a href="<?php bloginfo('url') ?>"><img class="undraggable" src="<?php echo get_theme_mod('pt_header_logo'); ?>" style="width:<?php echo get_theme_mod('pt_header_logo_width', '200'); ?>px;" alt="<?php bloginfo('name') ?> Logo"></a>
                <?php endif; ?>
                <div id="top-menu">
                    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'depth' => 1)); ?>
                    <a href="<?php echo get_theme_mod('pt_header_button_link', '#') ?>" class="btn btn-<?php echo get_theme_mod('pt_header_general_color', false) ? 'primary' : 'secondary'; ?>" <?php if (get_theme_mod('pt_header_button_external')) : ?> rel="external" target="_blank" <?php endif; ?>><?php echo get_theme_mod('pt_header_button_label', 'Click me!') ?></a>
                </div>
                <button class="btn btn-<?php echo get_theme_mod('pt_header_general_color', false) ? 'primary' : 'secondary'; ?> clickToReveal">Menu</button>
            </div>
        </div>
        <div id="top-menu-xs" class="toBeRevealed">
            <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
        </div>
    </header>

    <main id="#top">