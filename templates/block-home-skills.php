<!-- Skills -->
<section id="hp-skills" class="<?php if (!get_theme_mod('pt_skills_expanded', false)) : ?>toggleActivated<?php endif; ?>">
    <div class="container">
        <div class="heading-wrapper heading-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?> align-<?php echo get_theme_mod('pt_skills_heading_alignment', 'left') ?>">
            <h2><?php echo get_theme_mod('pt_skills_heading_title', "Interesting") ?></h2>
            <h3><?php echo get_theme_mod('pt_skills_heading_subtitle', "What a title!") ?></h3>
        </div>
        <div class="card-grid card-grid-framed card-grid-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?> skills-grid">
            <div class="grid-item skill">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/puzzle.svg" class="undraggable" alt="">
                </div>
                <h4>Front-end developement</h4>
            </div>
            <div class="grid-item skill">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/cloud-loop.svg" class="undraggable" alt="">
                </div>
                <h4>Webmastering</h4>
            </div>
            <div class="grid-item skill">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/flag-mountain.svg" class="undraggable" alt="">
                </div>
                <h4>Project management</h4>
            </div>
            <div class="grid-item skill">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/infography.svg" class="undraggable" alt="">
                </div>
                <h4>Digital strategy</h4>
            </div>
            <div class="grid-item skill toBeRevealed" data-pill="New">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/diploma.svg" class="undraggable" alt="">
                </div>
                <h4>Teaching</h4>
            </div>
            <div class="grid-item skill toBeRevealed">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-wordpress.svg" class="undraggable" alt="">
                </div>
                <h4>Wordpress development</h4>
            </div>
            <div class="grid-item skill toBeRevealed">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/palette.svg" class="undraggable" alt="">
                </div>
                <h4>Graphical design</h4>
            </div>
            <div class="grid-item skill toBeRevealed">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/seo.svg" class="undraggable" alt="">
                </div>
                <h4>SEO / SEA</h4>
            </div>
            <div class="grid-item skill disabled toBeRevealed" data-pill="Soon">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/writing.svg" class="undraggable" alt="">
                </div>
                <h4>Content writing</h4>
            </div>
            <div class="grid-item skill toBeRevealed">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/music-album.svg" class="undraggable" alt="">
                </div>
                <h4>Music composing</h4>
            </div>
            <div class="grid-item skill toBeRevealed">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/camera.svg" class="undraggable" alt="">
                </div>
                <h4>Photography</h4>
            </div>
            <div class="grid-item skill toBeRevealed">
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/origami.svg" class="undraggable" alt="">
                </div>
                <h4>Not a Replicant</h4>
            </div>
        </div>

        <div id="extra-skills" class="toBeRevealed">
            <div class="heading-wrapper align-<?php echo get_theme_mod('pt_skills_heading_alignment', 'left') ?>">
                <h3><?php echo get_theme_mod('pt_skills_subsection_subtitle', "What a title!") ?></h3>
            </div>
            <div class="col-2">
                <div class="col">
                    <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">IT Languages</h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>HTML</li>
                        <li>CSS / SASS</li>
                        <li>Javascript</li>
                        <li>PHP</li>
                    </ul>
                    <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">Frameworks</h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>React.js</li>
                        <li>jQuery</li>
                        <li>Bootstrap</li>
                    </ul>
                    <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">CMS</h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>Wordpress</li>
                        <li>WooCommerce</li>
                    </ul>
                    <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">Softwares</h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>Adobe Photoshop</li>
                        <li>Adobe Illustrator</li>
                        <li>Adobe Lightroom</li>
                        <li>Adobe XD</li>
                        <li>Logic Pro X</li>
                        <li>MagicaVoxel</li>
                    </ul>
                </div>
                <div class="col">
                    <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">Version Control</h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>Git</li>
                    </ul>
                    <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">Tools</h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>Google Analytics <small data-tooltip="Google Analytics Certification">Certified</small></li>
                        <li>Google Adwords <small data-tooltip="Google Adwords Certification">Certified</small>
                        </li>
                        <li>Google Tag Manager</li>
                        <li>Google Data Studio</li>
                        <li>Google Search Console</li>
                        <li>AB Tasty</li>
                        <li>Trello, Asana, Jira, etc.</li>
                    </ul>
                    <h4 class="color-<?php echo get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">(Real) Languages</h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>French</li>
                        <li>English <small data-tooltip="TOEFL">Certified</small></li>
                        <li class="disabled">Dutch <small>Learning</small></li>
                    </ul>
                    <?php if (get_theme_mod('pt_skills_cf_displayed', false)) : ?>
                        <?php $shortcodeSkills = "[contact-form-7 id=\"" . get_theme_mod('pt_skills_cf_shortcode', "1") . "\" html_class=\"form-" . (get_theme_mod('pt_skills_general_color', false) ? 'primary' : 'secondary') . "\"]";
                        echo do_shortcode($shortcodeSkills); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <button class="h3-size naked-btn clickToReveal">
            <?php echo get_theme_mod('pt_skills_button_label', "Interesting") ?>
        </button>
    </div>
</section>