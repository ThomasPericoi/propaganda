<!-- Contact -->
<section id="contact" class="toggleActivated">
    <?php get_template_part('assets/patterns/' .  get_theme_mod('pt_contact_background', 'seigaiha'), null, array(
        'animated' => false,
        'animation-duration' => "0",
        'transform-origin' => 'center',
    )); ?>
    <div class="container">
        <h2 class="subtitle subtitle-<?php echo get_theme_mod('pt_contact_heading_alignment', 'center'); ?> subtitle-<?php echo get_theme_mod('pt_contact_general_color', false) ? 'primary' : 'secondary'; ?>"><?php echo get_theme_mod('pt_contact_heading_title', "Interesting"); ?></h2>
        <div class="inner-wrapper">
            <div class="col-2-inner">
                <div class="col">
                    <h3 class="h3-size"><?php echo get_theme_mod('pt_contact_heading_subtitle', "What a title!"); ?></h3>
                    <p><?php echo get_theme_mod('pt_contact_description', "Alan Mathison Turing was an English mathematician, computer scientist, logician, cryptanalyst, philosopher, and theoretical biologist. Turing was highly influential in the development of theoretical computer science, providing a formalisation of the concepts of algorithm and computation with the Turing machine, which can be considered a model of a general-purpose computer. Turing is widely considered to be the father of theoretical computer science and artificial intelligence."); ?></p>
                    <ul class="list list-<?php echo get_theme_mod('pt_contact_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li><a href="mailto:<?php echo get_theme_mod('pt_contact_email', "hello@website.com"); ?>" class="naked-link">Email:
                                <?php echo get_theme_mod('pt_contact_email', "hello@website.com"); ?></a></li>
                        <li><a href="tel:<?php echo get_theme_mod('pt_contact_phone', "118 712"); ?>" class="naked-link">Phone: <?php echo get_theme_mod('pt_contact_phone', "+33646258543"); ?></a></li>
                    </ul>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_contact_icon', 'anonymous'); ?>.svg" alt="<?php echo str_replace("-", " ", get_theme_mod('pt_contact_icon', 'anonymous')); ?> icon" class="undraggable">
                    </div>
                </div>
                <div class="col">
                    <?php $shortcodeContact = "[contact-form-7 id=\"" . get_theme_mod('pt_contact_cf_shortcode', "1") . "\" html_class=\"form-" . (get_theme_mod('pt_contact_general_color', false) ? 'primary' : 'secondary') . "\"]";
                    echo do_shortcode($shortcodeContact); ?>
                </div>
            </div>
        </div>
    </div>
</section>