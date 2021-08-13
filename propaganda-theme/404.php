<?php get_header(); ?>

<?php get_template_part('templates/404-hero'); ?>

<?php get_template_part('templates/projects-blog', null, array(
    'color' => get_theme_mod('pt_404_general_color', true) ? 'primary' : 'secondary',
)); ?>

<?php get_template_part('templates/marquee', null, array(
    'color' => get_theme_mod('pt_404_general_color', true) ? 'primary' : 'secondary',
    'text' => get_theme_mod('pt_marquee_content', "Here is some message!"),
)); ?>

<?php get_footer(); ?>