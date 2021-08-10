<?php get_header(); ?>

<article class="project background-<?php echo get_theme_mod('pt_single_project_background_color', true) ? 'primary' : 'secondary'; ?>">
    <div class="container">
        <div class="inner-article inner-<?php echo get_theme_mod('pt_single_project_elements_color', true) ? 'primary' : 'secondary'; ?>">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php
                    $url = get_post_meta(get_the_ID(), 'project_url', true);
                    $date = get_post_meta(get_the_ID(), 'project_date', true);
                    $label = get_post_meta(get_the_ID(), 'project_label', true);
                    $intro = get_post_meta(get_the_ID(), 'project_intro', true);
                    ?>
                    <header>
                        <span class="category color-<?php echo get_theme_mod('pt_single_project_elements_color', true) ? 'primary' : 'secondary'; ?>"><?php echo $date; ?></span>
                        <div class="logo">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <div class="col-2-inner">
                            <div class="col">
                                <div class="subject">
                                    <span><?php echo $label; ?></span>
                                </div>
                            </div>
                            <div class="col">
                                <a href="<?php echo $url ?>" rel="external" target="_blank" class="btn btn-<?php echo get_theme_mod('pt_single_project_elements_color', true) ? 'primary' : 'secondary'; ?>">
                                    <?php echo get_theme_mod('pt_single_project_intro_button_label', "See the result"); ?>
                                </a>
                            </div>
                        </div>
                        <p class="intro"><?php echo $intro ?></p>
                    </header>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="inner-outro">
            <?php get_template_part('templates/outro', null, array(
                'title' => get_theme_mod('pt_single_project_outro_title', "Check this out!"),
                'color' => get_theme_mod('pt_single_project_elements_color', true) ? 'primary' : 'secondary',
                'btn_link' => get_theme_mod('pt_single_project_button_link', "#"),
                'btn_label' => get_theme_mod('pt_single_project_button_label', "I lead somewhere"),
            )); ?>
        </div>
    </div>
</article>

<?php get_footer(); ?>