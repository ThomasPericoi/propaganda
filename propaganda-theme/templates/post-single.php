<!-- Post Single -->
<a href="<?php the_permalink(); ?>" class="grid-item post naked-link">
    <div class="background" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
    </div>
    <div class="info">
        <span class="category"><?php $cat = get_the_category();
                                echo $cat[0]->cat_name; ?></span>
        <h3 class="h4-size"><?php the_title(); ?></h3>
        <p class="excerpt">
            <?php echo get_the_excerpt(); ?>
        </p>
        <span class="link">View more</span>
    </div>
</a>