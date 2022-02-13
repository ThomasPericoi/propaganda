<?php if (get_theme_mod('pt_benefits_displayed', true)) : ?>
    <!-- Benefits -->
    <section id="hp-benefits">
        <div class="container">
            <div class="heading-wrapper heading-<?php echo get_theme_mod('pt_benefits_heading_color', false) ? 'primary' : 'secondary'; ?> align-<?php echo get_theme_mod('pt_benefits_heading_alignment', 'left'); ?>">
                <h2><?php echo get_theme_mod('pt_benefits_heading_title', "Ценности"); ?></h2>
                <h3><?php echo get_theme_mod('pt_benefits_heading_subtitle', "во что ты веришь?"); ?></h3>
            </div>
            <div class="card-grid benefits-grid">
                <div class="grid-item benefit">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_1_icon', 'rocket'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_1_icon', 'rocket')); ?> icon" class="undraggable">
                    </div>
                    <h4><?php echo get_theme_mod('pt_benefits_content_1_title', "Скажи нам"); ?></h4>
                    <p><?php echo get_theme_mod('pt_benefits_content_1_subtitle', "Почему ты лучший"); ?></p>
                </div>
                <div class="grid-item benefit">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_2_icon', 'rocket'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_2_icon', 'rocket')); ?> icon" class="undraggable">
                    </div>
                    <h4><?php echo get_theme_mod('pt_benefits_content_2_title', "Скажи нам"); ?></h4>
                    <p><?php echo get_theme_mod('pt_benefits_content_2_subtitle', "Почему ты лучший"); ?></p>
                </div>
                <div class="grid-item benefit">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_3_icon', 'rocket'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_3_icon', 'rocket')); ?> icon" class="undraggable">
                    </div>
                    <h4><?php echo get_theme_mod('pt_benefits_content_3_title', "Скажи нам"); ?></h4>
                    <p><?php echo get_theme_mod('pt_benefits_content_3_subtitle', "Почему ты лучший"); ?></p>
                </div>
                <div class="grid-item benefit">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_4_icon', 'rocket'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_4_icon', 'rocket')); ?> icon" class="undraggable">
                    </div>
                    <h4><?php echo get_theme_mod('pt_benefits_content_4_title', "Скажи нам"); ?></h4>
                    <p><?php echo get_theme_mod('pt_benefits_content_4_subtitle', "Почему ты лучший"); ?></p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>