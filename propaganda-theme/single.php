<?php get_header(); ?>

<article class="post background-<?php echo get_theme_mod('pt_single_post_background_color', true) ? 'primary' : 'secondary'; ?>">
    <div class="container">
        <div class="inner-article inner-<?php echo get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary'; ?>">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <header>
                        <?php
                        $cat = get_the_category();
                        $cat_name = $cat[0]->cat_name;
                        $cat_link = get_category_link($cat[0]->cat_ID);
                        ?>
                        <?php if ($cat) : ?>
                            <a href="<?php echo $cat_link; ?>" class="category color-<?php echo get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary'; ?>"><?php echo $cat_name; ?></a>
                        <?php else : ?>
                            <span class="category color-<?php echo get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary'; ?>"><?php echo get_post_type(); ?></span>
                        <?php endif; ?>
                        <h1><?php the_title(); ?></h1>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <?php get_template_part('templates/share', null, array(
                            'url' => get_permalink(),
                            'color' => get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary',
                        )); ?>
                    </header>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
        <div class="inner-outro">
            <?php get_template_part('templates/outro', null, array(
                'title' => get_theme_mod('pt_single_post_outro_title', "Вы должны увидеть это"),
                'color' => get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary',
                'btn_link' => get_theme_mod('pt_single_post_button_link', "#"),
                'btn_label' => get_theme_mod('pt_single_post_button_label', "я куда-то веду"),
            )); ?>
        </div>
        <?php
        $related = get_posts(array(
            'category__in' => wp_get_post_categories($post->ID),
            'numberposts' => 3,
            'post__not_in' => array($post->ID)
        ));
        if ($related && get_theme_mod('pt_single_post_related', true)) : ?>
            <div class="inner-related">
                <h2 class="related-title">
                    <?php echo get_theme_mod('pt_single_post_related_title', 'Related Posts'); ?>
                </h2>
                <div class="post-grid grid-<?php echo get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary'; ?> blog-list">
                    <?php
                    foreach ($related as $post) {
                        setup_postdata($post); ?>
                        <?php get_template_part('templates/post-single', null, array()); ?>
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>

<?php get_footer(); ?>