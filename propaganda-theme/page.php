<?php get_header(); ?>

<article class="background-<?php echo get_theme_mod('pt_single_page_background_color', true) ? 'primary' : 'secondary'; ?>">
    <div class="container">
        <div class="inner-article">
            <?php if (have_posts()) : while (have_posts()) : the_post();
                    $subtitle = get_post_meta(get_the_ID(), 'page_subtitle', true); ?>
                    <header>
                        <h1 class="category color-<?php echo get_theme_mod('pt_single_page_elements_color', true) ? 'primary' : 'secondary'; ?>"><?php echo $subtitle ? $subtitle : "Page"; ?></h1>
                        <h2 class="h1-size"><?php the_title(); ?></h2>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
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
    </div>
</article>

<?php get_footer(); ?>