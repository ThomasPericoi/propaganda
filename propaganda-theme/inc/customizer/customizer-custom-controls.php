<?php

// Custom Heading
class PT_Heading_Custom_Control extends WP_Customize_Control
{
    public $type = 'section_heading';
    public function enqueue()
    {
        wp_enqueue_style('customizer', get_template_directory_uri() . '/assets/css/customizer.css', array(), null, 'all');
    }
    public function render_content()
    {
?>
        <?php if (!empty($this->label)) { ?>
            <h4 class="customize-control-title pt-heading-custom-control">
                <?php echo esc_html($this->label); ?>
            </h4>
        <?php }
    }
}

// Custom Separator
class PT_Separator_Custom_Control extends WP_Customize_Control
{
    public $type = 'sub_section_separator';
    public function render_content()
    {
        ?>
        <hr style="border-top-width:2px;border-bottom-width:2px;" />
    <?php
    }
}

// Custom Notice
class PT_Notice_Custom_Control extends WP_Customize_Control
{
    public $type = 'simple_notice';
    public function render_content()
    {
        $allowed_html = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                'class' => array(),
                'target' => array(),
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'i' => array(
                'class' => array()
            ),
            'span' => array(
                'class' => array(),
            ),
            'code' => array(),
        );
    ?>
        <div class="pt-simple-notice-custom-control">
            <?php if (!empty($this->label)) { ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php } ?>
            <?php if (!empty($this->description)) { ?>
                <span class="customize-control-description"><?php echo wp_kses($this->description, $allowed_html); ?></span>
            <?php } ?>
        </div>
    <?php
    }
}

// Custom Alignment Radios
class PT_Alignment_Radios_Custom_Control extends WP_Customize_Control
{
    public $type = 'alignment_radios';
    public function enqueue()
    {
        wp_enqueue_style('customizer', get_template_directory_uri() . '/assets/css/customizer.css', array(), null, 'all');
    }
    public function render_content()
    {
    ?>
        <div class="customize-control-radio pt-alignment-custom-control">
            <?php if (!empty($this->label)) { ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php } ?>
            <?php if (!empty($this->description)) { ?>
                <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php } ?>
            <div class="radio-buttons">
                <?php foreach ($this->choices as $key => $value) { ?>
                    <label>
                        <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?> />
                        <span><?php echo esc_html($value); ?></span>
                    </label>
                <?php } ?>
            </div>
        </div>
    <?php
    }
}

// Custom Toggle Basic
class PT_Toggle_Basic_Custom_Control extends WP_Customize_Control
{
    public $type = 'toggle';
    public function enqueue()
    {
        wp_enqueue_style('customizer', get_template_directory_uri() . '/assets/css/customizer.css', array(), null, 'all');
    }
    public function render_content()
    {
    ?>
        <div class="customize-control-checkbox pt-toggle-control pt-toggle-basic-control">
            <div class="toggle">
                <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" <?php $this->link();
                                                                                                                            checked($this->value()); ?>>
                <label for="<?php echo esc_attr($this->id); ?>">
                    <span class="inner"></span>
                    <span class="switch"></span>
                </label>
            </div>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if (!empty($this->description)) { ?>
                <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php } ?>
        </div>
    <?php
    }
}

// Custom Toggle Colors
class PT_Toggle_Color_Custom_Control extends WP_Customize_Control
{
    public $type = 'toggle_colors';
    public function enqueue()
    {
        wp_enqueue_style('customizer', get_template_directory_uri() . '/assets/css/customizer.css', array(), null, 'all');
    }
    public function render_content()
    {
    ?>
        <div class="customize-control-checkbox pt-toggle-control pt-toggle-colors-control">
            <div class="toggle">
                <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" <?php $this->link();
                                                                                                                            checked($this->value()); ?>>
                <label for="<?php echo esc_attr($this->id); ?>">
                    <span class="inner"></span>
                    <span class="switch"></span>
                </label>
            </div>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if (!empty($this->description)) { ?>
                <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php } ?>
        </div>
<?php
    }
}

