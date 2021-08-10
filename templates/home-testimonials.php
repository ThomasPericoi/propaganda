<!-- Testimonials -->
<section id="hp-testimonials">
    <div class="container">
        <div class="heading-wrapper heading-<?php echo get_theme_mod('pt_testimonials_general_color', false) ? 'primary' : 'secondary'; ?> align-<?php echo get_theme_mod('pt_testimonials_heading_alignment', 'center') ?>">
            <h2><?php echo get_theme_mod('pt_testimonials_heading_title', "Interesting") ?></h2>
            <h3><?php echo get_theme_mod('pt_testimonials_heading_subtitle', "What a title!") ?></h3>
        </div>
        <div class="swiper-slider testimonials testimonials-<?php echo get_theme_mod('pt_testimonials_general_color', false) ? 'primary' : 'secondary'; ?>">
            <?php
            $the_query = new WP_Query(array('post_type' => 'testimonial', 'posts_per_page' => get_theme_mod('pt_testimonials_items', "12")));
            if ($the_query->have_posts()) :
            ?>
                <div class="swiper-wrapper">
                    <?php while ($the_query->have_posts()) : $the_query->the_post();
                        $position = get_post_meta(get_the_ID(), 'testimonial_position', true);
                        $profile_link = get_post_meta(get_the_ID(), 'testimonial_url', true); ?>
                        <div class="swiper-slide">
                            <a href="<?php echo $profile_link ?>" rel="external" target="_blank" class="testimonial">
                                <div class="profile-picture">
                                    <img class="undraggable" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                                </div>
                                <div class="content">
                                    <?php the_content(); ?>
                                    <span class="author"><b><?php the_title(); ?></b> - <?php echo $position ?></span>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
                <div class="swiper-pagination"></div>
            <?php else : ?>
                <div class="align-center">
                    <p><?php echo __('No testimonial to be found yet...', 'propaganda'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>