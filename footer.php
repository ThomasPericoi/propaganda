</main>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="col-3-inner">
            <div class="col">
                <h3 class="h6-size"><?php echo get_theme_mod('pt_footer_title_1', "What a title!") ?></h3>
                <?php wp_nav_menu(array('menu_class' => 'list list-' . (get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'), 'theme_location' => 'footer-menu-1', 'depth' => 1)); ?>
            </div>
            <div class="col">
                <h3 class="h6-size"><?php echo get_theme_mod('pt_footer_title_2', "What a title!") ?></h3>
                <?php wp_nav_menu(array('menu_class' => 'list list-' . (get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'), 'theme_location' => 'footer-menu-2', 'depth' => 1)); ?>
            </div>
            <div class="col">
                <h3 class="h6-size"><?php echo get_theme_mod('pt_footer_title_3', "What a title!") ?></h3>
                <?php wp_nav_menu(array('menu_class' => 'list list-' . (get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'), 'theme_location' => 'footer-menu-3', 'depth' => 1)); ?>
            </div>
        </div>
        <div id="footer-footer">
            <div id="copyrights">
                © <span id="year"><?php echo date('Y'); ?></span>, <a href="<?php bloginfo('url') ?>" class="naked-link"><?php bloginfo('name') ?></a>
            </div>
            <?php get_template_part('templates/socials', null, array(
                'classes' => 'btn-3d btn-3d-' .  (get_theme_mod('pt_footer_general_color', false) ? 'primary' : 'secondary'),
            )); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>