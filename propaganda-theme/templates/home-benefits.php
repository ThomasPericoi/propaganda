<!-- Benefits -->
<section id="hp-benefits">
    <div class="container">
        <div class="heading-wrapper heading-<?php echo get_theme_mod('pt_benefits_heading_color', false) ? 'primary' : 'secondary'; ?> align-<?php echo get_theme_mod('pt_benefits_heading_alignment', 'left'); ?>">
            <h2><?php echo get_theme_mod('pt_benefits_heading_title', "Interesting"); ?></h2>
            <h3><?php echo get_theme_mod('pt_benefits_heading_subtitle', "What a title!"); ?></h3>
        </div>
        <div class="card-grid benefits-grid">
            <div class="grid-item benefit">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_1_icon', 'hot-air-balloon'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_1_icon', 'hot-air-balloon')); ?> icon" class="undraggable">
                </div>
                <h4><?php echo get_theme_mod('pt_benefits_content_1_title', "Wow"); ?></h4>
                <p><?php echo get_theme_mod('pt_benefits_content_1_subtitle', "Why I'm the best"); ?></p>
            </div>
            <div class="grid-item benefit">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_2_icon', 'hot-air-balloon'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_2_icon', 'hot-air-balloon')); ?> icon" class="undraggable">
                </div>
                <h4><?php echo get_theme_mod('pt_benefits_content_2_title', "Wow"); ?></h4>
                <p><?php echo get_theme_mod('pt_benefits_content_2_subtitle', "Why I'm the best"); ?></p>
            </div>
            <div class="grid-item benefit">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_3_icon', 'hot-air-balloon'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_3_icon', 'hot-air-balloon')); ?> icon" class="undraggable">
                </div>
                <h4><?php echo get_theme_mod('pt_benefits_content_3_title', "Wow"); ?></h4>
                <p><?php echo get_theme_mod('pt_benefits_content_3_subtitle', "Why I'm the best"); ?></p>
            </div>
            <div class="grid-item benefit">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_benefits_content_4_icon', 'hot-air-balloon'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_benefits_content_4_icon', 'hot-air-balloon')); ?> icon" class="undraggable">
                </div>
                <h4><?php echo get_theme_mod('pt_benefits_content_4_title', "Wow"); ?></h4>
                <p><?php echo get_theme_mod('pt_benefits_content_4_subtitle', "Why I'm the best"); ?></p>
            </div>
        </div>
    </div>
</section>