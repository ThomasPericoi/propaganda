<?php if (get_theme_mod('pt_informations_displayed', true)) : ?>
    <!-- Informations -->
    <section id="hp-informations">
        <div class="container">
            <div class="inner-wrapper background-<?php echo get_theme_mod('pt_informations_block_color', true) ? 'primary' : 'secondary'; ?> offset-background-<?php echo get_theme_mod('pt_informations_offset_color', false) ? 'primary' : 'secondary'; ?>">
                <div class="heading-wrapper align-<?php echo get_theme_mod('pt_informations_heading_alignment', 'center'); ?>">
                    <h2><?php echo get_theme_mod('pt_informations_heading_title', "биография"); ?></h2>
                    <h3><?php echo get_theme_mod('pt_informations_heading_subtitle', "Кто ты?"); ?></h3>
                </div>
                <div class="chapeau">
                    <?php if (get_theme_mod('pt_informations_profile_picture')) : ?>
                        <div class="profile-picture" data-tooltip="<?php echo get_theme_mod('pt_informations_profile_tooltip', "Привет красавчик"); ?>">
                            <img class="undraggable" src="<?php echo get_theme_mod('pt_informations_profile_picture'); ?>" alt="Picture of <?php bloginfo('name'); ?>">
                        </div>
                    <?php endif; ?>
                    <p><?php echo get_theme_mod('pt_informations_description', "Алексе́й Григо́рьевич Стаха́нов (21 декабря 1905 — 5 ноября 1977) — советский шахтёр, новатор угольной промышленности, основоположник Стахановского движения, Герой Социалистического Труда (1970).<br />В 1935 году группа, состоявшая из забойщика Стаханова и двоих крепильщиков, за одну смену добыла в 14,5 раза больше угля, чем предписывалось по норме на одного забойщика. Однако советская пропаганда приписала весь добытый за смену уголь лично Стаханову. Рекордная смена была спланирована заранее, было перепроверено оборудование, организован вывоз угля, проведено освещение забоя. Достижение было использовано ВКП для кампании, известной как «стахановское движение»."); ?></p>
                </div>
                <?php if (get_theme_mod('pt_informations_lists_displayed', false)) : ?>
                    <div class="col-2-inner">
                        <div class="col">
                            <h4 class="h3-size"><?php echo get_theme_mod('pt_informations_col_1_title', "Формирование"); ?></h4>
                            <ul class="list list-<?php echo !get_theme_mod('pt_informations_block_color', true) ? 'primary' : 'secondary'; ?>">
                                <?php $items = get_theme_mod('pt_informations_col_1_grid_item', 1);
                                for ($count = 1; $count <= $items; $count++) { ?>
                                    <li>
                                        <a href="<?php echo get_theme_mod('pt_informations_col_1_content_' . $count . '_link', ''); ?>" rel="external" target="_blank" class="naked-link">
                                            <?php echo get_theme_mod('pt_informations_col_1_content_' . $count . '_text', '<b>1931 - 1934 | Степень магистра</b> Королевский колледж Кембриджа'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col">
                            <h4 class="h3-size"><?php echo get_theme_mod('pt_informations_col_2_title', "Формирование"); ?></h4>
                            <ul class="list list-<?php echo !get_theme_mod('pt_informations_block_color', true) ? 'primary' : 'secondary'; ?>">
                                <?php $items = get_theme_mod('pt_informations_col_2_grid_item', 1);
                                for ($count = 1; $count <= $items; $count++) { ?>
                                    <li>
                                        <a href="<?php echo get_theme_mod('pt_informations_col_2_content_' . $count . '_link', ''); ?>" rel="external" target="_blank" class="naked-link">
                                            <?php echo get_theme_mod('pt_informations_col_2_content_' . $count . '_text', '<b>1931 - 1934 | Степень магистра</b> Королевский колледж Кембриджа'); ?>
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