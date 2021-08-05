<?php get_header(); ?>

<article class="background-<?php echo get_theme_mod('pt_single_post_background_color', false) ? 'primary' : 'secondary'; ?>">
    <div class="container">
        <div class="inner-article">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <header>
                        <?php
                        $cat = get_the_category();
                        $cat_name = $cat[0]->cat_name;
                        $cat_link = get_category_link($cat[0]->cat_ID);
                        ?>
                        <a href="<?php echo $cat_link; ?>" class="category color-<?php echo get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary'; ?>"><?php echo $cat_name; ?></a>
                        <h1><?php the_title(); ?></h1>
                        <div class="featured-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php get_template_part('templates/share', null, array(
                            'url' => 'https://stackoverflow.com/questions/10713542/how-to-make-a-custom-linkedin-share-button',
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
        <div class="inner-cta">
            <h3 class="align-center"><?php echo get_theme_mod('pt_single_post_cta_title', "Check this out!") ?></h3>
            <div class="button-wrapper">
                <a href="<?php echo get_theme_mod('pt_single_post_button_link', "#") ?>" class="btn btn-<?php echo get_theme_mod('pt_single_post_elements_color', true) ? 'primary' : 'secondary'; ?>"><?php echo get_theme_mod('pt_single_post_button_label', "I lead somewhere") ?></a>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>