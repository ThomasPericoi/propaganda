<!-- Skills -->
<section id="hp-skills" class="<?php if (!get_theme_mod('pt_skills_expanded', false)) : ?>toggleActivated<?php endif; ?>">
    <div class="container">
        <div class="heading-wrapper heading-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?> align-<?php echo get_theme_mod('pt_skills_heading_alignment', 'left'); ?>">
            <h2><?php echo get_theme_mod('pt_skills_heading_title', "Interesting"); ?></h2>
            <h3><?php echo get_theme_mod('pt_skills_heading_subtitle', "What a title!"); ?></h3>
        </div>
        <div class="card-grid card-grid-framed card-grid-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?> skills-grid">
            <?php $items = get_theme_mod('pt_skills_grid_items', 8);
            for ($count = 1; $count <= $items; $count++) { ?>
                <div class="grid-item skill <?php if ($count > 4) : ?>toBeRevealed<?php endif; ?>" <?php if (get_theme_mod('pt_skills_content_' . $count . '_pill', '')) : ?>data-pill="<?php echo get_theme_mod('pt_skills_content_' . $count . '_pill', ''); ?>" <?php endif; ?>>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_skills_content_' . $count . '_icon', 'origami'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_skills_content_' . $count . '_icon', 'origami')); ?> icon" class="undraggable">
                    </div>
                    <h4><?php echo get_theme_mod('pt_skills_content_' . $count . '_title', 'Origami'); ?></h4>
                </div>
            <?php } ?>
        </div>

        <?php if (get_theme_mod('pt_skills_subsection_displayed', true)) : ?>
            <div id="extra-skills" class="toBeRevealed">
                <div class="heading-wrapper align-<?php echo get_theme_mod('pt_skills_heading_alignment', 'left'); ?>">
                    <h3><?php echo get_theme_mod('pt_skills_subsection_subtitle', "What a title!"); ?></h3>
                </div>
                <div class="col-2">
                    <div class="col">
                        <?php $items = get_theme_mod('pt_skills_subsection_col_1_grid_items', "4");
                        for ($count = 1; $count <= $items; $count++) { ?>
                            <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>"><?php echo get_theme_mod('pt_skills_subsection_col_1_items' . $count . '_list_title', 'IT Languages'); ?></h4>
                            <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                                <?php echo get_theme_mod('pt_skills_subsection_col_1_items' . $count . '_list_elements', '<li>HTML</li><li>PHP</li>'); ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <div class="col">
                        <?php $items = get_theme_mod('pt_skills_subsection_col_2_grid_items', "3");
                        for ($count = 1; $count <= $items; $count++) { ?>
                            <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>"><?php echo get_theme_mod('pt_skills_subsection_col_2_items' . $count . '_list_title', 'IT Languages'); ?></h4>
                            <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                                <?php echo get_theme_mod('pt_skills_subsection_col_2_items' . $count . '_list_elements', '<li>HTML</li><li>PHP</li>'); ?>
                            </ul>
                        <?php } ?>
                        <?php if (get_theme_mod('pt_skills_cf_displayed', false)) : ?>
                            <?php $shortcodeSkills = "[contact-form-7 id=\"" . get_theme_mod('pt_skills_cf_shortcode', 1) . "\" html_class=\"form-" . (get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary') . "\"]";
                            echo do_shortcode($shortcodeSkills); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <button class="h3-size naked-btn clickToReveal">
            <?php echo get_theme_mod('pt_skills_button_label', "Interesting"); ?>
        </button>
    </div>
</section>