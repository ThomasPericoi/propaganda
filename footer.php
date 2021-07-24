</main>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="col-3-inner">
            <div class="col">
                <h3 class="h6-size"><?php echo get_theme_mod('pt_footer_title_1', "What a title!") ?></h3>
                <?php wp_nav_menu(array('menu_class' => 'list list-' . (get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'), 'theme_location' => 'footer-menu-1')); ?>
            </div>
            <div class="col">
                <h3 class="h6-size"><?php echo get_theme_mod('pt_footer_title_2', "What a title!") ?></h3>
                <?php wp_nav_menu(array('menu_class' => 'list list-' . (get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'), 'theme_location' => 'footer-menu-2')); ?>
            </div>
            <div class="col">
                <h3 class="h6-size"><?php echo get_theme_mod('pt_footer_title_3', "What a title!") ?></h3>
                <?php wp_nav_menu(array('menu_class' => 'list list-' . (get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'), 'theme_location' => 'footer-menu-3')); ?>
            </div>
        </div>
        <div id="footer-footer">
            <div id="copyrights">
                © <span id="year"><?php echo date('Y'); ?></span>, <a href="<?php bloginfo('url') ?>" class="naked-link"><?php bloginfo('name') ?></a>
            </div>
            <div class="socials">
                <a href="mailto:thomaspericoi@gmail.com" class="btn-icon btn-3d btn-3d-<?php echo get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'; ?> social">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="tel:+33646258543" class="btn-icon btn-3d btn-3d-<?php echo get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'; ?> social">
                    <i class="fas fa-phone"></i>
                </a>
                <a href="https://www.linkedin.com/in/thomas-pericoi/" rel="external" target="_blank" class="btn-icon btn-3d btn-3d-<?php echo get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'; ?> social">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://github.com/ThomasPericoi" rel="external" target="_blank" class="btn-icon btn-3d btn-3d-<?php echo get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'; ?> social">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://soundcloud.com/le_goupil" rel="external" target="_blank" class="btn-icon btn-3d btn-3d-<?php echo get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'; ?> social">
                    <i class="fab fa-soundcloud"></i></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>