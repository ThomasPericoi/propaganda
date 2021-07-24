<!-- Informations -->
<section id="hp-informations">
    <div class="container">
        <div class="inner-wrapper background-<?php echo get_theme_mod('pt_informations_block_color', false) ? 'primary' : 'secondary'; ?> offset-background-<?php echo get_theme_mod('pt_informations_offset_color', false) ? 'primary' : 'secondary'; ?>">
            <div class="heading-wrapper align-<?php echo get_theme_mod('pt_informations_heading_alignment', 'center') ?>">
                <h2><?php echo get_theme_mod('pt_informations_heading_title', "Interesting") ?></h2>
                <h3><?php echo get_theme_mod('pt_informations_heading_subtitle', "What a title!") ?></h3>
            </div>
            <div class="chapeau">
                <?php if (get_theme_mod('pt_informations_profile_picture')) : ?>
                    <div class="profile-picture" data-tooltip="<?php echo get_theme_mod('pt_informations_profile_tooltip', "Handsome!") ?>">
                        <img class="undraggable" src="<?php echo get_theme_mod('pt_informations_profile_picture'); ?>" alt="Picture of <?php bloginfo('name') ?>">
                    </div>
                <?php endif; ?>
                <p><?php echo get_theme_mod('pt_informations_description', "Alan Mathison Turing was an English mathematician, computer scientist, logician, cryptanalyst, philosopher, and theoretical biologist. Turing was highly influential in the development of theoretical computer science, providing a formalisation of the concepts of algorithm and computation with the Turing machine, which can be considered a model of a general-purpose computer. Turing is widely considered to be the father of theoretical computer science and artificial intelligence.") ?></p>
            </div>
            <div class="col-2-inner">
                <div class="col">
                    <h4 class="h3-size"><?php echo get_theme_mod('pt_informations_col_1_title', "What a title!") ?></h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_informations_block_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>
                            <a href="https://www.iim.fr/cursus/mastere-strategie-e-business/" rel="external" target="_blank" class="naked-link">
                                <b><span class="xs-hidden">2018-2020 | </span>Master Degree</b> Institut de
                                l'Internet et du Multimédia (FR)
                            </a>
                        </li>
                        <li>
                            <a href="https://www.laurea.fi/en/degree_programmes/business-management-and-information-technology/business-information-technology/" rel="external" target="_blank" class="naked-link">
                                <b><span class="xs-hidden">2018 | </span>Exchange Degree</b> Laurea University
                                of Applied Sciences (FI)
                            </a>
                        </li>
                        <li>
                            <a href="https://www.iim.fr/cursus/bachelor-developpement-web/" rel="external" target="_blank" class="naked-link">
                                <b><span class="xs-hidden">2015-2018 | </span>Bachelor Degree</b> Institut de
                                l'Internet et du Multimédia (FR)
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <h4 class="h3-size"><?php echo get_theme_mod('pt_informations_col_2_title', "What a title!") ?></h4>
                    <ul class="list list-<?php echo !get_theme_mod('pt_informations_block_color', false) ? 'primary' : 'secondary'; ?>">
                        <li>
                            <b><span class="xs-hidden">Now | </span>Web Freelancer</b>
                        </li>
                        <li>
                            <a href="https://www.lineup7.fr/" rel="external" target="_blank" class="naked-link">
                                <b><span class="xs-hidden">2019-2020 | </span>Project Manager</b> LineUP 7
                                (FR)
                            </a>
                        </li>
                        <li>
                            <a href="https://dpdk.com/" rel="external" target="_blank" class="naked-link">
                                <b><span class="xs-hidden">2019 | </span>Front-end Developer</b> DPDK (NL)
                            </a>
                        </li>
                        <li>
                            <a href="https://knr.paris/" rel="external" target="_blank" class="naked-link">
                                <b><span class="xs-hidden">2018 | </span>Front-end Developer</b> Kaam and
                                Roffler (FR)
                            </a>
                        </li>
                        <li>
                            <a href="http://www.comptoirgourmet.com/fr" rel="external" target="_blank" class="naked-link">
                                <b><span class="xs-hidden">2016 | </span>Webmaster / Front-end Developer</b> Le
                                Comptoir Gourmet (FR)
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>