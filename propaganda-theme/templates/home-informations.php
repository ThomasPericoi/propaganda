<?php if (get_theme_mod('pt_informations_displayed', true)) : ?>
    <!-- Informations -->
    <section id="hp-informations">
        <div class="container">
            <div class="inner-wrapper background-<?php echo get_theme_mod('pt_informations_block_color', false) ? 'primary' : 'secondary'; ?> offset-background-<?php echo get_theme_mod('pt_informations_offset_color', false) ? 'primary' : 'secondary'; ?>">
                <div class="heading-wrapper align-<?php echo get_theme_mod('pt_informations_heading_alignment', 'center'); ?>">
                    <h2><?php echo get_theme_mod('pt_informations_heading_title', "Interesting"); ?></h2>
                    <h3><?php echo get_theme_mod('pt_informations_heading_subtitle', "What a title!"); ?></h3>
                </div>
                <div class="chapeau">
                    <?php if (get_theme_mod('pt_informations_profile_picture')) : ?>
                        <div class="profile-picture" data-tooltip="<?php echo get_theme_mod('pt_informations_profile_tooltip', "Handsome!"); ?>">
                            <img class="undraggable" src="<?php echo get_theme_mod('pt_informations_profile_picture'); ?>" alt="Picture of <?php bloginfo('name'); ?>">
                        </div>
                    <?php endif; ?>
                    <p><?php echo get_theme_mod('pt_informations_description', "Alan Mathison Turing was an English mathematician, computer scientist, logician, cryptanalyst, philosopher, and theoretical biologist. Turing was highly influential in the development of theoretical computer science, providing a formalisation of the concepts of algorithm and computation with the Turing machine, which can be considered a model of a general-purpose computer. Turing is widely considered to be the father of theoretical computer science and artificial intelligence."); ?></p>
                </div>
                <?php if (get_theme_mod('pt_informations_lists_displayed', false)) : ?>
                    <div class="col-2-inner">
                        <div class="col">
                            <h4 class="h3-size"><?php echo get_theme_mod('pt_informations_col_1_title', "What a title!"); ?></h4>
                            <ul class="list list-<?php echo !get_theme_mod('pt_informations_block_color', false) ? 'primary' : 'secondary'; ?>">
                                <?php $items = get_theme_mod('pt_informations_col_1_grid_item', 1);
                                for ($count = 1; $count <= $items; $count++) { ?>
                                    <li>
                                        <a href="<?php echo get_theme_mod('pt_informations_col_1_content_' . $count . '_link', ''); ?>" rel="external" target="_blank" class="naked-link">
                                            <?php echo get_theme_mod('pt_informations_col_1_content_' . $count . '_text', '<b>1931 - 1934 | Master Degree</b> King\'s College of Cambridge'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col">
                            <h4 class="h3-size"><?php echo get_theme_mod('pt_informations_col_2_title', "What a title!"); ?></h4>
                            <ul class="list list-<?php echo !get_theme_mod('pt_informations_block_color', false) ? 'primary' : 'secondary'; ?>">
                                <?php $items = get_theme_mod('pt_informations_col_2_grid_item', 1);
                                for ($count = 1; $count <= $items; $count++) { ?>
                                    <li>
                                        <a href="<?php echo get_theme_mod('pt_informations_col_2_content_' . $count . '_link', ''); ?>" rel="external" target="_blank" class="naked-link">
                                            <?php echo get_theme_mod('pt_informations_col_2_content_' . $count . '_text', '<b>1931 - 1934 | Master Degree</b> King\'s College of Cambridge'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>