// Custom Background Patterns
$svg_patterns = array(
    'asanoha' => __('Asanoha'),
    'batik-pattern' => __('Batik Pattern'),
    'bells' => __('Bells'),
    'brick-wall' => __('Brick Wall'),
    'chinese-pattern' => __('Chinese Pattern'),
    'circles' => __('Circles'),
    'clovers' => __('Clovers'),
    'doodle' => __('Doodle'),
    'fish-scales' => __('Fish Scales'),
    'flowers' => __('Flowers'),
    'grid' => __('Grid'),
    'herringbone' => __('Herringbone'),
    'ichimatu' => __('Ichimatu'),
    'japanese-cubes' => __('Japanese Cubes'),
    'jigsaw' => __('Jigsaw'),
    'meandros' => __('Meandros'),
    'memphis-pattern-1' => __('Memphis Pattern 1'),
    'memphis-pattern-2' => __('Memphis Pattern 2'),
    'memphis-pattern-3' => __('Memphis Pattern 3'),
    'petals' => __('Petals'),
    'plants' => __('Plants'),
    'plus' => __('Plus'),
    'rounded-squares' => __('Rounded Squares'),
    'san-kuzushi' => __('San Kuzushi'),
    'seigaiha' => __('Seigaiha'),
    'seventies-circles' => __('Seventies Circles'),
    'snowflakes' => __('Snowflakes'),
    'waves' => __('Waves'),
    'windy-clouds' => __('Windy Clouds'),
);

// Transform Positions
$positions = array(
    'center' => __('Center'),
    'right' => __('Right'),
    'bottom' => __('Bottom'),
    'left' => __('Left'),
    'top' => __('Top'),
);

