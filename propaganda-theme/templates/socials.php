<!-- Socials -->
<div class="socials">
    <?php $socials_links = [
        "appstore" => "fab fa-app-store-ios",
        "behance" => "fab fa-behance",
        "codepen" => "fab fa-codepen",
        "discord" => "fab fa-discord",
        "dribbble" => "fab fa-dribbble",
        "facebook" => "fab fa-facebook-f",
        "github" => "fab fa-github",
        "instagram" => "fab fa-instagram",
        "linkedin" => "fab fa-linkedin-in",
        "mail" => "fas fa-envelope",
        "medium" => "fab fa-medium-m",
        "patreon" => "fab fa-patreon",
        "phone" => "fas fa-phone-alt",
        "pinterest" => "fab fa-pinterest-p",
        "reddit" => "fab fa-reddit-alien",
        "skype" => "fab fa-skype",
        "soundcloud" => "fab fa-soundcloud",
        "spotify" => "fab fa-spotify",
        "stackOverflow" => "fab fa-stack-overflow",
        "twitch" => "fab fa-twitch",
        "twitter" => "fab fa-twitter",
        "youtube" => "fab fa-youtube"
    ];
    foreach ($socials_links as $key => $value) { ?>
        <?php if (get_theme_mod('pt_socials_' . $key, ($key == 'linkedin') ? 'https://www.linkedin.com/in/thomas-pericoi/' : '')) : ?>
            <a href="<?php echo get_theme_mod('pt_socials_' . $key, ($key == 'linkedin') ? 'https://www.linkedin.com/in/thomas-pericoi/' : ''); ?>" rel="external" target="_blank" class="btn-icon <?php echo $args['classes']; ?> social">
                <i class="<?php echo $value; ?>"></i></i>
            </a>
        <?php endif; ?>
    <?php } ?>
</div>