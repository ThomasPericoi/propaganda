<!-- Hero -->
<section id="error-404-hero" class="hero hero-<?php echo get_theme_mod('pt_404_general_color', true) ? 'primary' : 'secondary'; ?>">
    <div class="container">
        <div class="align-center">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo get_theme_mod('pt_404_icon', 'whistle'); ?>.svg" class="undraggable">
            </div>
            <h1><span><?php echo get_theme_mod('pt_404_title', "404!"); ?></span></h1>
            <p class="h3-size"><?php echo get_theme_mod('pt_404_subtitle', "ты потерялся"); ?></p>
            <div class="button-wrapper align-center">
                <a href="/" class="btn btn-black"><?php echo get_theme_mod('pt_404_button_label', "я веду на главную"); ?></a>
            </div>
        </div>
    </div>
</section>