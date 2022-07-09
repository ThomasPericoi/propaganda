<?php

function theme_customize_register($wp_customize)
{
    require get_template_directory() . '/admin/customizer/customizer-custom-functions.php';
    require get_template_directory() . '/admin/customizer/customizer-custom-controls.php';


    /* #0 FUNCTIONS
    --------------------------------------------------------------- */

    // Shortcut
    function shortcut($destination, $selector, $wp_customize)
    {
        $wp_customize->selective_refresh->add_partial($destination, array(
            'selector' => $selector,
        ));
    }

    // Custom Heading
    function custom_heading($id, $section, $label, $wp_customize)
    {
        $wp_customize->add_setting($id, array());

        $wp_customize->add_control(new PT_Heading_Custom_Control(
            $wp_customize,
            $id,
            array(
                'section' => $section,
                'label' => __($label, 'propaganda-customizer-instruction'),
            )
        ));
    }

    // Separator
    function separator($id, $section, $wp_customize)
    {
        $wp_customize->add_setting($id, array());

        $wp_customize->add_control(new PT_Separator_Custom_Control(
            $wp_customize,
            $id,
            array(
                'section' => $section,
            )
        ));
    }


    /* #1 COLORS
    --------------------------------------------------------------- */

    $wp_customize->add_setting('primary_color', array(
        'default' => '#c1d4ff',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'section' => 'colors',
        'settings' => 'primary_color',
        'label' => __('Primary Color', 'propaganda-customizer-instruction'),
    )));

    $wp_customize->add_setting('secondary_color', array(
        'default' => '#fc8686',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'section' => 'colors',
        'settings' => 'secondary_color',
        'label' => __('Secondary Color', 'propaganda-customizer-instruction'),
    )));


    /* #2 THEME OPTIONS
    --------------------------------------------------------------- */

    $wp_customize->add_panel(
        'pt_theme_options',
        array(
            'title' => __('Theme Options', 'propaganda-customizer-instruction'),
            'description' => __('Theme Modifications like color scheme, theme texts and layout preferences can be done here.', 'propaganda-customizer-instruction'),
        )
    );


    /* GENERAL - PAGE TRANSITION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_page_transition', array(
        'panel' => 'pt_theme_options',
        'title' => __('General - Page Transition', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the page transitions on every pages.', 'propaganda-customizer-instruction'),
    ));

    // ------------ General Options ------------
    custom_heading('pt_page_transition_heading_general', 'pt_page_transition', 'General Options', $wp_customize);

    // Enable page transitions
    $wp_customize->add_setting(
        'pt_page_transition_enabled',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_page_transition_enabled',
        array(
            'section' => 'pt_page_transition',
            'label' => __('Page transition?', 'propaganda-customizer-instruction'),
            'description' => __('Enable the page transition between every page changes.', 'propaganda-customizer-instruction'),
        )
    ));

    // Color
    $wp_customize->add_setting(
        'pt_page_transition_color',
        array(
            'default' => 'white',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(
        'pt_page_transition_color',
        array(
            'type' => 'radio',
            'section' => 'pt_page_transition',
            'label' => __('Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the page transition.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'white' => __('White', 'propaganda-customizer-instruction'),
                'primary' => __('Primary', 'propaganda-customizer-instruction'),
                'secondary' => __('Secondary', 'propaganda-customizer-instruction')
            )
        )
    );


    /* GENERAL - SOCIALS
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_socials', array(
        'panel' => 'pt_theme_options',
        'title' => __('General - Socials', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Social Icons. Leave empty if you don\'t want to display it.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_socials_behance', '#hp-hero .socials', $wp_customize);
    shortcut('pt_socials_discord', 'footer .socials', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_socials_heading_content', 'pt_socials', 'General Options', $wp_customize);

    $socials = ["appstore", "behance", "codepen", "discord", "dribbble", "facebook", "github", "instagram", "linkedin", "mail", "medium", "patreon", "pinterest", "phone", "reddit", "skype", "soundcloud", "spotify", "stackOverflow", "twitch", "twitter", "youtube"];

    foreach ($socials as $value) {
        $wp_customize->add_setting('pt_socials_' . $value, array(
            'default' => ($value == 'linkedin') ? 'https://www.linkedin.com/in/thomas-pericoi/' : '',
            'sanitize_callback' => 'pt_sanitize_textarea',
        ));

        $wp_customize->add_control(
            'pt_socials_' . $value,
            array(
                'type' => 'url',
                'section' => 'pt_socials',
                'settings' => 'pt_socials_' . $value,
                'label' => __(ucfirst($value), 'propaganda-customizer-instruction'),
            )
        );
    }


    /* GENERAL - HEADER
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_header', array(
        'panel' => 'pt_theme_options',
        'title' => __('General - Header', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Header.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_header_position', 'header .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_header_heading_general', 'pt_header', 'General Options', $wp_customize);

    // Position 
    $wp_customize->add_setting('pt_header_position', array(
        'default' => true,
        'sanitize_callback' => 'pt_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'pt_header_position',
        array(
            'type' => 'checkbox',
            'section' => 'pt_header',
            'settings' => 'pt_header_position',
            'label' => __('Is the Header fixed?', 'propaganda-customizer-instruction'),
            'description' => __('Yes if the checkbox is checked.', 'propaganda-customizer-instruction'),
        )
    );

    // Color
    $wp_customize->add_setting(
        'pt_header_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_header_general_color',
        array(
            'section' => 'pt_header',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the logo and the button in the Header.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Logo Options ------------
    custom_heading('pt_header_heading_logo', 'pt_header', 'Logo Options', $wp_customize);

    // Logo Upload
    $wp_customize->add_setting('pt_header_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'pt_header_logo',
        array(
            'section' => 'pt_header',
            'settings' => 'pt_header_logo',
            'label' => __('Upload Logo', 'propaganda-customizer-instruction'),
            'description' => __('Logo for the website, in the Header and the Footer.', 'propaganda-customizer-instruction'),
            'button_labels' => array(
                'select' => __('Select Logo', 'propaganda-customizer-instruction'),
                'remove' => __('Remove Logo', 'propaganda-customizer-instruction'),
                'change' => __('Change Logo', 'propaganda-customizer-instruction'),
            ),
        )
    ));

    // Logo Width
    $wp_customize->add_setting('pt_header_logo_width', array(
        'default' => 250,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_header_logo_width',
        array(
            'type' => 'number',
            'section' => 'pt_header',
            'settings' => 'pt_header_logo_width',
            'label' => __('Width of the logo', 'propaganda-customizer-instruction'),
            'description' => __('Width (in pixels) of the image logo in the Header.', 'propaganda-customizer-instruction'),
        )
    );

    // Logo HTML or Image
    $wp_customize->add_setting(
        'pt_header_logo_is_html',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_header_logo_is_html',
        array(
            'section' => 'pt_header',
            'label' => __('Do you want the logo in HTML?', 'propaganda-customizer-instruction'),
            'description' => __('Enable the logo in HTML and hide the logo image.', 'propaganda-customizer-instruction'),
        )
    ));

    // Logo HTML
    $wp_customize->add_setting('pt_header_logo_html', array(
        'default' => 'пропаганда <span>шаблоны</span>',
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_header_logo_html',
        array(
            'type' => 'textarea',
            'section' => 'pt_header',
            'settings' => 'pt_header_logo_html',
            'label' => __('Logo HTML', 'propaganda-customizer-instruction'),
            'description' => __('Write whatever you want. Put the characters you want highlighted bewteen &lt;span&gt;&lt;/span&gt;.', 'propaganda-customizer-instruction'),
        )
    );


    // ------------ Menu Options ------------
    custom_heading('pt_header_heading_menu', 'pt_header', 'Menu Options', $wp_customize);

    // Notice
    $wp_customize->add_setting('pt_header_menu', array());

    $wp_customize->add_control(new PT_Notice_Custom_Control(
        $wp_customize,
        'pt_header_menu',
        array(
            'section' => 'pt_header',
            'description' => __('You can change the menu <a href="?autofocus[panel]=nav_menus">here</a>.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Button Options ------------
    custom_heading('pt_header_heading_button', 'pt_header', 'Button Options', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_header_button_label', array(
        'default' => 'Нажми на меня!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_header_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_header',
            'settings' => 'pt_header_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button in the Header.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_header_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_header_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_header',
            'settings' => 'pt_header_button_link',
            'label' => __('Button Link', 'propaganda-customizer-instruction'),
            'description' => __('Link for the button in the Header', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link External
    $wp_customize->add_setting('pt_header_button_external', array(
        'default' => false,
        'sanitize_callback' => 'pt_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'pt_header_button_external',
        array(
            'type' => 'checkbox',
            'section' => 'pt_header',
            'settings' => 'pt_header_button_external',
            'label' => __('Is this button external?', 'propaganda-customizer-instruction'),
            'description' => __('Yes if the checkbox is checked.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_header_button_separator', 'pt_header', $wp_customize);

    // Mobile Button Label
    $wp_customize->add_setting('pt_header_mobile_button_label', array(
        'default' => 'Меню',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_header_mobile_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_header',
            'settings' => 'pt_header_mobile_button_label',
            'label' => __('Mobile Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button on mobile in the Header (for the menu).', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_header_button_separator_1', 'pt_header', $wp_customize);

    // Button Animation
    $wp_customize->add_setting(
        'pt_header_button_animation',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_header_button_animation',
        array(
            'section' => 'pt_header',
            'label' => __('Animate the button?', 'propaganda-customizer-instruction'),
            'description' => __('Enable the bounce animation of the button.', 'propaganda-customizer-instruction'),
        )
    ));


    /* GENERAL - FOOTER
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_footer', array(
        'panel' => 'pt_theme_options',
        'title' => __('General - Footer', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Footer.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_footer_general_color', 'footer .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_footer_heading_general', 'pt_footer', 'General Options', $wp_customize);

    // Color
    $wp_customize->add_setting(
        'pt_footer_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_footer_general_color',
        array(
            'section' => 'pt_footer',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the lists and the social buttons in the Footer.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Menu Options ------------
    custom_heading('pt_footer_heading_menu', 'pt_footer', 'Menu Options', $wp_customize);

    // Notice
    $wp_customize->add_setting('pt_footer_menu', array());

    $wp_customize->add_control(new PT_Notice_Custom_Control(
        $wp_customize,
        'pt_footer_menu',
        array(
            'section' => 'pt_footer',
            'description' => __('You can change the menus <a href="?autofocus[panel]=nav_menus">here</a>.', 'propaganda-customizer-instruction'),
        )
    ));

    // Title 1 --> 3
    for ($count = 1; $count <= 3; $count++) {

        $wp_customize->add_setting('pt_footer_title_' . $count, array(
            'default' => 'Полезные ссылки',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_footer_title_' . $count,
            array(
                'type' => 'text',
                'section' => 'pt_footer',
                'settings' => 'pt_footer_title_' . $count,
                'label' => __('Column ' . $count . ' -  Title', 'propaganda-customizer-instruction'),
                'description' => __('Title of the column ' . $count . ' in the Footer.', 'propaganda-customizer-instruction'),
            )
        );
    }


    /* GENERAL - 404
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_404', array(
        'panel' => 'pt_theme_options',
        'title' => __('General - 404', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the 404 page.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_404_general_color', '.error404 #error-404-hero .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_404_heading_general', 'pt_404', 'General Options', $wp_customize);

    // Elements Color
    $wp_customize->add_setting(
        'pt_404_general_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_404_general_color',
        array(
            'section' => 'pt_404',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of all the elements of the 404 page.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Content Options ------------
    custom_heading('pt_404_heading_content', 'pt_404', 'Content Options', $wp_customize);

    // Icon
    $wp_customize->add_setting(
        'pt_404_icon',
        array(
            'default' => 'whistle',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_404_icon',
        array(
            'type' => 'select',
            'section' => 'pt_404',
            'label' => __('Icon', 'propaganda-customizer-instruction'),
            'description' => __('Icon displayed in the 404 page.', 'propaganda-customizer-instruction'),
            'choices' => $icons,
        )
    );

    // Title
    $wp_customize->add_setting('pt_404_title', array(
        'default' => '404§',
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_404_title',
        array(
            'type' => 'textarea',
            'section' => 'pt_404',
            'settings' => 'pt_404_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h1 of the Hero of the 404 page. &lt;br&gt;, bold and italic are accepted.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_404_subtitle', array(
        'default' => 'ты потерялся',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_404_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_404',
            'settings' => 'pt_404_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h2 of the Hero of the 404 page.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_404_content_separator', 'pt_404', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_404_button_label', array(
        'default' => 'я веду на главную',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_404_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_404',
            'settings' => 'pt_404_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button in the hero of the 404 page.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - HERO SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_hero', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Hero Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Hero section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_hero_background', '#hp-hero .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_hero_heading_general', 'pt_hero', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_hero_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_hero_displayed',
        array(
            'section' => 'pt_hero',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // Background
    $wp_customize->add_setting(
        'pt_hero_background',
        array(
            'default' => 'ichimatu',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_hero_background',
        array(
            'type' => 'select',
            'section' => 'pt_hero',
            'label' => __('Background Pattern', 'propaganda-customizer-instruction'),
            'description' => __('Background pattern for the Hero.', 'propaganda-customizer-instruction'),
            'choices' => $svg_patterns,
        )
    );

    // Animation
    $wp_customize->add_setting(
        'pt_hero_background_animation',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_hero_background_animation',
        array(
            'section' => 'pt_hero',
            'label' => __('Animate the background?', 'propaganda-customizer-instruction'),
            'description' => __('Enable the animation of the rotation of the background.', 'propaganda-customizer-instruction'),
        )
    ));

    // Animation Duration
    $wp_customize->add_setting('pt_hero_background_duration', array(
        'default' => 60,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_hero_background_duration',
        array(
            'type' => 'number',
            'section' => 'pt_hero',
            'settings' => 'pt_hero_background_duration',
            'label' => __('Duration of the background animation', 'propaganda-customizer-instruction'),
            'description' => __('Number for the duration of the animation for a full circle (in seconds).', 'propaganda-customizer-instruction'),
        )
    );

    // Animation Transform Origin
    $wp_customize->add_setting(
        'pt_hero_background_origin',
        array(
            'default' => 'center',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_hero_background_origin',
        array(
            'type' => 'select',
            'section' => 'pt_hero',
            'label' => __('Transform Position', 'propaganda-customizer-instruction'),
            'description' => __('Position of the rotating axis of the animation of the background.', 'propaganda-customizer-instruction'),
            'choices' => $positions,
        )
    );

    // Separator
    separator('pt_hero_background_separator', 'pt_hero', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_hero_alignment',
        array(
            'default' => 'center',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_hero_alignment',
        array(
            'section' => 'pt_hero',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the elements in the Hero.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // ------------ Title Options ------------
    custom_heading('pt_hero_heading_titles', 'pt_hero', 'Titles Options', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_hero_title', array(
        'default' => 'Привет посетитель!',
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_hero_title',
        array(
            'type' => 'textarea',
            'section' => 'pt_hero',
            'settings' => 'pt_hero_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h1 of the Hero. &lt;br&gt;, bold and italic are accepted.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_hero_subtitle', array(
        'default' => 'Этот сайт здесь, чтобы показать вам кое-что',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_hero_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_hero',
            'settings' => 'pt_hero_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h2 of the Hero.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Button Options ------------
    custom_heading('pt_hero_heading_buttons', 'pt_hero', 'Button Options', $wp_customize);

    for ($count = 1; $count <= 2; $count++) {

        // Button Display
        $wp_customize->add_setting(
            'pt_hero_button_' . $count,
            array(
                'default' => true,
                'sanitize_callback' => 'pt_sanitize_checkbox'
            )
        );

        $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
            $wp_customize,
            'pt_hero_button_' . $count,
            array(
                'section' => 'pt_hero',
                'label' => __('Display the Button ' . $count, 'propaganda-customizer-instruction'),
            )
        ));

        // Button Label
        $wp_customize->add_setting('pt_hero_button_label_' . $count, array(
            'default' => 'Нажми меня товарищ',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_hero_button_label_' . $count,
            array(
                'type' => 'text',
                'section' => 'pt_hero',
                'settings' => 'pt_hero_button_label_' . $count,
                'label' => __('Button  ' . $count . ' Label', 'propaganda-customizer-instruction'),
                'description' => __('Text for the Button ' . $count . ' in the Hero.', 'propaganda-customizer-instruction'),
            )
        );

        // Button Link
        $wp_customize->add_setting('pt_hero_button_link_' . $count, array(
            'default' => '#',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_hero_button_link_' . $count,
            array(
                'type' => 'text',
                'section' => 'pt_hero',
                'settings' => 'pt_hero_button_link_' . $count,
                'label' => __('Button  ' . $count . ' Link', 'propaganda-customizer-instruction'),
                'description' => __('Link for the Button ' . $count . ' in the Hero.', 'propaganda-customizer-instruction'),
            )
        );

        // Button Link External
        $wp_customize->add_setting('pt_hero_button_external_' . $count, array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox',
        ));

        $wp_customize->add_control(
            'pt_hero_button_external_' . $count,
            array(
                'type' => 'checkbox',
                'section' => 'pt_hero',
                'settings' => 'pt_hero_button_external_' . $count,
                'label' => __('Is this button external?', 'propaganda-customizer-instruction'),
                'description' => __('Yes if the checkbox is checked.', 'propaganda-customizer-instruction'),
            )
        );

        if ($count != 2) {
            // Separator
            separator('pt_hero_button_separator', 'pt_hero', $wp_customize);
        }
    }

    // Button 2 Color
    $wp_customize->add_setting(
        'pt_hero_button_color_2',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_hero_button_color_2',
        array(
            'section' => 'pt_hero',
            'label' => __('Button 2 Color', 'propaganda-customizer-instruction'),
            'description' => __('Is the button\'s color "Primary" or "Secondary".', 'propaganda-customizer-instruction'),
        )
    ));


    /* HOMEPAGE - SKILLS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_skills', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Skills Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Skills section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_skills_heading_alignment', '#hp-skills .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_skills_heading_general', 'pt_skills', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_skills_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_skills_displayed',
        array(
            'section' => 'pt_skills',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage', 'propaganda-customizer-instruction'),
        )
    ));

    // Color
    $wp_customize->add_setting(
        'pt_skills_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_skills_general_color',
        array(
            'section' => 'pt_skills',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2 and the elements of the grid in the Skills section.', 'propaganda-customizer-instruction'),
        )
    ));

    // Section Expanded
    $wp_customize->add_setting(
        'pt_skills_expanded',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_skills_expanded',
        array(
            'section' => 'pt_skills',
            'label' => __('Expand fully the section initially.', 'propaganda-customizer-instruction'),
        )
    ));

    // Button Label
    $wp_customize->add_setting('pt_skills_button_label', array(
        'default' => 'Покажи мне остальные!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button in the Skills section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Headings Options ------------
    custom_heading('pt_skills_heading_headings', 'pt_skills', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_skills_heading_alignment',
        array(
            'default' => 'left',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_skills_heading_alignment',
        array(
            'section' => 'pt_skills',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Skills section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction'),
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_skills_heading_title', array(
        'default' => 'Навыки и умения',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Skills section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_skills_heading_subtitle', array(
        'default' => 'В чем ты хорош?',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Skills section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ General Options ------------
    custom_heading('pt_skills_heading_Grid', 'pt_skills', 'Grid Options', $wp_customize);

    // Number Grid Items
    $wp_customize->add_setting('pt_skills_grid_items', array(
        'default' => 8,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_grid_items',
        array(
            'type' => 'number',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_grid_items',
            'label' => __('Number of grid items', 'propaganda-customizer-instruction'),
            'description' => __('Number of grid items displayed in the grid in the Skills section. Refresh the all page after modifying the value.', 'propaganda-customizer-instruction'),
        )
    );

    $items = get_theme_mod('pt_skills_grid_items', 8);

    for ($count = 1; $count <= $items; $count++) {

        // Separator
        separator('pt_skills_content_separator_' . $count, 'pt_skills', $wp_customize);

        // Icon
        $wp_customize->add_setting(
            'pt_skills_content_' . $count . '_icon',
            array(
                'default' => 'military-medal',
                'sanitize_callback' => 'pt_sanitize_select'
            )
        );

        $wp_customize->add_control(
            'pt_skills_content_' . $count . '_icon',
            array(
                'type' => 'select',
                'section' => 'pt_skills',
                'label' => __('Icon ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Icon of the item ' . $count . ' in the Skills section.', 'propaganda-customizer-instruction'),
                'choices' => $icons,
            )
        );

        // Title
        $wp_customize->add_setting('pt_skills_content_' . $count . '_title', array(
            'default' => 'молодец товарищ',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_skills_content_' . $count . '_title',
            array(
                'type' => 'text',
                'section' => 'pt_skills',
                'settings' => 'pt_skills_content_' . $count . '_title',
                'label' => __('Title ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Title of the item ' . $count . ' in the Skills section.', 'propaganda-customizer-instruction'),
            )
        );

        // Pill
        $wp_customize->add_setting('pt_skills_content_' . $count . '_pill', array(
            'default' => ($count == 2) ? 'Новый' : '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_skills_content_' . $count . '_pill',
            array(
                'type' => 'text',
                'section' => 'pt_skills',
                'settings' => 'pt_skills_content_' . $count . '_pill',
                'label' => __('Pill label ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Label of the pill of the item ' . $count . ' in the Skills section.', 'propaganda-customizer-instruction'),
            )
        );
    }

    // ------------ Subsection Options ------------
    custom_heading('pt_skills_heading_subsection', 'pt_skills', 'Subsection Options', $wp_customize);

    // List Displayed
    $wp_customize->add_setting(
        'pt_skills_subsection_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_skills_subsection_displayed',
        array(
            'section' => 'pt_skills',
            'label' => __('Show the subsection section.', 'propaganda-customizer-instruction'),
        )
    ));

    // Subtitle
    $wp_customize->add_setting('pt_skills_subsection_subtitle', array(
        'default' => 'Ключевое значение имеет точность',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_subsection_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_subsection_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the subsection of the Skills section.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_skills_subsection_separator_1', 'pt_skills', $wp_customize);

    // Column 1 - List Items
    $wp_customize->add_setting('pt_skills_subsection_col_1_grid_items', array(
        'default' => 4,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_subsection_col_1_grid_items',
        array(
            'type' => 'number',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_subsection_col_1_grid_items',
            'label' => __('Column 1 - Number of list items', 'propaganda-customizer-instruction'),
            'description' => __('Number of list items displayed in the subsection of the Skills section. Refresh the all page after modifying the value.', 'propaganda-customizer-instruction'),
        )
    );

    $items = get_theme_mod('pt_skills_subsection_col_1_grid_items', 4);

    for ($count = 1; $count <= $items; $count++) {

        // Column 1 - List Title
        $wp_customize->add_setting('pt_skills_subsection_col_1_items' . $count . '_list_title', array(
            'default' => 'Язык программирования',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_skills_subsection_col_1_items' . $count . '_list_title',
            array(
                'type' => 'text',
                'section' => 'pt_skills',
                'settings' => 'pt_skills_subsection_col_1_items' . $count . '_list_title',
                'label' => __('Column 1 - List Title ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Title of the list ' . $count . ' in the Skills section.', 'propaganda-customizer-instruction'),
            )
        );

        // Column 1 - List Elements
        $wp_customize->add_setting('pt_skills_subsection_col_1_items' . $count . '_list_elements', array(
            'default' => '<li>HTML</li><li>PHP</li>',
            'sanitize_callback' => 'pt_sanitize_textarea',
        ));

        $wp_customize->add_control(
            'pt_skills_subsection_col_1_items' . $count . '_list_elements',
            array(
                'type' => 'textarea',
                'section' => 'pt_skills',
                'settings' => 'pt_skills_subsection_col_1_items' . $count . '_list_elements',
                'label' => __('Column 1 - List Elements ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Content for the list of the Skills. &lt;br&gt;, bold and italic are accepted. To make it a list, use &lt;li&gt;.', 'propaganda-customizer-instruction'),
            )
        );
    }

    // Separator
    separator('pt_skills_subsection_separator_2', 'pt_skills', $wp_customize);

    // Column 2 - List Items
    $wp_customize->add_setting('pt_skills_subsection_col_2_grid_items', array(
        'default' => 3,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_subsection_col_2_grid_items',
        array(
            'type' => 'number',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_subsection_col_2_grid_items',
            'label' => __('Column 2 - Number of list items', 'propaganda-customizer-instruction'),
            'description' => __('Number of list items displayed in the subsection of the Skills section. Refresh the all page after modifying the value.', 'propaganda-customizer-instruction'),
        )
    );

    $items = get_theme_mod('pt_skills_subsection_col_2_grid_items', 3);

    for ($count = 1; $count <= $items; $count++) {

        // Column 2 - List Title
        $wp_customize->add_setting('pt_skills_subsection_col_2_items' . $count . '_list_title', array(
            'default' => 'IT Languages',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_skills_subsection_col_2_items' . $count . '_list_title',
            array(
                'type' => 'text',
                'section' => 'pt_skills',
                'settings' => 'pt_skills_subsection_col_2_items' . $count . '_list_title',
                'label' => __('Column 2 - List Title ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Title of the list ' . $count . ' in the Skills section.', 'propaganda-customizer-instruction'),
            )
        );

        // Column 2 - List Elements
        $wp_customize->add_setting('pt_skills_subsection_col_2_items' . $count . '_list_elements', array(
            'default' => '<li>HTML</li><li>PHP</li>',
            'sanitize_callback' => 'pt_sanitize_textarea',
        ));

        $wp_customize->add_control(
            'pt_skills_subsection_col_2_items' . $count . '_list_elements',
            array(
                'type' => 'textarea',
                'section' => 'pt_skills',
                'settings' => 'pt_skills_subsection_col_2_items' . $count . '_list_elements',
                'label' => __('Column 2 - List Elements ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Content for the list of the Skills. &lt;br&gt;, bold and italic are accepted. To make it a list, use &lt;li&gt;.', 'propaganda-customizer-instruction'),
            )
        );
    }

    // Separator
    separator('pt_skills_subsection_separator_3', 'pt_skills', $wp_customize);

    // Skills Form Displayed
    $wp_customize->add_setting(
        'pt_skills_cf_displayed',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_skills_cf_displayed',
        array(
            'section' => 'pt_skills',
            'label' => __('Display a contact form?', 'propaganda-customizer-instruction'),
        )
    ));

    // Skills Form Shortcode ID
    $wp_customize->add_setting('pt_skills_cf_shortcode', array(
        'default' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_cf_shortcode',
        array(
            'type' => 'number',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_cf_shortcode',
            'label' => __('Skills Form Shortcode ID', 'propaganda-customizer-instruction'),
            'description' => __('Insert the ID of the shortcode of the Skills Section. Download the plugin <a target="_blank" href="https://fr.wordpress.org/plugins/contact-form-7/">here</a>.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - INFORMATIONS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_informations', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Informations Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Informations section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_informations_heading_alignment', '#hp-informations .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_informations_heading_general', 'pt_informations', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_informations_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_informations_displayed',
        array(
            'section' => 'pt_informations',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // Block Color
    $wp_customize->add_setting(
        'pt_informations_block_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_informations_block_color',
        array(
            'section' => 'pt_informations',
            'label' => __('Block Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for block in the Informations section.', 'propaganda-customizer-instruction'),
        )
    ));

    // Offset Color
    $wp_customize->add_setting(
        'pt_informations_offset_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_informations_offset_color',
        array(
            'section' => 'pt_informations',
            'label' => __('Offset Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for offset block in the Informations section.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_informations_heading_headings', 'pt_informations', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_informations_heading_alignment',
        array(
            'default' => 'center',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_informations_heading_alignment',
        array(
            'section' => 'pt_informations',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Informations section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_informations_heading_title', array(
        'default' => 'биография',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Informations section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_informations_heading_subtitle', array(
        'default' => 'Кто ты?',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Informations section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_informations_heading_content', 'pt_informations', 'Content Options', $wp_customize);

    // Profile Picture
    $wp_customize->add_setting('pt_informations_profile_picture', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'pt_informations_profile_picture',
        array(
            'section' => 'pt_informations',
            'settings' => 'pt_informations_profile_picture',
            'label' => __('Upload Profile Picture', 'propaganda-customizer-instruction'),
            'description' => __('Profile picture in the Informations section.', 'propaganda-customizer-instruction'),
            'button_labels' => array(
                'select' => __('Select Profile Picture', 'propaganda-customizer-instruction'),
                'remove' => __('Remove Profile Picture', 'propaganda-customizer-instruction'),
                'change' => __('Change Profile Picture', 'propaganda-customizer-instruction'),
            ),
        )
    ));

    // Profile Tooltip
    $wp_customize->add_setting('pt_informations_profile_tooltip', array(
        'default' => 'Привет красавчик',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_profile_tooltip',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_profile_tooltip',
            'label' => __('Tooltip', 'propaganda-customizer-instruction'),
            'description' => __('Text for the tooltip of the profile picture in the Informations section.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_informations_content_separator_1', 'pt_informations', $wp_customize);

    // Description
    $wp_customize->add_setting('pt_informations_description', array(
        'default' => 'Алексе́й Григо́рьевич Стаха́нов (21 декабря 1905 — 5 ноября 1977) — советский шахтёр, новатор угольной промышленности, основоположник Стахановского движения, Герой Социалистического Труда (1970).<br />В 1935 году группа, состоявшая из забойщика Стаханова и двоих крепильщиков, за одну смену добыла в 14,5 раза больше угля, чем предписывалось по норме на одного забойщика. Однако советская пропаганда приписала весь добытый за смену уголь лично Стаханову. Рекордная смена была спланирована заранее, было перепроверено оборудование, организован вывоз угля, проведено освещение забоя. Достижение было использовано ВКП для кампании, известной как «стахановское движение».',
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_informations_description',
        array(
            'type' => 'textarea',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_description',
            'label' => __('Description', 'propaganda-customizer-instruction'),
            'description' => __('Text for the description in the Informations section. &lt;br&gt;, bold and italic are accepted.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_informations_content_separator_2', 'pt_informations', $wp_customize);

    // List Displayed
    $wp_customize->add_setting(
        'pt_informations_lists_displayed',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_informations_lists_displayed',
        array(
            'section' => 'pt_informations',
            'label' => __('Show the list section.', 'propaganda-customizer-instruction'),
        )
    ));

    // Separator
    separator('pt_informations_content_separator_3', 'pt_informations', $wp_customize);

    // Column 1 - Title
    $wp_customize->add_setting('pt_informations_col_1_title', array(
        'default' => 'Формирование',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_col_1_title',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_col_1_title',
            'label' => __('Column 1 - Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title of the column 1 in the Informations section.', 'propaganda-customizer-instruction'),
        )
    );

    // Column 1 - List Items
    $wp_customize->add_setting('pt_informations_col_1_grid_item', array(
        'default' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_col_1_grid_item',
        array(
            'type' => 'number',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_col_1_grid_item',
            'label' => __('Column 1 - Number of list items', 'propaganda-customizer-instruction'),
            'description' => __('Number of list items displayed in the 1st list in the Informations section. Refresh the all page after modifying the value.', 'propaganda-customizer-instruction'),
        )
    );

    $items = get_theme_mod('pt_informations_col_1_grid_item', 1);

    for ($count = 1; $count <= $items; $count++) {

        // Text
        $wp_customize->add_setting('pt_informations_col_1_content_' . $count . '_text', array(
            'default' => '<b>1931 - 1934 | Степень магистра</b> Королевский колледж Кембриджа',
            'sanitize_callback' => 'pt_sanitize_textarea',
        ));

        $wp_customize->add_control(
            'pt_informations_col_1_content_' . $count . '_text',
            array(
                'type' => 'textarea',
                'section' => 'pt_informations',
                'settings' => 'pt_informations_col_1_content_' . $count . '_text',
                'label' => __('Column 1 - Text ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Text for the list element ' . $count . ' in the Informations section. &lt;br&gt;, bold and italic are accepted.', 'propaganda-customizer-instruction'),
            )
        );

        // Link
        $wp_customize->add_setting('pt_informations_col_1_content_' . $count . '_link', array(
            'default' => '',
            'sanitize_callback' => 'pt_sanitize_url',
        ));

        $wp_customize->add_control(
            'pt_informations_col_1_content_' . $count . '_link',
            array(
                'type' => 'url',
                'section' => 'pt_informations',
                'settings' => 'pt_informations_col_1_content_' . $count . '_link',
                'label' => __('Column 1 - Link ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Link for the list element ' . $count . ' in the Informations section.', 'propaganda-customizer-instruction'),
            )
        );
    }

    // Separator
    separator('pt_informations_content_separator_4', 'pt_informations', $wp_customize);

    // Column 2 - Title
    $wp_customize->add_setting('pt_informations_col_2_title', array(
        'default' => 'Формирование',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_col_2_title',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_col_2_title',
            'label' => __('Column 2 - Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title of the column 2 in the Informations section.', 'propaganda-customizer-instruction'),
        )
    );

    // Column 1 - List Items
    $wp_customize->add_setting('pt_informations_col_2_grid_item', array(
        'default' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_col_2_grid_item',
        array(
            'type' => 'number',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_col_2_grid_item',
            'label' => __('Column 2 - Number of list items', 'propaganda-customizer-instruction'),
            'description' => __('Number of list items displayed in the 2nd list in the Informations section. Refresh the all page after modifying the value.', 'propaganda-customizer-instruction'),
        )
    );

    $items = get_theme_mod('pt_informations_col_2_grid_item', 1);

    for ($count = 1; $count <= $items; $count++) {

        // Text
        $wp_customize->add_setting('pt_informations_col_2_content_' . $count . '_text', array(
            'default' => '<b>1931 - 1934 | Степень магистра</b> Королевский колледж Кембриджа',
            'sanitize_callback' => 'pt_sanitize_textarea',
        ));

        $wp_customize->add_control(
            'pt_informations_col_2_content_' . $count . '_text',
            array(
                'type' => 'textarea',
                'section' => 'pt_informations',
                'settings' => 'pt_informations_col_2_content_' . $count . '_text',
                'label' => __('Column 2 - Text ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Text for the list element ' . $count . ' in the Informations section. &lt;br&gt;, bold and italic are accepted.', 'propaganda-customizer-instruction'),
            )
        );

        // Link
        $wp_customize->add_setting('pt_informations_col_2_content_' . $count . '_link', array(
            'default' => '',
            'sanitize_callback' => 'pt_sanitize_url',
        ));

        $wp_customize->add_control(
            'pt_informations_col_2_content_' . $count . '_link',
            array(
                'type' => 'url',
                'section' => 'pt_informations',
                'settings' => 'pt_informations_col_2_content_' . $count . '_link',
                'label' => __('Column 2 - Link ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Link for the list element ' . $count . ' in the Informations section.', 'propaganda-customizer-instruction'),
            )
        );
    }


    /* HOMEPAGE - BENEFITS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_benefits', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Benefits Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Benefits section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_benefits_heading_alignment', '#hp-benefits .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_benefits_heading_general', 'pt_benefits', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_benefits_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_benefits_displayed',
        array(
            'section' => 'pt_benefits',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_benefits_heading_headings', 'pt_benefits', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_benefits_heading_alignment',
        array(
            'default' => 'left',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_benefits_heading_alignment',
        array(
            'section' => 'pt_benefits',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Benefits section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Color
    $wp_customize->add_setting(
        'pt_benefits_heading_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_benefits_heading_color',
        array(
            'section' => 'pt_benefits',
            'label' => __('Heading Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2 in the Benefits section.', 'propaganda-customizer-instruction'),
        )
    ));

    // Title
    $wp_customize->add_setting('pt_benefits_heading_title', array(
        'default' => 'Ценности',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_benefits_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_benefits',
            'settings' => 'pt_benefits_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Benefits section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_benefits_heading_subtitle', array(
        'default' => 'во что ты веришь?',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_benefits_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_benefits',
            'settings' => 'pt_benefits_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Benefits section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_benefits_heading_content', 'pt_benefits', 'Content Options', $wp_customize);

    for ($count = 1; $count <= 4; $count++) {

        // Icon
        $wp_customize->add_setting(
            'pt_benefits_content_' . $count . '_icon',
            array(
                'default' => 'rocket',
                'sanitize_callback' => 'pt_sanitize_select'
            )
        );

        $wp_customize->add_control(
            'pt_benefits_content_' . $count . '_icon',
            array(
                'type' => 'select',
                'section' => 'pt_benefits',
                'label' => __('Icon ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Icon of the item ' . $count . ' in the Benefits section.', 'propaganda-customizer-instruction'),
                'choices' => $icons,
            )
        );

        // Title
        $wp_customize->add_setting('pt_benefits_content_' . $count . '_title', array(
            'default' => 'Скажи нам',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_benefits_content_' . $count . '_title',
            array(
                'type' => 'text',
                'section' => 'pt_benefits',
                'settings' => 'pt_benefits_content_' . $count . '_title',
                'label' => __('Title ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('Title of the item ' . $count . ' in the Benefits section.', 'propaganda-customizer-instruction'),
            )
        );

        // Subtitle
        $wp_customize->add_setting('pt_benefits_content_' . $count . '_subtitle', array(
            'default' => 'Почему ты лучший',
            'sanitize_callback' => 'pt_sanitize_textarea',
        ));

        $wp_customize->add_control(
            'pt_benefits_content_' . $count . '_subtitle',
            array(
                'type' => 'textarea',
                'section' => 'pt_benefits',
                'settings' => 'pt_benefits_content_' . $count . '_subtitle',
                'label' => __('Subtitle ' . $count, 'propaganda-customizer-instruction'),
                'description' => __('The subtitle of the item ' . $count . ' in the Benefits section.', 'propaganda-customizer-instruction'),
            )
        );

        if ($count != 4) {
            // Separator
            separator('pt_benefits_content_separator_' . $count, 'pt_benefits', $wp_customize);
        }
    }


    /* HOMEPAGE - NOTIFICATION SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_notification', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Notification Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Notification section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_notification_heading_general', '#hp-notification .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_notification_heading_general', 'pt_notification', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_notification_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_notification_displayed',
        array(
            'section' => 'pt_notification',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // Background Color
    $wp_customize->add_setting(
        'pt_notification_background_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_notification_background_color',
        array(
            'section' => 'pt_notification',
            'label' => __('Background Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the background of the Notification section.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Content Options ------------
    custom_heading('pt_notification_heading_content', 'pt_notification', 'Content Options', $wp_customize);

    // Content
    $wp_customize->add_setting('pt_notification_content', array(
        'default' => 'Мы нуждаемся в тебе!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_notification_content',
        array(
            'type' => 'text',
            'section' => 'pt_notification',
            'settings' => 'pt_notification_content',
            'label' => __('Content', 'propaganda-customizer-instruction'),
            'description' => __('Text for the Notification section.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_notification_separator', 'pt_notification', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_notification_button_label', array(
        'default' => 'Проверь это',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_notification_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_notification',
            'settings' => 'pt_notification_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button in the Notification section.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_notification_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_notification_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_notification',
            'settings' => 'pt_notification_button_link',
            'label' => __('Button Link', 'propaganda-customizer-instruction'),
            'description' => __('Link for the button in the Notification section.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link External
    $wp_customize->add_setting('pt_notification_button_external', array(
        'default' => false,
        'sanitize_callback' => 'pt_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'pt_notification_button_external',
        array(
            'type' => 'checkbox',
            'section' => 'pt_notification',
            'settings' => 'pt_notification_button_external',
            'label' => __('Is this button external?', 'propaganda-customizer-instruction'),
            'description' => __('Yes if the checkbox is checked.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Color
    $wp_customize->add_setting(
        'pt_notification_button_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_notification_button_color',
        array(
            'section' => 'pt_notification',
            'label' => __('Button Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the button in the Notification section.', 'propaganda-customizer-instruction'),
        )
    ));


    /* HOMEPAGE - CLIENTS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_clients', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Clients Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Clients section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_clients_heading_alignment', '#hp-clients .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_clients_heading_general', 'pt_clients', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_clients_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_clients_displayed',
        array(
            'section' => 'pt_clients',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // Color
    $wp_customize->add_setting(
        'pt_clients_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_clients_general_color',
        array(
            'section' => 'pt_clients',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2 in the Clients section.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_clients_heading_headings', 'pt_clients', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_clients_heading_alignment',
        array(
            'default' => 'left',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_clients_heading_alignment',
        array(
            'section' => 'pt_clients',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Clients section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_clients_heading_title', array(
        'default' => 'Клиенты',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_clients_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_clients',
            'settings' => 'pt_clients_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Clients section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_clients_heading_subtitle', array(
        'default' => 'На кого ты работаешь?!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_clients_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_clients',
            'settings' => 'pt_clients_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Clients section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_clients_heading_content', 'pt_clients', 'Content Options', $wp_customize);

    // Displayed Items
    $wp_customize->add_setting('pt_clients_items', array(
        'default' => 12,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_clients_items',
        array(
            'type' => 'number',
            'section' => 'pt_clients',
            'settings' => 'pt_clients_items',
            'label' => __('Number of items displayed', 'propaganda-customizer-instruction'),
            'description' => __('Number of clients that this section will display.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - LOGOS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_logos', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Logos Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Logos section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_logos_heading_alignment', '#hp-logos .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_logos_heading_general', 'pt_logos', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_logos_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_logos_displayed',
        array(
            'section' => 'pt_logos',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // Color
    $wp_customize->add_setting(
        'pt_logos_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_logos_general_color',
        array(
            'section' => 'pt_logos',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2 in the Logos section.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_logos_heading_headings', 'pt_logos', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_logos_heading_alignment',
        array(
            'default' => 'left',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_logos_heading_alignment',
        array(
            'section' => 'pt_logos',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Logos section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_logos_heading_title', array(
        'default' => 'Клиенты',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_logos_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_logos',
            'settings' => 'pt_logos_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Logos section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_logos_heading_subtitle', array(
        'default' => 'На кого ты работаешь?!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_logos_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_logos',
            'settings' => 'pt_logos_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Logos section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_logos_heading_content', 'pt_logos', 'Content Options', $wp_customize);

    // Displayed Items
    $wp_customize->add_setting('pt_logos_items', array(
        'default' => 12,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_logos_items',
        array(
            'type' => 'number',
            'section' => 'pt_logos',
            'settings' => 'pt_logos_items',
            'label' => __('Number of items displayed', 'propaganda-customizer-instruction'),
            'description' => __('Number of clients that this section will display.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - TESTIMONIALS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_testimonials', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Testimonials Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Testimonials section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_testimonials_heading_alignment', '#hp-testimonials .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_testimonials_heading_general', 'pt_testimonials', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_testimonials_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_testimonials_displayed',
        array(
            'section' => 'pt_testimonials',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // Color
    $wp_customize->add_setting(
        'pt_testimonials_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_testimonials_general_color',
        array(
            'section' => 'pt_testimonials',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2 and the testimonials in the Testimonials section.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_testimonials_heading_headings', 'pt_testimonials', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_testimonials_heading_alignment',
        array(
            'default' => 'center',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_testimonials_heading_alignment',
        array(
            'section' => 'pt_testimonials',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Testimonials section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_testimonials_heading_title', array(
        'default' => 'Отзывы',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_testimonials_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_testimonials',
            'settings' => 'pt_testimonials_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Testimonials section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_testimonials_heading_subtitle', array(
        'default' => 'Кто ваши союзники?',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_testimonials_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_testimonials',
            'settings' => 'pt_testimonials_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Testimonials section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_testimonials_heading_content', 'pt_testimonials', 'Content Options', $wp_customize);

    // Displayed Items
    $wp_customize->add_setting('pt_testimonials_items', array(
        'default' => 7,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_testimonials_items',
        array(
            'type' => 'number',
            'section' => 'pt_testimonials',
            'settings' => 'pt_testimonials_items',
            'label' => __('Number of items displayed', 'propaganda-customizer-instruction'),
            'description' => __('Number of testimonials that this section will display.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - PROJECTS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_projects', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Projects Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Projects section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_projects_general_color', '#projects-preview', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_projects_heading_general', 'pt_projects', 'General Options', $wp_customize);

    // Color
    $wp_customize->add_setting(
        'pt_projects_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_projects_general_color',
        array(
            'section' => 'pt_projects',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2 and the button in the Projects section.', 'propaganda-customizer-instruction'),
        )
    ));

    // Button Label
    $wp_customize->add_setting('pt_projects_button_label', array(
        'default' => 'Посмотреть еще',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button in the Projects section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Headings Options ------------
    custom_heading('pt_projects_heading_headings', 'pt_projects', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_projects_heading_alignment',
        array(
            'default' => 'left',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_projects_heading_alignment',
        array(
            'section' => 'pt_projects',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Projects section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_projects_heading_title', array(
        'default' => 'Проекты',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Projects section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_projects_heading_subtitle', array(
        'default' => 'Каковы ваши достижения',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Projects section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_projects_heading_content', 'pt_projects', 'Content Options', $wp_customize);

    // Displayed Items
    $wp_customize->add_setting('pt_projects_items', array(
        'default' => 5,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_items',
        array(
            'type' => 'number',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_items',
            'label' => __('Number of items displayed', 'propaganda-customizer-instruction'),
            'description' => __('Number of items that this section will display.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - BLOG SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_blog', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Blog Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Blog section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_blog_general_color', '#blog-preview', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_blog_heading_general', 'pt_blog', 'General Options', $wp_customize);

    // Color
    $wp_customize->add_setting(
        'pt_blog_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_blog_general_color',
        array(
            'section' => 'pt_blog',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2 and the button in the Blog section.', 'propaganda-customizer-instruction'),
        )
    ));

    // Button Label
    $wp_customize->add_setting('pt_blog_button_label', array(
        'default' => 'Покажи мне остальные!',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_blog_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_blog',
            'settings' => 'pt_blog_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button in the Blog section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Headings Options ------------
    custom_heading('pt_blog_heading_headings', 'pt_blog', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_blog_heading_alignment',
        array(
            'default' => 'left',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_blog_heading_alignment',
        array(
            'section' => 'pt_blog',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Blog section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_blog_heading_title', array(
        'default' => 'Блог',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_blog_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_blog',
            'settings' => 'pt_blog_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Blog section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_blog_heading_subtitle', array(
        'default' => 'Здесь вы будете размещать свои отчеты',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_blog_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_blog',
            'settings' => 'pt_blog_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Blog section.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - CONTACT SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_contact', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Contact Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Contact section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_contact_heading_headings', '#contact .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_contact_heading_general', 'pt_contact', 'General Options', $wp_customize);

    // Background
    $wp_customize->add_setting(
        'pt_contact_background',
        array(
            'default' => 'ichimatu',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_contact_background',
        array(
            'type' => 'select',
            'section' => 'pt_contact',
            'label' => __('Background Pattern', 'propaganda-customizer-instruction'),
            'description' => __('Background pattern for the Contact.', 'propaganda-customizer-instruction'),
            'choices' => $svg_patterns,
        )
    );

    // Color
    $wp_customize->add_setting(
        'pt_contact_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_contact_general_color',
        array(
            'section' => 'pt_contact',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the title h2, the labels and the button in the Contact section.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_contact_heading_headings', 'pt_contact', 'Headings Options', $wp_customize);

    // Alignment
    $wp_customize->add_setting(
        'pt_contact_heading_alignment',
        array(
            'default' => 'center',
            'sanitize_callback' => 'pt_sanitize_radio'
        )
    );

    $wp_customize->add_control(new PT_Alignment_Radios_Custom_Control(
        $wp_customize,
        'pt_contact_heading_alignment',
        array(
            'section' => 'pt_contact',
            'label' => __('Alignment', 'propaganda-customizer-instruction'),
            'description' => __('Alignment for the headings in the Contact section.', 'propaganda-customizer-instruction'),
            'choices' => array(
                'left' => __('Left', 'propaganda-customizer-instruction'),
                'center' => __('Center', 'propaganda-customizer-instruction'),
                'right' => __('Right', 'propaganda-customizer-instruction')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_contact_heading_title', array(
        'default' => 'свяжитесь с нами немедленно',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_heading_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 in the Contact section.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_contact_heading_subtitle', array(
        'default' => 'Мы знаем все.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_heading_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h3 in the Contact section.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_contact_heading_content', 'pt_contact', 'Content Options', $wp_customize);

    // Description
    $wp_customize->add_setting('pt_contact_description', array(
        'default' => 'Мы знаем все.',
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_contact_description',
        array(
            'type' => 'textarea',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_description',
            'label' => __('Description', 'propaganda-customizer-instruction'),
            'description' => __('Text for the description in the Contact section. &lt;br&gt;, bold and italic are accepted.', 'propaganda-customizer-instruction'),
        )
    );

    // Email
    $wp_customize->add_setting('pt_contact_email', array(
        'default' => 'привет@сайт.ru',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control(
        'pt_contact_email',
        array(
            'type' => 'email',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_email',
            'label' => __('Email', 'propaganda-customizer-instruction'),
            'description' => __('Your email address for the Contact section.', 'propaganda-customizer-instruction'),
        )
    );

    // Phone
    $wp_customize->add_setting('pt_contact_phone', array(
        'default' => '118 712',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_phone',
        array(
            'type' => 'text',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_phone',
            'label' => __('Phone', 'propaganda-customizer-instruction'),
            'description' => __('Your phone number for the Contact section.', 'propaganda-customizer-instruction'),
        )
    );

    // Icon
    $wp_customize->add_setting(
        'pt_contact_icon',
        array(
            'default' => 'anonymous',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_contact_icon',
        array(
            'type' => 'select',
            'section' => 'pt_contact',
            'label' => __('Icon', 'propaganda-customizer-instruction'),
            'description' => __('Icon displayed in the Contact section.', 'propaganda-customizer-instruction'),
            'choices' => $icons,
        )
    );

    // ------------ Contact Options ------------
    custom_heading('pt_contact_heading_contact', 'pt_contact', 'Contact Options', $wp_customize);

    // Contact Form Shortcode ID
    $wp_customize->add_setting('pt_contact_cf_shortcode', array(
        'default' => 1,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_cf_shortcode',
        array(
            'type' => 'number',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_cf_shortcode',
            'label' => __('Contact Form Shortcode ID', 'propaganda-customizer-instruction'),
            'description' => __('Insert the ID of the shortcode of the Contact Form. Download the plugin <a target="_blank" href="https://fr.wordpress.org/plugins/contact-form-7/">here</a>.', 'propaganda-customizer-instruction'),
        )
    );


    /* HOMEPAGE - MARQUEE SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_marquee', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Marquee Section', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Marquee section on the homepage.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_marquee_general_color', '#marquee', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_marquee_heading_general', 'pt_marquee', 'General Options', $wp_customize);

    // Display the Section
    $wp_customize->add_setting(
        'pt_marquee_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_marquee_displayed',
        array(
            'section' => 'pt_marquee',
            'label' => __('Display the whole section', 'propaganda-customizer-instruction'),
            'description' => __('Display the section on the homepage.', 'propaganda-customizer-instruction'),
        )
    ));

    // Color
    $wp_customize->add_setting(
        'pt_marquee_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_marquee_general_color',
        array(
            'section' => 'pt_marquee',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color for the background of the Marquee.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Content Options ------------
    custom_heading('pt_marquee_heading_content', 'pt_marquee', 'Content Options', $wp_customize);

    // Content
    $wp_customize->add_setting('pt_marquee_content', array(
        'default' => 'Срочно - немедленно свяжитесь с вашим руководителем',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_marquee_content',
        array(
            'type' => 'textarea',
            'section' => 'pt_marquee',
            'settings' => 'pt_marquee_content',
            'label' => __('Content', 'propaganda-customizer-instruction'),
            'description' => __('Text for the Marquee.', 'propaganda-customizer-instruction'),
        )
    );

    // Uppercase
    $wp_customize->add_setting('pt_marquee_content_uppercase', array(
        'default' => false,
        'sanitize_callback' => 'pt_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'pt_marquee_content_uppercase',
        array(
            'type' => 'checkbox',
            'section' => 'pt_marquee',
            'settings' => 'pt_marquee_content_uppercase',
            'label' => __('Is the content in uppercase?', 'propaganda-customizer-instruction'),
            'description' => __('Yes if the checkbox is checked.', 'propaganda-customizer-instruction'),
        )
    );


    /* CONTENT - COMMENTS
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_comments', array(
        'panel' => 'pt_theme_options',
        'title' => __('Content - Comments', 'propaganda-customizer-instruction'),
        'description' => __('Options related to Comments on all the content types.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_comments_general_color', '.inner-comments', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_comments_heading_general', 'pt_comments', 'General Options', $wp_customize);

    // General Color
    $wp_customize->add_setting(
        'pt_comments_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_comments_general_color',
        array(
            'section' => 'pt_comments',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the elements in the Comments section.', 'propaganda-customizer-instruction'),
        )
    ));


    /* PAGE - SINGLE
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_single_page', array(
        'panel' => 'pt_theme_options',
        'title' => __('Page - Single', 'propaganda-customizer-instruction'),
        'description' => __('Options related to pages.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_single_page_background_color', '.page .inner-article', $wp_customize);

    // ------------ Background Options ------------
    custom_heading('pt_single_page_heading_general', 'pt_single_page', 'General Options', $wp_customize);

    // Background Color
    $wp_customize->add_setting(
        'pt_single_page_background_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_page_background_color',
        array(
            'section' => 'pt_single_page',
            'label' => __('Background Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the background of pages.', 'propaganda-customizer-instruction'),
        )
    ));

    // Elements Color
    $wp_customize->add_setting(
        'pt_single_page_elements_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_page_elements_color',
        array(
            'section' => 'pt_single_page',
            'label' => __('Elements Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of all the elements of pages.', 'propaganda-customizer-instruction'),
        )
    ));

    /* POST - ARCHIVE
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_archive_post', array(
        'panel' => 'pt_theme_options',
        'title' => __('Post - Archive', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Post archive page.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_archive_post_general_color', '#blog-content .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_archive_post_heading_general', 'pt_archive_post', 'General Options', $wp_customize);

    // Elements Color
    $wp_customize->add_setting(
        'pt_archive_post_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_archive_post_general_color',
        array(
            'section' => 'pt_archive_post',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of all the elements of the Post archive page.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Intro Options ------------
    custom_heading('pt_archive_post_heading_intro', 'pt_archive_post', 'Intro Options', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_archive_post_title', array(
        'default' => 'Блог',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_post_title',
        array(
            'type' => 'text',
            'section' => 'pt_archive_post',
            'settings' => 'pt_archive_post_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h1 of the Hero of the Post archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_archive_post_subtitle', array(
        'default' => 'Это твой дневник?',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_post_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_archive_post',
            'settings' => 'pt_archive_post_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h2 of the Hero of the Post archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Outro Options ------------
    custom_heading('pt_archive_post_heading_outro', 'pt_archive_post', 'Outro Section Options', $wp_customize);

    // Display Illustration
    $wp_customize->add_setting(
        'pt_archive_post_illustration_outro_displayed',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_archive_post_illustration_outro_displayed',
        array(
            'section' => 'pt_archive_post',
            'label' => __('Display an illustration.', 'propaganda-customizer-instruction'),
        )
    ));

    // Illustration
    $wp_customize->add_setting(
        'pt_archive_post_illustration_outro',
        array(
            'default' => 'tetris-cube',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_archive_post_illustration_outro',
        array(
            'type' => 'select',
            'section' => 'pt_archive_post',
            'label' => __('Illustration', 'propaganda-customizer-instruction'),
            'description' => __('Illustration displayed in the Outro section of the Post archive page.', 'propaganda-customizer-instruction'),
            'choices' => $illustrations,
        )
    );

    // Separator
    separator('pt_archive_post_outro_separator_1', 'pt_archive_post', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_archive_post_outro_title', array(
        'default' => 'ты должен это увидеть',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_post_outro_title',
        array(
            'type' => 'text',
            'section' => 'pt_archive_post',
            'settings' => 'pt_archive_post_outro_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h3 of the Outro section of the Post archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_archive_post_outro_separator_2', 'pt_archive_post', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_archive_post_button_label', array(
        'default' => 'кликните сюда',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_post_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_archive_post',
            'settings' => 'pt_archive_post_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button of the Outro section of the Post archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_archive_post_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_post_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_archive_post',
            'settings' => 'pt_archive_post_button_link',
            'label' => __('Button Link', 'propaganda-customizer-instruction'),
            'description' => __('Link for the button of the Outro section of the Post archive page.', 'propaganda-customizer-instruction'),
        )
    );


    /* POST - SINGLE
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_single_post', array(
        'panel' => 'pt_theme_options',
        'title' => __('Post - Single', 'propaganda-customizer-instruction'),
        'description' => __('Options related to Client articles.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_single_post_background_color', '.single-post .inner-article', $wp_customize);

    // ------------ Background Options ------------
    custom_heading('pt_single_post_heading_general', 'pt_single_post', 'General Options', $wp_customize);

    // Background Color
    $wp_customize->add_setting(
        'pt_single_post_background_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_post_background_color',
        array(
            'section' => 'pt_single_post',
            'label' => __('Background Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the background of Post articles.', 'propaganda-customizer-instruction'),
        )
    ));

    // Elements Color
    $wp_customize->add_setting(
        'pt_single_post_elements_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_post_elements_color',
        array(
            'section' => 'pt_single_post',
            'label' => __('Elements Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of all the elements of Post articles, such as buttons or some titles.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Outro Options ------------
    custom_heading('pt_single_post_heading_outro', 'pt_single_post', 'Outro Section Options', $wp_customize);

    // Display Illustration
    $wp_customize->add_setting(
        'pt_single_post_illustration_outro_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_single_post_illustration_outro_displayed',
        array(
            'section' => 'pt_single_post',
            'label' => __('Display an illustration.', 'propaganda-customizer-instruction'),
        )
    ));

    // Illustration
    $wp_customize->add_setting(
        'pt_single_post_illustration_outro',
        array(
            'default' => 'tetris-cube',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_single_post_illustration_outro',
        array(
            'type' => 'select',
            'section' => 'pt_single_post',
            'label' => __('Illustration', 'propaganda-customizer-instruction'),
            'description' => __('Illustration displayed in the Outro section in Post articles.', 'propaganda-customizer-instruction'),
            'choices' => $illustrations,
        )
    );

    // Separator
    separator('pt_single_post_outro_separator_1', 'pt_single_post', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_single_post_outro_title', array(
        'default' => 'Вы должны увидеть это',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_post_outro_title',
        array(
            'type' => 'text',
            'section' => 'pt_single_post',
            'settings' => 'pt_single_post_outro_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h3 of the Outro section in Post articles.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_single_post_outro_separator_2', 'pt_single_post', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_single_post_button_label', array(
        'default' => 'я куда-то веду',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_post_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_single_post',
            'settings' => 'pt_single_post_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button of the Outro section in Post articles.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_single_post_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_post_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_single_post',
            'settings' => 'pt_single_post_button_link',
            'label' => __('Button Link', 'propaganda-customizer-instruction'),
            'description' => __('Link for the button of the Outro section in Post articles.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Related Posts Options ------------
    custom_heading('pt_single_post_heading_related', 'pt_single_post', 'Related Posts Options', $wp_customize);

    // Enable Related Posts
    $wp_customize->add_setting(
        'pt_single_post_related',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_single_post_related',
        array(
            'section' => 'pt_single_post',
            'label' => __('Related Posts?', 'propaganda-customizer-instruction'),
            'description' => __('Display the related posts in Post articles.', 'propaganda-customizer-instruction'),
        )
    ));

    // Separator
    separator('pt_single_post_related_separator', 'pt_single_post', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_single_post_related_title', array(
        'default' => 'Related Posts',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_post_related_title',
        array(
            'type' => 'text',
            'section' => 'pt_single_post',
            'settings' => 'pt_single_post_related_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h2 of the Related Posts section in Post articles.', 'propaganda-customizer-instruction'),
        )
    );


    /* CLIENT - SINGLE
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_single_client', array(
        'panel' => 'pt_theme_options',
        'title' => __('Client - Single', 'propaganda-customizer-instruction'),
        'description' => __('Options related to Client pages.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_single_client_background_color', '.client .inner-article', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_single_client_heading_general', 'pt_single_client', 'General Options', $wp_customize);

    // Background Color
    $wp_customize->add_setting(
        'pt_single_client_background_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_client_background_color',
        array(
            'section' => 'pt_single_client',
            'label' => __('Background Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the background of Client pages.', 'propaganda-customizer-instruction'),
        )
    ));

    // Elements Color
    $wp_customize->add_setting(
        'pt_single_client_elements_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_client_elements_color',
        array(
            'section' => 'pt_single_client',
            'label' => __('Elements Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of all the elements of Client pages, such as buttons or some titles.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Intro Options ------------
    custom_heading('pt_single_client_heading_intro', 'pt_single_client', 'Intro Options', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_single_client_intro_button_label', array(
        'default' => 'Посмотреть результат',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_client_intro_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_single_client',
            'settings' => 'pt_single_client_intro_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button of the Intro section in Client pages.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Outro Options ------------
    custom_heading('pt_single_client_heading_outro', 'pt_single_client', 'Outro Section Options', $wp_customize);

    // Display Illustration
    $wp_customize->add_setting(
        'pt_single_client_illustration_outro_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_single_client_illustration_outro_displayed',
        array(
            'section' => 'pt_single_client',
            'label' => __('Display an illustration.', 'propaganda-customizer-instruction'),
        )
    ));

    // Illustration
    $wp_customize->add_setting(
        'pt_single_client_illustration_outro',
        array(
            'default' => 'tetris-cube',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_single_client_illustration_outro',
        array(
            'type' => 'select',
            'section' => 'pt_single_client',
            'label' => __('Illustration', 'propaganda-customizer-instruction'),
            'description' => __('Illustration displayed in the Outro section in Client pages.', 'propaganda-customizer-instruction'),
            'choices' => $illustrations,
        )
    );

    // Separator
    separator('pt_single_client_outro_separator_1', 'pt_single_client', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_single_client_outro_title', array(
        'default' => 'Вы должны увидеть это',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_client_outro_title',
        array(
            'type' => 'text',
            'section' => 'pt_single_client',
            'settings' => 'pt_single_client_outro_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h3 of the Outro section in Client pages.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_single_client_outro_separator_2', 'pt_single_client', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_single_client_button_label', array(
        'default' => 'я куда-то веду',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_client_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_single_client',
            'settings' => 'pt_single_client_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button of the Outro section in Client pages.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_single_client_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_client_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_single_client',
            'settings' => 'pt_single_client_button_link',
            'label' => __('Button Link', 'propaganda-customizer-instruction'),
            'description' => __('Link for the button of the Outro section in Client pages.', 'propaganda-customizer-instruction'),
        )
    );


    /* PROJECT - ARCHIVE
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_archive_project', array(
        'panel' => 'pt_theme_options',
        'title' => __('Project - Archive', 'propaganda-customizer-instruction'),
        'description' => __('Options related to the Project archive page.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_archive_project_general_color', '#projects-content .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_archive_project_heading_general', 'pt_archive_project', 'General Options', $wp_customize);

    // Elements Color
    $wp_customize->add_setting(
        'pt_archive_project_general_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_archive_project_general_color',
        array(
            'section' => 'pt_archive_project',
            'label' => __('General Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of all the elements of the Project archive page.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Intro Options ------------
    custom_heading('pt_archive_project_heading_intro', 'pt_archive_project', 'Intro Options', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_archive_project_title', array(
        'default' => 'проекты',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_project_title',
        array(
            'type' => 'text',
            'section' => 'pt_archive_project',
            'settings' => 'pt_archive_project_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h1 of the Hero of the Project archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_archive_project_subtitle', array(
        'default' => 'чего ты добился, товарищ',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_project_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_archive_project',
            'settings' => 'pt_archive_project_subtitle',
            'label' => __('Subtitle', 'propaganda-customizer-instruction'),
            'description' => __('Text for the subtitle h2 of the Hero of the Project archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Outro Options ------------
    custom_heading('pt_archive_project_heading_outro', 'pt_archive_project', 'Outro Section Options', $wp_customize);

    // Display Illustration
    $wp_customize->add_setting(
        'pt_archive_project_illustration_outro_displayed',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_archive_project_illustration_outro_displayed',
        array(
            'section' => 'pt_archive_project',
            'label' => __('Display an illustration.', 'propaganda-customizer-instruction'),
        )
    ));

    // Illustration
    $wp_customize->add_setting(
        'pt_archive_project_illustration_outro',
        array(
            'default' => 'tetris-cube',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_archive_project_illustration_outro',
        array(
            'type' => 'select',
            'section' => 'pt_archive_project',
            'label' => __('Illustration', 'propaganda-customizer-instruction'),
            'description' => __('Illustration displayed in the Outro section of the Project archive page.', 'propaganda-customizer-instruction'),
            'choices' => $illustrations,
        )
    );

    // Separator
    separator('pt_archive_project_outro_separator_1', 'pt_archive_project', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_archive_project_outro_title', array(
        'default' => 'Вы должны увидеть это',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_project_outro_title',
        array(
            'type' => 'text',
            'section' => 'pt_archive_project',
            'settings' => 'pt_archive_project_outro_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h3 of the Outro section of the Project archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_archive_project_outro_separator_2', 'pt_archive_project', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_archive_project_button_label', array(
        'default' => 'я куда-то веду',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_project_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_archive_project',
            'settings' => 'pt_archive_project_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button of the Outro section of the Project archive page.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_archive_project_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_archive_project_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_archive_project',
            'settings' => 'pt_archive_project_button_link',
            'label' => __('Button Link', 'propaganda-customizer-instruction'),
            'description' => __('Link for the button of the Outro section of the Project archive page.', 'propaganda-customizer-instruction'),
        )
    );


    /* PROJECT - SINGLE
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_single_project', array(
        'panel' => 'pt_theme_options',
        'title' => __('Project - Single', 'propaganda-customizer-instruction'),
        'description' => __('Options related to Project pages.', 'propaganda-customizer-instruction'),
    ));

    // Shortcut
    shortcut('pt_single_project_background_color', '.project .inner-article', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_single_project_heading_general', 'pt_single_project', 'General Options', $wp_customize);

    // Background Color
    $wp_customize->add_setting(
        'pt_single_project_background_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_project_background_color',
        array(
            'section' => 'pt_single_project',
            'label' => __('Background Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of the background of Project pages.', 'propaganda-customizer-instruction'),
        )
    ));

    // Elements Color
    $wp_customize->add_setting(
        'pt_single_project_elements_color',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_single_project_elements_color',
        array(
            'section' => 'pt_single_project',
            'label' => __('Elements Color', 'propaganda-customizer-instruction'),
            'description' => __('Color of all the elements of Project pages, such as buttons or some titles.', 'propaganda-customizer-instruction'),
        )
    ));

    // ------------ Intro Options ------------
    custom_heading('pt_single_project_heading_intro', 'pt_single_project', 'Intro Options', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_single_project_intro_button_label', array(
        'default' => 'Посмотреть результат',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_project_intro_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_single_project',
            'settings' => 'pt_single_project_intro_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button of the Intro section in Project pages.', 'propaganda-customizer-instruction'),
        )
    );

    // ------------ Outro Options ------------
    custom_heading('pt_single_project_heading_outro', 'pt_single_project', 'Outro Section Options', $wp_customize);

    // Display Illustration
    $wp_customize->add_setting(
        'pt_single_project_illustration_outro_displayed',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_single_project_illustration_outro_displayed',
        array(
            'section' => 'pt_single_project',
            'label' => __('Display an illustration.', 'propaganda-customizer-instruction'),
        )
    ));

    // Illustration
    $wp_customize->add_setting(
        'pt_single_project_illustration_outro',
        array(
            'default' => 'tetris-cube',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_single_project_illustration_outro',
        array(
            'type' => 'select',
            'section' => 'pt_single_project',
            'label' => __('Illustration', 'propaganda-customizer-instruction'),
            'description' => __('Illustration displayed in the Outro section in Project pages.', 'propaganda-customizer-instruction'),
            'choices' => $illustrations,
        )
    );

    // Separator
    separator('pt_single_project_outro_separator_1', 'pt_single_project', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_single_project_outro_title', array(
        'default' => 'Вы должны увидеть это',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_project_outro_title',
        array(
            'type' => 'text',
            'section' => 'pt_single_project',
            'settings' => 'pt_single_project_outro_title',
            'label' => __('Title', 'propaganda-customizer-instruction'),
            'description' => __('Text for the title h3 of the Outro section in Project pages.', 'propaganda-customizer-instruction'),
        )
    );

    // Separator
    separator('pt_single_project_outro_separator_2', 'pt_single_project', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_single_project_button_label', array(
        'default' => 'я куда-то веду',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_project_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_single_project',
            'settings' => 'pt_single_project_button_label',
            'label' => __('Button Label', 'propaganda-customizer-instruction'),
            'description' => __('Text for the button of the Outro section in Project pages.', 'propaganda-customizer-instruction'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_single_project_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_single_project_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_single_project',
            'settings' => 'pt_single_project_button_link',
            'label' => __('Button Link', 'propaganda-customizer-instruction'),
            'description' => __('Link for the button of the Outro section in Project pages.', 'propaganda-customizer-instruction'),
        )
    );
}
add_action('customize_register', 'theme_customize_register');
