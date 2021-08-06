<div class="container">
    <div class="col-2">

        <div class="col">
            <!-- Projects -->
            <section id="projects-preview">
                <div class="heading-wrapper heading-<?php echo $args['color']; ?> align-<?php echo get_theme_mod('pt_projects_heading_alignment', 'left') ?>">
                    <h2><?php echo get_theme_mod('pt_projects_heading_title', "Interesting") ?></h2>
                    <h3><?php echo get_theme_mod('pt_projects_heading_subtitle', "What a title!") ?></h3>
                </div>
                <?php
                $the_query = new WP_Query(array('post_type' => 'pt_project', 'posts_per_page' => get_theme_mod('pt_projects_items', "5")));
                if ($the_query->have_posts()) :
                ?>
                    <div class="row-grid grid-<?php echo $args['color']; ?> projects-list">
                        <?php while ($the_query->have_posts()) : $the_query->the_post();
                            $url = get_post_meta(get_the_ID(), 'project_url', true);
                            $label = get_post_meta(get_the_ID(), 'project_label', true);
                            $icon = get_post_meta(get_the_ID(), 'project_icon', true); ?>
                            <a href="<?php the_permalink(); ?>" class="grid-item project">
                                <div class="icon" data-tooltip="<?php echo $label; ?>">
                                    <i class="<?php echo $icon ?>"></i>
                                </div>
                                <h3 class="h5-size"><?php the_title(); ?></h3>
                                <div class="link">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </a>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <div class="button-wrapper">
                        <a href="<?php bloginfo('url') ?>/projects" class="btn btn-<?php echo $args['color']; ?>"><?php echo get_theme_mod('pt_projects_button_label', "Show me the rest!") ?></a>
                    </div>
                <?php else : ?>
                    <div>
                        <p><?php echo __('No project done apparently', 'propaganda'); ?></p>
                    </div>
                <?php endif; ?>
            </section>
        </div>

        <div class="col">
            <!-- Blog -->
            <section id="blog-preview">
                <div class="heading-wrapper heading-<?php echo $args['color']; ?> align-<?php echo get_theme_mod('pt_blog_heading_alignment', 'left') ?>">
                    <h2><?php echo get_theme_mod('pt_blog_heading_title', "Interesting") ?></h2>
                    <h3><?php echo get_theme_mod('pt_blog_heading_subtitle', "What a title!") ?></h3>
                </div>
                <?php
                $the_query = new WP_Query(array('posts_per_page' => 1));
                if ($the_query->have_posts()) : ?>
                    <div class="post-grid grid-<?php echo $args['color']; ?> blog-list">
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
                    <div class="button-wrapper">
                        <a href="<?php echo get_post_type_archive_link('post'); ?>" class="btn btn-<?php echo $args['color']; ?>"><?php echo get_theme_mod('pt_blog_button_label', "Show me the rest!") ?></a>
                    </div>
                <?php else : ?>
                    <p><?php echo __('No news from the world.', 'propaganda'); ?></p>
                <?php endif; ?>
            </section>
        </div>

    </div>
</div>