<?php get_header(); ?>

<?php get_template_part('templates/intro', null, array(
    'title' => get_theme_mod('pt_archive_post_title', "Блог"),
    'text' => get_theme_mod('pt_archive_post_subtitle', "Это твой дневник?"),
)); ?>

<div class="categories">
    <div class="container">
        <?php
        $categories = get_categories(array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ));
        foreach ($categories as $category) {
            echo '<a class="menu-item" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
        }
        ?>
    </div>
</div>

<div id="blog-content">
    <div class="container">
        <?php
        $the_query = new WP_Query(array(
            'posts_per_page' => -1
        ));
        if ($the_query->have_posts()) : ?>
            <div class="post-grid grid-<?php echo get_theme_mod('pt_archive_post_general_color', true) ? 'primary' : 'secondary'; ?> blog-list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php get_template_part('templates/post-single', null, array()); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="align-center"><?php echo __('Тишина радио', 'propaganda'); ?></p>
        <?php endif; ?>
        <div class="inner-cta">
            <?php get_template_part('templates/outro', null, array(
                'illustration' => get_theme_mod('pt_archive_post_illustration_outro_displayed', false) ? get_theme_mod('pt_archive_post_illustration_outro', "tetris-cube") : false,
                'title' => get_theme_mod('pt_archive_post_outro_title', "ты должен это увидеть"),
                'color' => get_theme_mod('pt_archive_post_general_color', false) ? 'primary' : 'secondary',
                'btn_link' => get_theme_mod('pt_archive_post_button_link', "#"),
                'btn_label' => get_theme_mod('pt_archive_post_button_label', "кликните сюда"),
            )); ?>
        </div>
    </div>
</div>

<?php get_template_part('templates/marquee', null, array(
    'color' => get_theme_mod('pt_archive_post_general_color', false) ? 'primary' : 'secondary',
    'text' => get_theme_mod('pt_marquee_content', "Срочно - немедленно свяжитесь с вашим руководителем"),
)); ?>

<?php get_footer(); ?>