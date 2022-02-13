<?php if (get_theme_mod('pt_clients_displayed', true)) : ?>
    <!-- Clients -->
    <section id="hp-clients">
        <div class="container">
            <div class="heading-wrapper heading-<?php echo get_theme_mod('pt_clients_general_color', false) ? 'primary' : 'secondary'; ?> align-<?php echo get_theme_mod('pt_clients_heading_alignment', 'left'); ?>">
                <h2><?php echo get_theme_mod('pt_clients_heading_title', "Клиенты"); ?></h2>
                <h3><?php echo get_theme_mod('pt_clients_heading_subtitle', "На кого ты работаешь?!"); ?></h3>
            </div>
            <?php
            $the_query = new WP_Query(array(
                'post_type' => 'client',
                'order' => 'DESC',
                'posts_per_page' => get_theme_mod('pt_clients_items', 12),
            ));
            if ($the_query->have_posts()) :
            ?>
                <div class="logo-grid grid-<?php echo get_theme_mod('pt_clients_general_color', false) ? 'primary' : 'secondary'; ?> clients-grid">
                    <?php while ($the_query->have_posts()) : $the_query->the_post();
                        $url = get_post_meta(get_the_ID(), 'client_url', true);
                        $domains = get_post_meta(get_the_ID(), 'client_domains', true); ?>
                        <div class="grid-item client">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="logo" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                            <div class="info">
                                <?php
                                if ($domains) :
                                ?>
                                    <div class="domains">
                                        <?php
                                        foreach ($domains as $field) { ?>
                                            <div class="domain" data-tooltip="<?php echo $field['domainLabel']; ?>">
                                                <i class="<?php echo $field['domainIcon']; ?>"></i>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <h3 class="name"><?php the_title(); ?></h3>
                                <div class="links">
                                    <a href="<?php the_permalink(); ?>" class="btn-icon link">
                                        <i class="fas fa-info"></i>
                                    </a>
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
                    <p><?php echo __('Нет клиента... Время поискать!', 'propaganda'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>