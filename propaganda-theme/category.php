<?php get_header(); ?>

<?php $cat = get_the_category(); ?>

<?php get_template_part('templates/intro', null, array(
    'title' => $cat[0]->cat_name,
    'text' => $cat[0]->category_description,
)); ?>

<div id="blog-content">
    <div class="container">
        <?php
        $the_query = new WP_Query(array(
            'cat' => $cat[0]->term_id
        ));
        if ($the_query->have_posts()) : ?>
            <div class="post-grid grid-<?php echo get_theme_mod('pt_archive_post_general_color', true) ? 'primary' : 'secondary'; ?> blog-list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php get_template_part('templates/post-single', null, array()); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php echo __('No news from the world.', 'propaganda'); ?></p>
        <?php endif; ?>
        <div class="inner-cta">
            <?php get_template_part('templates/outro', null, array(
                'illustration' => get_theme_mod('pt_archive_post_illustration_outro_displayed', false) ? get_theme_mod('pt_archive_post_illustration_outro', "tetris-cube") : false,
                'title' => get_theme_mod('pt_archive_post_outro_title', "Check this out!"),
                'color' => get_theme_mod('pt_archive_post_general_color', false) ? 'primary' : 'secondary',
                'btn_link' => get_theme_mod('pt_archive_post_button_link', "#"),
                'btn_label' => get_theme_mod('pt_archive_post_button_label', "I lead somewhere"),
            )); ?>
        </div>
    </div>
</div>

<?php get_template_part('templates/marquee', null, array(
    'color' => get_theme_mod('pt_archive_post_general_color', false) ? 'primary' : 'secondary',
    'text' => get_theme_mod('pt_marquee_content', "Срочно - немедленно свяжитесь с вашим руководителем"),
)); ?>

<?php get_footer(); ?>