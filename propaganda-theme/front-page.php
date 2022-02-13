<?php get_header(); ?>

<?php get_template_part('templates/home-hero'); ?>

<?php get_template_part('templates/home-skills'); ?>

<?php get_template_part('templates/home-informations'); ?>

<?php get_template_part('templates/home-benefits'); ?>

<?php get_template_part('templates/home-notifications'); ?>

<?php get_template_part('templates/home-clients'); ?>

<?php get_template_part('templates/home-testimonials'); ?>

<?php get_template_part('templates/projects-blog', null, array(
    'color' => get_theme_mod('pt_projects_general_color', false) ? 'primary' : 'secondary',
)); ?>

<?php get_template_part('templates/contact'); ?>

<?php get_template_part('templates/marquee', null, array(
    'color' => get_theme_mod('pt_marquee_general_color', false) ? 'primary' : 'secondary',
    'text' => get_theme_mod('pt_marquee_content', "Срочно - немедленно свяжитесь с вашим руководителем"),
)); ?>

<?php get_footer(); ?>