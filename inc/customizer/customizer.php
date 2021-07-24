<?php

function theme_customize_register($wp_customize)
{
    require get_template_directory() . '/inc/customizer/customizer-custom-functions.php';
    require get_template_directory() . '/inc/customizer/customizer-custom-controls.php';

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
                'label' => __($label, 'propaganda'),
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
        'label' => 'Primary Color',
    )));

    $wp_customize->add_setting('secondary_color', array(
        'default' => '#fc8686',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'section' => 'colors',
        'settings' => 'secondary_color',
        'label' => 'Secondary Color',
    )));

    /* #2 THEME OPTIONS
    --------------------------------------------------------------- */

    $wp_customize->add_panel(
        'pt_theme_options',
        array(
            'title' => __('Theme Options', 'propaganda'),
            'description' => __('Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'propaganda'),
        )
    );

    /* HEADER
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_header', array(
        'panel' => 'pt_theme_options',
        'title' => __('Header', 'propaganda'),
        'description' => __('Options related to the Header.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_header_position', 'header .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_header_heading_general', 'pt_header', 'General Option', $wp_customize);

    // Position 
    $wp_customize->add_setting('pt_header_position', array(
        'default' => __(false, 'propaganda'),
        'sanitize_callback' => 'pt_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'pt_header_position',
        array(
            'type' => 'checkbox',
            'section' => 'pt_header',
            'settings' => 'pt_header_position',
            'label' => __('Is the Header fixed?', 'propaganda'),
            'description' => __('Yes if the checkbox is checked.', 'propaganda'),
        )
    );

    // Color
    $wp_customize->add_setting(
        'pt_header_general_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_header_general_color',
        array(
            'section' => 'pt_header',
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the logo and the button in the Header.', 'propaganda'),
        )
    ));

    // ------------ Logo Options ------------
    custom_heading('pt_header_heading_logo', 'pt_header', 'Logo Option', $wp_customize);

    // Logo Upload
    $wp_customize->add_setting('pt_header_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'pt_header_logo',
        array(
            'section' => 'pt_header',
            'settings' => 'pt_header_logo',
            'label' => 'Upload Logo',
            'description' => __('Logo for the website, in the Header and the Footer.', 'propaganda'),
            'button_labels' => array(
                'select' => 'Select Logo',
                'remove' => 'Remove Logo',
                'change' => 'Change Logo',
            ),
        )
    ));

    // Animation Duration
    $wp_customize->add_setting('pt_header_logo_width', array(
        'default' => __('200', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_header_logo_width',
        array(
            'type' => 'number',
            'section' => 'pt_header',
            'settings' => 'pt_header_logo_width',
            'label' => __('Width of the logo', 'propaganda'),
            'description' => __('Width (in pixels) of the image logo in the Header.', 'propaganda'),
        )
    );

    // Logo HTML or Image
    $wp_customize->add_setting(
        'pt_header_logo_is_html',
        array(
            'default' => true,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_header_logo_is_html',
        array(
            'section' => 'pt_header',
            'label' => __('Do you want the logo in HTML?', 'propaganda'),
            'description' => __('Enable the logo in HTML and hide the logo image.'),
        )
    ));

    // Logo HTML
    $wp_customize->add_setting('pt_header_logo_html', array(
        'default' => __('Alan<span>Turing</span>.com', 'propaganda'),
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_header_logo_html',
        array(
            'type' => 'textarea',
            'section' => 'pt_header',
            'settings' => 'pt_header_logo_html',
            'label' => __('Logo HTML', 'propaganda'),
            'description' => __('Write whatever you want. Put the characters you want highlighted bewteen &lt;span&gt;&lt;/span&gt;.', 'propaganda'),
        )
    );

    // ------------ Menu Options ------------
    custom_heading('pt_header_heading_menu', 'pt_header', 'Menu Option', $wp_customize);

    // Notice
    $wp_customize->add_setting('pt_header_menu', array());

    $wp_customize->add_control(new PT_Notice_Custom_Control(
        $wp_customize,
        'pt_header_menu',
        array(
            'section' => 'pt_header',
            'description' => __('You can change the menu <a href="?autofocus[panel]=nav_menus">here</a>.', 'propaganda'),
        )
    ));

    // ------------ Button Options ------------
    custom_heading('pt_header_heading_button', 'pt_header', 'Button Option', $wp_customize);

    // Button Label
    $wp_customize->add_setting('pt_header_button_label', array(
        'default' => __('Click me!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_header_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_header',
            'settings' => 'pt_header_button_label',
            'label' => __('Button Label', 'propaganda'),
            'description' => __('Text for the button in the Header.', 'propaganda'),
        )
    );

    // Button Link
    $wp_customize->add_setting('pt_header_button_link', array(
        'default' => __('#', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_header_button_link',
        array(
            'type' => 'text',
            'section' => 'pt_header',
            'settings' => 'pt_header_button_link',
            'label' => __('Button Link', 'propaganda'),
            'description' => __('Link for the button in the header', 'propaganda'),
        )
    );

    // Button Link External
    $wp_customize->add_setting('pt_header_button_external', array(
        'default' => __(false, 'propaganda'),
        'sanitize_callback' => 'pt_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'pt_header_button_external',
        array(
            'type' => 'checkbox',
            'section' => 'pt_header',
            'settings' => 'pt_header_button_external',
            'label' => __('Is this button external?', 'propaganda'),
            'description' => __('Yes if the checkbox is checked.', 'propaganda'),
        )
    );

    /* HOMEPAGE - HERO SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_hero', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Hero Section', 'propaganda'),
        'description' => __('Options related to the Hero section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_hero_background', '#hp-hero .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_hero_heading_general', 'pt_hero', 'General Option', $wp_customize);

    // Background
    $wp_customize->add_setting(
        'pt_hero_background',
        array(
            'default' => 'fish-scales',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_hero_background',
        array(
            'type' => 'select',
            'section' => 'pt_hero',
            'label' => __('Background Pattern'),
            'description' => __('Background pattern for the Hero'),
            'choices' => $svg_patterns,
        )
    );

    // Animation
    $wp_customize->add_setting(
        'pt_hero_background_animation',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Basic_Custom_Control(
        $wp_customize,
        'pt_hero_background_animation',
        array(
            'section' => 'pt_hero',
            'label' => __('Animate the background?', 'propaganda'),
            'description' => __('Enable the animation of the rotation of the background'),
        )
    ));

    // Animation Duration
    $wp_customize->add_setting('pt_hero_background_duration', array(
        'default' => __('60', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_hero_background_duration',
        array(
            'type' => 'number',
            'section' => 'pt_hero',
            'settings' => 'pt_hero_background_duration',
            'label' => __('Duration of the background animation', 'propaganda'),
            'description' => __('Number for the duration of the animation for a full circle (in seconds).', 'propaganda'),
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
            'label' => __('Transform Position'),
            'description' => __('Position of the rotating axis of the animation of the background.'),
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
            'label' => __('Alignment'),
            'description' => __('Alignment for the elements in the Hero'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // ------------ Title Options ------------
    custom_heading('pt_hero_heading_titles', 'pt_hero', 'Titles Option', $wp_customize);

    // Title
    $wp_customize->add_setting('pt_hero_title', array(
        'default' => __('Hello there!', 'propaganda'),
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_hero_title',
        array(
            'type' => 'textarea',
            'section' => 'pt_hero',
            'settings' => 'pt_hero_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h1 of the Hero. &lt;br&gt; are accepted.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_hero_subtitle', array(
        'default' => __('Let me explain why I\'m the best', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_hero_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_hero',
            'settings' => 'pt_hero_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h2 of the Hero.', 'propaganda'),
        )
    );

    // ------------ Button Options ------------
    custom_heading('pt_hero_heading_buttons', 'pt_hero', 'Button Option', $wp_customize);

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
                'label' => __('Display the Button ' . $count, 'propaganda'),
            )
        ));

        // Button Label
        $wp_customize->add_setting('pt_hero_button_label_' . $count, array(
            'default' => __('I lead somewhere', 'propaganda'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_hero_button_label_' . $count,
            array(
                'type' => 'text',
                'section' => 'pt_hero',
                'settings' => 'pt_hero_button_label_' . $count,
                'label' => __('Button  ' . $count . ' Label', 'propaganda'),
                'description' => __('Text for the Button ' . $count . ' in the Hero.', 'propaganda'),
            )
        );

        // Button Link
        $wp_customize->add_setting('pt_hero_button_link_' . $count, array(
            'default' => __('#', 'propaganda'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_hero_button_link_' . $count,
            array(
                'type' => 'text',
                'section' => 'pt_hero',
                'settings' => 'pt_hero_button_link_' . $count,
                'label' => __('Button  ' . $count . ' Link', 'propaganda'),
                'description' => __('Link for the Button ' . $count . ' in the Hero', 'propaganda'),
            )
        );

        // Button Link External
        $wp_customize->add_setting('pt_hero_button_external_' . $count, array(
            'default' => __(false, 'propaganda'),
            'sanitize_callback' => 'pt_sanitize_checkbox',
        ));

        $wp_customize->add_control(
            'pt_hero_button_external_' . $count,
            array(
                'type' => 'checkbox',
                'section' => 'pt_hero',
                'settings' => 'pt_hero_button_external_' . $count,
                'label' => __('Is this button external?', 'propaganda'),
                'description' => __('Yes if the checkbox is checked.', 'propaganda'),
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
            'label' => __('Button 2 Color', 'propaganda'),
            'description' => __('Is the button\'s color "Primary" or "Secondary".', 'propaganda'),
        )
    ));

    /* HOMEPAGE - SKILLS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_skills', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Skills Section', 'propaganda'),
        'description' => __('Options related to the Skills section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_skills_heading_alignment', '#hp-skills .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_skills_heading_general', 'pt_skills', 'General Option', $wp_customize);

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
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the title h2 and the elements of the grid in the Skills section.', 'propaganda'),
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
            'label' => __('Show fully the section.', 'propaganda'),
        )
    ));

    // Button Label
    $wp_customize->add_setting('pt_skills_button_label', array(
        'default' => __('Show me the rest!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_button_label',
            'label' => __('Button Label', 'propaganda'),
            'description' => __('Text for the button in the Skills section.', 'propaganda'),
        )
    );

    // ------------ Headings Options ------------
    custom_heading('pt_skills_heading_headings', 'pt_skills', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Skills section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_skills_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Skills section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_skills_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Skills section.', 'propaganda'),
        )
    );

    // ------------ Subsection Options ------------
    custom_heading('pt_skills_heading_subsection', 'pt_skills', 'Subsection Option', $wp_customize);

    // Subtitle
    $wp_customize->add_setting('pt_skills_subsection_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_subsection_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_subsection_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the subsection of the Skills section.', 'propaganda'),
        )
    );

    // Separator
    separator('pt_skills_subsection_separator_1', 'pt_skills', $wp_customize);

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
            'label' => __('Display a contact form?', 'propaganda'),
        )
    ));

    // Skills Form Shortcode ID
    $wp_customize->add_setting('pt_skills_cf_shortcode', array(
        'default' => __('1', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_skills_cf_shortcode',
        array(
            'type' => 'number',
            'section' => 'pt_skills',
            'settings' => 'pt_skills_cf_shortcode',
            'label' => __('Skills Form Shortcode ID', 'propaganda'),
            'description' => __('Insert the ID of the shortcode of the Skills Section. Download the plugin <a target="_blank" href="https://fr.wordpress.org/plugins/contact-form-7/">here</a>.', 'propaganda'),
        )
    );

    /* HOMEPAGE - INFORMATIONS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_informations', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Informations Section', 'propaganda'),
        'description' => __('Options related to the Informations section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_informations_heading_alignment', '#hp-informations .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_informations_heading_general', 'pt_informations', 'General Option', $wp_customize);

    // Block Color
    $wp_customize->add_setting(
        'pt_informations_block_color',
        array(
            'default' => false,
            'sanitize_callback' => 'pt_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(new PT_Toggle_Color_Custom_Control(
        $wp_customize,
        'pt_informations_block_color',
        array(
            'section' => 'pt_informations',
            'label' => __('Block Color', 'propaganda'),
            'description' => __('Color for block in the Informations section.', 'propaganda'),
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
            'label' => __('Offset Color', 'propaganda'),
            'description' => __('Color for offset block in the Informations section.', 'propaganda'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_informations_heading_headings', 'pt_informations', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Informations section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_informations_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Informations section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_informations_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Informations section.', 'propaganda'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_informations_heading_content', 'pt_informations', 'Content Option', $wp_customize);

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
            'label' => 'Upload Profile Picture',
            'description' => __('Profile picture in the Informations section.', 'propaganda'),
            'button_labels' => array(
                'select' => 'Select Profile Picture',
                'remove' => 'Remove Profile Picture',
                'change' => 'Change Profile Picture',
            ),
        )
    ));

    // Profile Tooltip
    $wp_customize->add_setting('pt_informations_profile_tooltip', array(
        'default' => __('Handsome!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_informations_profile_tooltip',
        array(
            'type' => 'text',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_profile_tooltip',
            'label' => __('Tooltip', 'propaganda'),
            'description' => __('Text for the tooltip of the profile picture in the Informations section.', 'propaganda'),
        )
    );

    // Separator
    separator('pt_informations_content_separator_1', 'pt_informations', $wp_customize);

    // Description
    $wp_customize->add_setting('pt_informations_description', array(
        'default' => __('Alan Mathison Turing was an English mathematician, computer scientist, logician, cryptanalyst, philosopher, and theoretical biologist. Turing was highly influential in the development of theoretical computer science, providing a formalisation of the concepts of algorithm and computation with the Turing machine, which can be considered a model of a general-purpose computer. Turing is widely considered to be the father of theoretical computer science and artificial intelligence.', 'propaganda'),
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_informations_description',
        array(
            'type' => 'textarea',
            'section' => 'pt_informations',
            'settings' => 'pt_informations_description',
            'label' => __('Description', 'propaganda'),
            'description' => __('Text for the description in the Informations section. &lt;br&gt; are accepted.', 'propaganda'),
        )
    );

    // Separator
    separator('pt_informations_content_separator_2', 'pt_informations', $wp_customize);

    for ($count = 1; $count <= 2; $count++) {

        // Title
        $wp_customize->add_setting('pt_informations_col_' . $count . '_title', array(
            'default' => __('What a title!', 'propaganda'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_informations_col_' . $count . '_title',
            array(
                'type' => 'text',
                'section' => 'pt_informations',
                'settings' => 'pt_informations_col_' . $count . '_title',
                'label' => __('Column ' . $count . ' - Title', 'propaganda'),
                'description' => __('Text for the title of the column ' . $count . ' in the Informations section.', 'propaganda'),
            )
        );
        if ($count != 2) {
            // Separator
            separator('pt_informations_content_separator_3', 'pt_informations', $wp_customize);
        }
    }

    /* HOMEPAGE - BENEFITS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_benefits', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Benefits Section', 'propaganda'),
        'description' => __('Options related to the Benefits section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_benefits_heading_alignment', '#hp-benefits .container', $wp_customize);

    // ------------ Headings Options ------------
    custom_heading('pt_benefits_heading_headings', 'pt_benefits', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Benefits section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
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
            'label' => __('Heading Color', 'propaganda'),
            'description' => __('Color for the title h2 in the Benefits section.', 'propaganda'),
        )
    ));

    // Title
    $wp_customize->add_setting('pt_benefits_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_benefits_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_benefits',
            'settings' => 'pt_benefits_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Benefits section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_benefits_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_benefits_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_benefits',
            'settings' => 'pt_benefits_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Benefits section.', 'propaganda'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_benefits_heading_content', 'pt_benefits', 'Content Option', $wp_customize);

    for ($count = 1; $count <= 4; $count++) {

        // Icon
        $wp_customize->add_setting(
            'pt_benefits_content_' . $count . '_icon',
            array(
                'default' => 'hot-air-balloon',
                'sanitize_callback' => 'pt_sanitize_select'
            )
        );

        $wp_customize->add_control(
            'pt_benefits_content_' . $count . '_icon',
            array(
                'type' => 'select',
                'section' => 'pt_benefits',
                'label' => __('Icon ' . $count),
                'description' => __('Icon of the item ' . $count . ' in the Benefits section.'),
                'choices' => $icons,
            )
        );

        // Title
        $wp_customize->add_setting('pt_benefits_content_' . $count . '_title', array(
            'default' => __('Wow', 'propaganda'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_benefits_content_' . $count . '_title',
            array(
                'type' => 'text',
                'section' => 'pt_benefits',
                'settings' => 'pt_benefits_content_' . $count . '_title',
                'label' => __('Title ' . $count, 'propaganda'),
                'description' => __('Title of the item ' . $count . ' in the Benefits section.', 'propaganda'),
            )
        );

        // Subtitle
        $wp_customize->add_setting('pt_benefits_content_' . $count . '_subtitle', array(
            'default' => __('Why I\'m the best', 'propaganda'),
            'sanitize_callback' => 'pt_sanitize_textarea',
        ));

        $wp_customize->add_control(
            'pt_benefits_content_' . $count . '_subtitle',
            array(
                'type' => 'textarea',
                'section' => 'pt_benefits',
                'settings' => 'pt_benefits_content_' . $count . '_subtitle',
                'label' => __('Subtitle ' . $count, 'propaganda'),
                'description' => __('The subtitle of the item ' . $count . ' in the Benefits section.', 'propaganda'),
            )
        );

        if ($count != 4) {
            // Separator
            separator('pt_benefits_content_separator_' . $count, 'pt_benefits', $wp_customize);
        }
    }

    /* HOMEPAGE - CLIENTS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_clients', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Clients Section', 'propaganda'),
        'description' => __('Options related to the Clients section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_clients_heading_alignment', '#hp-clients .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_clients_heading_general', 'pt_clients', 'General Option', $wp_customize);

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
            'label' => __('Heading Color', 'propaganda'),
            'description' => __('Color for the title h2 in the Clients section.', 'propaganda'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_clients_heading_headings', 'pt_clients', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Clients section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_clients_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_clients_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_clients',
            'settings' => 'pt_clients_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Clients section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_clients_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_clients_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_clients',
            'settings' => 'pt_clients_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Clients section.', 'propaganda'),
        )
    );

    /* HOMEPAGE - TESTIMONIALS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_testimonials', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Testimonials Section', 'propaganda'),
        'description' => __('Options related to the Testimonials section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_testimonials_heading_alignment', '#hp-testimonials .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_testimonials_heading_general', 'pt_testimonials', 'General Option', $wp_customize);

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
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the title h2 and the testimonials in the Testimonials section.', 'propaganda'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_testimonials_heading_headings', 'pt_testimonials', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Testimonials section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_testimonials_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_testimonials_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_testimonials',
            'settings' => 'pt_testimonials_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Testimonials section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_testimonials_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_testimonials_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_testimonials',
            'settings' => 'pt_testimonials_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Testimonials section.', 'propaganda'),
        )
    );

    /* HOMEPAGE - PROJECTS SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_projects', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Projects Section', 'propaganda'),
        'description' => __('Options related to the Projects section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_projects_general_color', '#projects-preview', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_projects_heading_general', 'pt_projects', 'General Option', $wp_customize);

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
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the title h2 and the button in the Projects section.', 'propaganda'),
        )
    ));

    // Displayed Items
    $wp_customize->add_setting('pt_projects_items', array(
        'default' => __('5', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_items',
        array(
            'type' => 'number',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_items',
            'label' => __('Number of items displayed', 'propaganda'),
            'description' => __('Number of items that this section will display.', 'propaganda'),
        )
    );

    // Button Label
    $wp_customize->add_setting('pt_projects_button_label', array(
        'default' => __('Show me the rest!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_button_label',
            'label' => __('Button Label', 'propaganda'),
            'description' => __('Text for the button in the Projects section.', 'propaganda'),
        )
    );

    // ------------ Headings Options ------------
    custom_heading('pt_projects_heading_headings', 'pt_projects', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Projects section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_projects_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Projects section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_projects_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_projects_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_projects',
            'settings' => 'pt_projects_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Projects section.', 'propaganda'),
        )
    );

    /* HOMEPAGE - BLOG SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_blog', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Blog Section', 'propaganda'),
        'description' => __('Options related to the Blog section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_blog_general_color', '#blog-preview', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_blog_heading_general', 'pt_blog', 'General Option', $wp_customize);

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
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the title h2 and the button in the Blog section.', 'propaganda'),
        )
    ));

    // Button Label
    $wp_customize->add_setting('pt_blog_button_label', array(
        'default' => __('Show me the rest!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_blog_button_label',
        array(
            'type' => 'text',
            'section' => 'pt_blog',
            'settings' => 'pt_blog_button_label',
            'label' => __('Button Label', 'propaganda'),
            'description' => __('Text for the button in the Blog section.', 'propaganda'),
        )
    );

    // ------------ Headings Options ------------
    custom_heading('pt_blog_heading_headings', 'pt_blog', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Blog section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_blog_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_blog_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_blog',
            'settings' => 'pt_blog_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Blog section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_blog_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_blog_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_blog',
            'settings' => 'pt_blog_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Blog section.', 'propaganda'),
        )
    );

    /* HOMEPAGE - CONTACT SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_contact', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Contact Section', 'propaganda'),
        'description' => __('Options related to the Contact section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_contact_heading_headings', '#contact .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_contact_heading_general', 'pt_contact', 'General Option', $wp_customize);

    // Background
    $wp_customize->add_setting(
        'pt_contact_background',
        array(
            'default' => 'seigaiha',
            'sanitize_callback' => 'pt_sanitize_select'
        )
    );

    $wp_customize->add_control(
        'pt_contact_background',
        array(
            'type' => 'select',
            'section' => 'pt_contact',
            'label' => __('Background Pattern'),
            'description' => __('Background pattern for the Contact'),
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
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the title h2, the labels and the button in the Contact section.', 'propaganda'),
        )
    ));

    // ------------ Headings Options ------------
    custom_heading('pt_contact_heading_headings', 'pt_contact', 'Headings Option', $wp_customize);

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
            'label' => __('Alignment'),
            'description' => __('Alignment for the headings in the Contact section.'),
            'choices' => array(
                'left' => __('Left'),
                'center' => __('Center'),
                'right' => __('Right')
            )
        )
    ));

    // Title
    $wp_customize->add_setting('pt_contact_heading_title', array(
        'default' => __('Interesting', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_heading_title',
        array(
            'type' => 'text',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_heading_title',
            'label' => __('Title', 'propaganda'),
            'description' => __('Text for the title h2 in the Contact section.', 'propaganda'),
        )
    );

    // Subtitle
    $wp_customize->add_setting('pt_contact_heading_subtitle', array(
        'default' => __('What a title!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_heading_subtitle',
        array(
            'type' => 'text',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_heading_subtitle',
            'label' => __('Subtitle', 'propaganda'),
            'description' => __('Text for the subtitle h3 in the Contact section.', 'propaganda'),
        )
    );

    // ------------ Content Options ------------
    custom_heading('pt_contact_heading_content', 'pt_contact', 'Content Option', $wp_customize);

    // Description
    $wp_customize->add_setting('pt_contact_description', array(
        'default' => __('Alan Mathison Turing was an English mathematician, computer scientist, logician, cryptanalyst, philosopher, and theoretical biologist. Turing was highly influential in the development of theoretical computer science, providing a formalisation of the concepts of algorithm and computation with the Turing machine, which can be considered a model of a general-purpose computer. Turing is widely considered to be the father of theoretical computer science and artificial intelligence.', 'propaganda'),
        'sanitize_callback' => 'pt_sanitize_textarea',
    ));

    $wp_customize->add_control(
        'pt_contact_description',
        array(
            'type' => 'textarea',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_description',
            'label' => __('Description', 'propaganda'),
            'description' => __('Text for the description in the Contact section. &lt;br&gt; are accepted.', 'propaganda'),
        )
    );

    // Email
    $wp_customize->add_setting('pt_contact_email', array(
        'default' => __('hello@website.com', 'propaganda'),
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control(
        'pt_contact_email',
        array(
            'type' => 'email',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_email',
            'label' => __('Email', 'propaganda'),
            'description' => __('Your email address for the Contact section.', 'propaganda'),
        )
    );

    // Phone
    $wp_customize->add_setting('pt_contact_phone', array(
        'default' => __('118 712', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_phone',
        array(
            'type' => 'text',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_phone',
            'label' => __('Phone', 'propaganda'),
            'description' => __('Your phone number for the Contact section.', 'propaganda'),
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
            'label' => __('Icon'),
            'description' => __('Icon displayed in the Contact section'),
            'choices' => $icons,
        )
    );

    // ------------ Contact Options ------------
    custom_heading('pt_contact_heading_contact', 'pt_contact', 'Contact Option', $wp_customize);

    // Contact Form Shortcode ID
    $wp_customize->add_setting('pt_contact_cf_shortcode', array(
        'default' => __('1', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_contact_cf_shortcode',
        array(
            'type' => 'number',
            'section' => 'pt_contact',
            'settings' => 'pt_contact_cf_shortcode',
            'label' => __('Contact Form Shortcode ID', 'propaganda'),
            'description' => __('Insert the ID of the shortcode of the Contact Form. Download the plugin <a target="_blank" href="https://fr.wordpress.org/plugins/contact-form-7/">here</a>.', 'propaganda'),
        )
    );

    /* HOMEPAGE - MARQUEE SECTION
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_marquee', array(
        'panel' => 'pt_theme_options',
        'title' => __('Homepage - Marquee Section', 'propaganda'),
        'description' => __('Options related to the Marquee section on the homepage.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_marquee_general_color', '#marquee', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_marquee_heading_general', 'pt_marquee', 'General Option', $wp_customize);

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
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the background of the Marquee.', 'propaganda'),
        )
    ));

    // ------------ Content Options ------------
    custom_heading('pt_marquee_heading_content', 'pt_marquee', 'Content Option', $wp_customize);

    // Content
    $wp_customize->add_setting('pt_marquee_content', array(
        'default' => __('Here is some message!', 'propaganda'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        'pt_marquee_content',
        array(
            'type' => 'textarea',
            'section' => 'pt_marquee',
            'settings' => 'pt_marquee_content',
            'label' => __('Content', 'propaganda'),
            'description' => __('Text for the Marquee.', 'propaganda'),
        )
    );

    // Uppercase
    $wp_customize->add_setting('pt_marquee_content_uppercase', array(
        'default' => __(false, 'propaganda'),
        'sanitize_callback' => 'pt_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'pt_marquee_content_uppercase',
        array(
            'type' => 'checkbox',
            'section' => 'pt_marquee',
            'settings' => 'pt_marquee_content_uppercase',
            'label' => __('Is the content in uppercase?', 'propaganda'),
            'description' => __('Yes if the checkbox is checked.', 'propaganda'),
        )
    );

    /* FOOTER
    --------------------------------------------------------------- */
    $wp_customize->add_section('pt_footer', array(
        'panel' => 'pt_theme_options',
        'title' => __('Footer', 'propaganda'),
        'description' => __('Options related to the Footer.', 'propaganda'),
    ));

    // Shortcut
    shortcut('pt_footer_general_color', 'footer .container', $wp_customize);

    // ------------ General Options ------------
    custom_heading('pt_footer_heading_general', 'pt_footer', 'General Option', $wp_customize);

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
            'label' => __('General Color', 'propaganda'),
            'description' => __('Color for the lists and the social buttons in the Footer.', 'propaganda'),
        )
    ));

    // ------------ Menu Options ------------
    custom_heading('pt_footer_heading_menu', 'pt_footer', 'Menu Option', $wp_customize);

    // Notice
    $wp_customize->add_setting('pt_footer_menu', array());

    $wp_customize->add_control(new PT_Notice_Custom_Control(
        $wp_customize,
        'pt_footer_menu',
        array(
            'section' => 'pt_footer',
            'description' => __('You can change the menus <a href="?autofocus[panel]=nav_menus">here</a>.', 'propaganda'),
        )
    ));

    // Title 1 --> 3
    for ($count = 1; $count <= 3; $count++) {

        $wp_customize->add_setting('pt_footer_title_' . $count, array(
            'default' => __('What a title!', 'propaganda'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            'pt_footer_title_' . $count,
            array(
                'type' => 'text',
                'section' => 'pt_footer',
                'settings' => 'pt_footer_title_' . $count,
                'label' => __('Column ' . $count . ' -  Title', 'propaganda'),
                'description' => __('Title of the column ' . $count . ' in the Footer.', 'propaganda'),
            )
        );
    }
}
add_action('customize_register', 'theme_customize_register');
