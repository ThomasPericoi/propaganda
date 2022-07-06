<?php if (get_theme_mod('pt_logos_displayed', true)) : ?>
    <!-- Logos -->
    <section id="hp-logos">
        <div class="container">
            <div class="heading-wrapper heading-<?php echo get_theme_mod('pt_logos_general_color', false) ? 'primary' : 'secondary'; ?> align-<?php echo get_theme_mod('pt_logos_heading_alignment', 'center'); ?>">
                <h2><?php echo get_theme_mod('pt_logos_heading_title', "Логотипы"); ?></h2>
                <h3><?php echo get_theme_mod('pt_logos_heading_subtitle', "Есть доказательства?"); ?></h3>
            </div>
            <?php
            $the_query = new WP_Query(array(
                'post_type' => 'logo',
                'orderby' => 'rand',
                'posts_per_page' => get_theme_mod('pt_logos_items', 4),
            ));
            if ($the_query->have_posts()) :
            ?>
                <div class="logo-grid grid-<?php echo get_theme_mod('pt_logos_general_color', false) ? 'primary' : 'secondary'; ?> logos-grid">
                    <?php while ($the_query->have_posts()) : $the_query->the_post();
                        $url = get_post_meta(get_the_ID(), 'logo_url', true); ?>
                        <div class="grid-item client">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="logo" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                            <div class="info">
                                <h4 class="name"><?php the_title(); ?></h4>
                                <div class="links">
                                    <?php if ($url) : ?>
                                        <a href="<?php echo $url; ?>" rel="external" target="_blank" class="btn-icon link">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <div>
                    <p><?php echo __('Неа!', 'propaganda'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>