// Icons
$icons = array(
    // 123
    '3d-modeling' => __('3D Modeling'),
    '3d-printing' => __('3D Printing'),
    '4g-signal' => __('4G signal'),
    '360-degree' => __('360 degree'),
    //A
    'aces' => __('Aces'),
    'ai' => __('AI'),
    'aim-star' => __('Aim Star'),
    'airdrop-package' => __('Airdrop Package'),
    'alarm' => __('Alarm'),
    'alcool' => __('Alcool'),
    'alt' => __('ALT'),
    'ambulance' => __('Ambulance'),
    'anonymous' => __('Anonymous'),
    'anti-radiation-suit' => __('Anti-Radiation Suit'),
    'articulation' => __('Articulation'),
    'astronaut' => __('Astronaut'),
    // B
    'baby' => __('Baby'),
    'backpack' => __('Backpack'),
    'balance' => __('Balance'),
    'bank' => __('Bank'),
    'barcode' => __('Barcode'),
    'basketball' => __('Basketball'),
    'bathrobe' => __('Bathrobe'),
    'beer' => __('Beer'),
    'benefit-growth' => __('Benefit Growth'),
    'bicycle' => __('Bicycle'),
    'bicycle-velo' => __('Bicycle Velo'),
    'binary-code' => __('Binary Code'),
    'binocular' => __('Binocular'),
    'bitcoin' => __('Bitcoin'),
    'bitcoin-growth' => __('Bitcoin Growth'),
    'bloody-knife' => __('Bloody Knife'),
    'bomb' => __('Bomb'),
    'bone' => __('Bone'),
    'bookmark' => __('Bookmark'),
    'bowling' => __('Bowling'),
    'box' => __('Box'),
    'bra' => __('Bra'),
    'biefcase' => __('Briefcase'),
    'building-office' => __('Building Office'),
    'buoy' => __('Buoy'),
    'button' => __('Button'),
    'button-pause' => __('Button PAUSE'),
    'button-play' => __('Button PLAY'),
    // C
    'cable-jack' => __('Cable Jack'),
    'cable-usb' => __('Cable USB'),
    'cable-vga' => __('Cable VGA'),
    'caduceus' => __('Caduceus'),
    'cake' => __('Cake'),
    'calculator' => __('Calculator'),
    'calendar' => __('Calendar'),
    'camera' => __('Camera'),
    'cancer-ribbon' => __('Cancer Ribbon'),
    'cart' => __('Cart'),
    'cassette' => __('Cassette'),
    'cauldron' => __('Cauldron'),
    'cd' => __('CD'),
    'certification' => __('Certification'),
    'chapeau' => __('Chapeau'),
    'cheese' => __('Cheese'),
    'cherry' => __('Cherry'),
    'chess' => __('Chess'),
    'christmas-hat' => __('Christmas Hat'),
    'clap' => __('Clap'),
    'cloud-data' => __('Cloud Data'),
    'cloud-loop' => __('Cloud Loop'),
    'cocktail' => __('Cocktail'),
    'coffee-to-go' => __('Coffee to go'),
    'comedy-masks' => __('Comedy Masks'),
    'comet' => __('Comet'),
    'company' => __('Company'),
    'compass' => __('Compass'),
    'condom' => __('Condom'),
    'console' => __('Console'),
    'contact' => __('Contact'),
    'cook' => __('Cook'),
    'cookies' => __('Cookies'),
    'copy-writing' => __('Copy Writing'),
    'crane' => __('Crane'),
    'credit-card' => __('Credit Card'),
    'croissant' => __('Croissant'),
    'cucumber-mask' => __('Cucumber Mask'),
    'cyborg' => __('Cyborg'),
    // D
    'dad-bod' => __('Dad Bod'),
    'data-analytic' => __('Data Analytic'),
    'database' => __('Database'),
    'delivery-man' => __('Delivery Man'),
    'dice' => __('Dice'),
    'dinner' => __('Dinner'),
    'diploma' => __('Diploma'),
    'discount' => __('Discount'),
    'dog-robot' => __('Dog Robot'),
    'dollar-bill' => __('Dollar Bill $'),
    'download' => __('Download'),
    'drone' => __('Drone'),
    // E
    'earphones' => __('Earphones'),
    'earth' => __('Earth'),
    'easter-egg' => __('Easter Egg'),
    'ecologic-car' => __('Ecological Car'),
    'electrical-outlet' => __('Electrical Outlet'),
    'equalizer' => __('Equalizer'),
    'eraser' => __('Eraser'),
    'etcetera' => __('Etcetera'),
    'euro' => __('Euro €'),
    'eye' => __('Eye'),
    'eyebrow' => __('Eyebrow'),
    // F
    'facebook-like' => __('Facebook Like'),
    'facemask' => __('Facemask'),
    'factory' => __('Factory'),
    'fast-forward' => __('Fast Forward'),
    'fast-shipping' => __('Fast Shipping'),
    'feather' => __('Feather'),
    'file' => __('File'),
    'finder' => __('Finder'),
    'finger-print' => __('Finger Print'),
    'finger-raised' => __('Finger Raised'),
    'fishing' => __('Fishing'),
    'flag' => __('Flag'),
    'flag-moon' => __('Flag Moon'),
    'flag-mountain' => __('Flag Mountain'),
    'floppy-disk' => __('Floppy Disk'),
    'food-chain' => __('Food Chain'),
    'footstep' => __('Footstep'),
    'free' => __('Free'),
    'freighter' => __('Freighter'),
    // G
    'gear' => __('Gear'),
    'gear-network' => __('Gear Network'),
    'gift' => __('Gift'),
    'globe' => __('Globe'),
    'grades' => __('Grades'),
    'gun' => __('Gun'),
    'gym' => __('Gym'),
    // H
    'h2o' => __('H2O'),
    'hairdryer' => __('Hairdryer'),
    'hamburger' => __('Hamburger'),
    'handshake' => __('Handshake'),
    'hat' => __('Hat'),
    'hat-chef' => __('Hat Chef'),
    'heart' => __('Heart'),
    'heartbeat' => __('Heartbeat'),
    'hot-air-balloon' => __('Hot Air Balloon'),
    'human-heart' => __('Human Heart'),
    // I
    'idea' => __('Idea'),
    'infography' => __('Infography'),
    // J
    'jeans' => __('Jeans'),
    // K
    'kilogram' => __('Kilogram (kg)'),
    // L
    'lamp' => __('Lamp'),
    'layer' => __('Layer'),
    'lecturer' => __('Lecturer'),
    'lego' => __('Lego'),
    'like' => __('Like'),
    'lock' => __('Lock'),
    'logo-airbnb' => __('Logo Airbnb'),
    'logo-android' => __('Logo Android'),
    'logo-apple' => __('Logo Apple'),
    'logo-behance' => __('Logo Behance'),
    'logo-blogger' => __('Logo Blogger'),
    'logo-chrome' => __('Logo Chrome'),
    'logo-discord' => __('Logo Discord'),
    'logo-dribble' => __('Logo Dribble'),
    'logo-dropbox' => __('Logo Dropbox'),
    'logo-excel' => __('Logo Excel'),
    'logo-facebook' => __('Logo Facebook'),
    'logo-flickr' => __('Logo Flickr'),
    'logo-github' => __('Logo Github'),
    'logo-gmail' => __('Logo Gmail'),
    'logo-google-drive' => __('Logo Google Drive'),
    'logo-google-maps' => __('Logo Google Maps'),
    'logo-google-play' => __('Logo Google Play'),
    'logo-instagram' => __('Logo Instagram'),
    'logo-internet-explorer' => __('Logo Internet Explorer'),
    'logo-linkedin' => __('Logo LinkedIn'),
    'logo-medium' => __('Logo Medium'),
    'logo-myspace' => __('Logo MySpace'),
    'logo-nvidia' => __('Logo Nvidia'),
    'logo-pinterest' => __('Logo Pinterest'),
    'logo-powerpoint' => __('Logo Powerpoint'),
    'logo-reddit' => __('Logo Reddit'),
    'logo-skype' => __('Logo Skype'),
    'logo-slack' => __('Logo Slack'),
    'logo-snapchat' => __('Logo Snapchat'),
    'logo-soundcloud' => __('Logo Soundcloud'),
    'logo-spotify' => __('Logo Spotify'),
    'logo-stackoverflow' => __('Logo StackOverflow'),
    'logo-steam' => __('Logo Steam'),
    'logo-tinder' => __('Logo Tinder'),
    'logo-tumblr' => __('Logo Tumblr'),
    'logo-twitch' => __('Logo Twitch'),
    'logo-twitter' => __('Logo Twitter'),
    'logo-vimeo' => __('Logo Vimeo'),
    'logo-windows' => __('Logo Windows'),
    'logo-word' => __('Logo Word'),
    'logo-wordpress' => __('Logo Wordpress'),
    'logo-yahoo' => __('Logo Yahoo'),
    'logo-youtube' => __('Logo Youtube'),
    'london-bus' => __('London Bus'),
    // M
    'meat' => __('Meat'),
    'medal' => __('Medal'),
    'megaphone' => __('Megaphone'),
    'microphone' => __('Microphone'),
    'military-medal' => __('Military Medal'),
    'money-hand' => __('Money Hand'),
    'mouse' => __('Mouse'),
    'mouse-hardware' => __('Mouse Hardware'),
    'music-album' => __('Music Album'),
    'music-note' => __('Music Note'),
    // N
    'needle' => __('Needle'),
    'network-antenna' => __('Network Antenna'),
    'new' => __('New'),
    'newsletter' => __('Newsletter'),
    'nfc' => __('NFC'),
    'night' => __('Night'),
    'notification' => __('Notification'),
    // O
    'oil-barrel' => __('Oil Barrel'),
    'origami' => __('Origami'),
    // P
    'p2p' => __('P2P'),
    'package-delivery' => __('Package Delivery'),
    'paint-roll' => __('Paint Roll'),
    'palette' => __('Palette'),
    'pannel-arrow' => __('Pannel Arrow'),
    'pannel-shop' => __('Pannel Shop'),
    'paperplane' => __('Paperplane'),
    'password' => __('Password'),
    'pelvis' => __('Pelvis'),
    'photoshop-anchor' => __('Photoshop Anchor'),
    'picture' => __('Picture'),
    'pin' => __('Pin'),
    'pipe' => __('Pipe'),
    'pizza' => __('Pizza'),
    'plan' => __('Plan'),
    'podcast' => __('Podcast'),
    'police-medal' => __('Police Medal'),
    'potion' => __('Potion'),
    'pound' => __('Pound (lb)'),
    'pound-sterling' => __('Pound Sterling £'),
    'powerplant' => __('Powerplant'),
    'pregnancy' => __('Pregnancy'),
    'price-tag' => __('Price Tag'),
    'printer' => __('Printer'),
    'production-line' => __('Production Line'),
    'profile' => __('Profile'),
    'profile-search' => __('Profile Search'),
    'prosthetic-leg' => __('Prosthetic Leg'),
    'puzzle' => __('Puzzle'),
    // Q
    'qr-code' => __('QR Code'),
    'question' => __('Question'),
    'quote' => __('Quote'),
    // R
    'rabbit' => __('Rabbit'),
    'random' => __('Random'),
    'recycle' => __('Recycle'),
    'reindeer' => __('Reindeer'),
    'restaurant-server' => __('Restaurant Server'),
    'robot' => __('Robot'),
    'rocket' => __('Rocket'),
    'ruler' => __('Ruler'),
    // S
    'security-camera' => __('Security Camera'),
    'seo' => __('SEO'),
    'sewing-machine' => __('Sewing Machine'),
    'shopping-bag' => __('Shopping Bag'),
    'skull' => __('Skull'),
    'slip' => __('Slip'),
    'smart-car' => __('Smart Car'),
    'smiley-angry' => __('Smiley '),
    'smiley-crying' => __('Smiley Crying'),
    'smiley-happy' => __('Smiley Happy'),
    'smiley-mute' => __('Smiley Mute'),
    'smiley-sad' => __('Smiley Sad'),
    'smiley-smiling' => __('Smiley Smiling'),
    'smiley-wink' => __('Smiley Wink'),
    'snooker' => __('Snooker'),
    'snowflake' => __('Snowflake'),
    'snowman' => __('Snowman'),
    'soap' => __('Soap'),
    'sock' => __('Sock'),
    'sofa' => __('Sofa'),
    'square-tool' => __('Square Tool'),
    'space-shuttle' => __('Space Shuttle'),
    'sperm' => __('Sperm'),
    'star' => __('Star'),
    'starglasses' => __('Starglasses'),
    'street-display' => __('Street Display'),
    'submarine' => __('Submarine'),
    'sunrise' => __('Sunrise'),
    'sweatshirt' => __('Sweatshirt'),
    'swiss-knife' => __('Swiss Knife'),
    // T
    'tactile' => __('Tactile'),
    'tamagotchi' => __('Tamagotchi'),
    'target' => __('Target'),
    'tea' => __('Tea'),
    'team' => __('Team'),
    'teapot' => __('Teapot'),
    'tearing-up' => __('Tearing-up'),
    'telescope' => __('Telescope'),
    'thoughts' => __('Thoughts'),
    'tic-tac-toe' => __('Tic-Tac-Toe'),
    'tie' => __('Tie'),
    'toilet-paper' => __('Toilet Paper'),
    'train' => __('Train'),
    'trampoline' => __('Trampoline'),
    'translation' => __('Translation'),
    'trash' => __('Trash'),
    'turkey' => __('Turkey'),
    // U
    'ufo' => __('UFO'),
    'umbrella' => __('Umbrella'),
    'unicorn' => __('Unicorn'),
    // V
    'validation' => __('Validation'),
    'vegan' => __('Vegan'),
    'ventilator' => __('Ventilator'),
    'vespa' => __('Vespa'),
    'video-calling' => __('Video Calling'),
    'video-games-controller' => __('Video Games Controller'),
    'vip' => __('VIP'),
    'virus' => __('Virus'),
    'virus-digital' => __('Virus Digital'),
    'visa' => __('Visa'),
    'vote' => __('Vote'),
    'voxel' => __('Voxel'),
    // W
    'wall' => __('Wall'),
    'water' => __('Water'),
    'web' => __('Web'),
    'weed' => __('Weed'),
    'whisky' => __('Whisky'),
    'whistle' => __('Whistle'),
    'wifi' => __('WiFi'),
    'windmill' => __('Windmill'),
    'wine-glass' => __('Wine Glass'),
    'wireframe' => __('Wireframe'),
    'wireframe-video' => __('Wireframe Video'),
    'wooden-crate' => __('Wooden Crate'),
    'wreckingball' => __('Wreckingball'),
    'writing' => __('Writing'),
    'writing-machine' => __('Writing Machine'),
    // Y
    'yen' => __('Yen ¥'),
    'yin-yang' => __('Yin Yang'),
    // Z
    'zen-stones' => __('Zen Stones'),
    'zip-folder' => __('ZIP Folder'),
    'zippo' => __('Zippo'),
);
