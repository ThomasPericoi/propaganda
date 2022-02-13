<!-- Contact -->
<section id="contact" class="toggleActivated">
    <?php get_template_part('assets/patterns/' .  get_theme_mod('pt_contact_background', 'ichimatu'), null, array(
        'animated' => false,
        'animation-duration' => "0",
        'transform-origin' => 'center',
    )); ?>
    <div class="container">
        <h2 class="subtitle subtitle-<?php echo get_theme_mod('pt_contact_heading_alignment', 'center'); ?> subtitle-<?php echo get_theme_mod('pt_contact_general_color', false) ? 'primary' : 'secondary'; ?>"><?php echo get_theme_mod('pt_contact_heading_title', "Interesting"); ?></h2>
        <div class="inner-wrapper">
            <div class="col-2-inner">
                <div class="col">
                    <h3 class="h3-size"><?php echo get_theme_mod('pt_contact_heading_subtitle', "свяжитесь с нами немедленно"); ?></h3>
                    <p><?php echo get_theme_mod('pt_contact_description', "Мы знаем все."); ?></p>
                    <ul class="list list-<?php echo get_theme_mod('pt_contact_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li><a href="mailto:<?php echo get_theme_mod('pt_contact_email', "привет@сайт.ru"); ?>" class="naked-link"><?php echo __('Email:', 'propaganda'); ?>
                                <?php echo get_theme_mod('pt_contact_email', "привет@сайт.ru"); ?></a></li>
                        <li><a href="tel:<?php echo get_theme_mod('pt_contact_phone', "118 712"); ?>" class="naked-link"><?php echo __('Phone:', 'propaganda'); ?> <?php echo get_theme_mod('pt_contact_phone', "118 218"); ?></a></li>
                    </ul>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_contact_icon', 'anonymous'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_contact_icon', 'anonymous')); ?> icon" class="undraggable">
                    </div>
                </div>
                <div class="col">
                    <?php $shortcodeContact = "[contact-form-7 id=\"" . get_theme_mod('pt_contact_cf_shortcode', 1) . "\" html_class=\"form-" . (get_theme_mod('pt_contact_general_color', false) ? 'primary' : 'secondary') . "\"]";
                    echo do_shortcode($shortcodeContact); ?>
                </div>
            </div>
        </div>
    </div>
</section>