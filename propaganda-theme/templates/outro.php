<div class="outro">
    <?php if ($args['illustration']) : ?>
        <div class="illustration">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/illustrations/<?php echo $args['illustration']; ?>.svg" alt="<?php echo str_replace("-", " ", $args['illustration']); ?> icon" class="undraggable">
        </div>
    <?php endif; ?>
    <h3 class="align-center"><?php echo $args['title']; ?></h3>
    <div class="button-wrapper">
        <a href="<?php echo $args['btn_link']; ?>" class="btn btn-<?php echo $args['color']; ?>"><?php echo $args['btn_label']; ?></a>
    </div>
</div>