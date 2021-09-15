<?php get_header(); ?>

<?php $cat = get_the_category(); ?>

<?php get_template_part('templates/intro', null, array(
    'title' => $cat[0]->cat_name,
    'text' => $cat[0]->category_description,
)); ?>

<div id="blog-content">
    <div class="container">
        <?php
        $the_query = new WP_Query(array('cat' => $cat[0]->term_id));
        if ($the_query->have_posts()) : ?>
            <div class="post-grid grid-<?php echo get_theme_mod('pt_archive_post_general_color', true) ? 'primary' : 'secondary'; ?> blog-list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="grid-item post naked-link">
                        <div class="background" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>');">
                        </div>
                        <div class="info">
                            <span class="category"><?php $cat = get_the_category();
                                                    echo $cat[0]->cat_name; ?></span>
                            <h3 class="h4-size"><?php the_title(); ?></h3>
                            <p class="excerpt">
                                <?php echo get_the_excerpt(); ?>
                            </p>
                            <span class="link">View more</span>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php echo __('No news from the world.', 'propaganda'); ?></p>
        <?php endif; ?>
        <div class="inner-cta">
            <?php get_template_part('templates/outro', null, array(
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
    'text' => get_theme_mod('pt_marquee_content', "Here is some message!"),
)); ?>

<?php get_footer(); ?>