<!-- Socials -->
<div class="socials">
    <?php $socials_links = [
        "behance" => "fab fa-behance",
        "discord" => "fab fa-discord",
        "dribbble" => "fab fa-dribbble",
        "facebook" => "fab fa-facebook-f",
        "github" => "fab fa-github",
        "linkedin" => "fab fa-linkedin-in",
        "mail" => "fas fa-envelope",
        "medium" => "fab fa-medium-m",
        "phone" => "fas fa-phone-alt",
        "reddit" => "fab fa-reddit-alien",
        "soundcloud" => "fab fa-soundcloud",
        "spotify" => "fab fa-spotify",
        "stackOverflow" => "fab fa-stack-overflow",
        "twitch" => "fab fa-twitch",
        "twitter" => "fab fa-twitter",
        "youtube" => "fab fa-youtube"
    ];
    foreach ($socials_links as $key => $value) { ?>
        <?php if (get_theme_mod('pt_socials_' . $key, '')) : ?>
            <a href="<?php echo get_theme_mod('pt_socials_' . $key, '') ?>" rel="external" target="_blank" class="btn-icon <?php echo $args['classes']; ?> social">
                <i class="<?php echo $value; ?>"></i></i>
            </a>
        <?php endif; ?>
    <?php } ?>
</div>