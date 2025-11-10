<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = savour()->get_option_name();
$version = savour()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'savour'),
    'page_title'           => esc_html__('Theme Options', 'savour'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('Savour_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'savour'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        
    )
));

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'savour'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'savour'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'savour'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'dark_color',
            'type'        => 'color',
            'title'       => esc_html__('Dark Color', 'savour'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'savour'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'savour'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
        array(
            'id'      => 'body_text_color',
            'type'    => 'color',
            'title'   => esc_html__('Body Color', 'savour'),
            'default'     => '',
            'output'  => array('body'),
            'transparent' => false,
            'required' => array( 0 => 'pxl_body_typography', 1 => '!=', 2 => 'google-font' ),
        ),
        array(
            'id'      => 'heading_text_color',
            'type'    => 'color',
            'title'   => esc_html__('Heading Color', 'savour'),
            'default'     => '',
            'output'  => array('h1,h2,h3,h4,h5,h6'),
            'transparent' => false,
            'required' => array( 0 => 'pxl_heading_typography', 1 => '!=', 2 => 'google-font' ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Favicon', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'savour'),
            'default'  => '',
            'url'      => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mouse', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'savour'),
            'default'  => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Loader', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Loader', 'savour'),
            'default'  => false
        ),
        array(
            'id'      => 'loader_text',
            'type'    => 'text',
            'title'   => esc_html__('Loader Text', 'savour'),
            'default' => '',
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
        ),
        array(
            'id'       => 'loader_text_color',
            'type'     => 'button_set',
            'title'    => esc_html__('Color Type', 'savour'),
            'options'  => array(
                'primary' => esc_html__('Primary', 'savour'),
                'gradient' => esc_html__('Gradient', 'savour'),
            ),
            'default'  => 'primary',
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Cookie Policy', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'cookie_policy',
            'type'     => 'button_set',
            'title'    => esc_html__('Cookie Policy', 'savour'),
            'options'  => array(
                'show' => esc_html__('Show', 'savour'),
                'hide' => esc_html__('Hide', 'savour'),
            ),
            'default'  => 'hide',
        ),
        array(
            'id'      => 'cookie_policy_description',
            'type'    => 'text',
            'title'   => esc_html__('Description', 'savour'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'          => 'cookie_policy_description_typo',
            'type'        => 'typography',
            'title'       => esc_html__('Description Font', 'savour'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('.pxl-cookie-policy .pxl-item--description'),
            'units'       => 'px',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'      => 'cookie_policy_btntext',
            'type'    => 'text',
            'title'   => esc_html__('Button Text', 'savour'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'    => 'cookie_policy_link',
            'type'  => 'select',
            'title' => esc_html__( 'Button Link', 'savour' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Subscribe', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'subscribe',
            'type'     => 'button_set',
            'title'    => esc_html__('Subscribe', 'savour'),
            'options'  => array(
                'show' => esc_html__('Show', 'savour'),
                'hide' => esc_html__('Hide', 'savour'),
            ),
            'default'  => 'hide',
        ),
        array(
            'id'      => 'subscribe_layout',
            'type'    => 'select',
            'title'   => esc_html__('Layout', 'savour'),
            'desc'    => sprintf(esc_html__('Please create your layout before choosing. %sClick Here%s','savour'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '">','</a>'),
            'options' => savour_get_templates_option('popup'),
            'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'    => 'popup_effect',
            'type'  => 'select',
            'title' => esc_html__('Popup Effect', 'savour'),
            'options' => [
                'fade'           => esc_html__('Fade', 'savour'),
                'fade-slide'           => esc_html__('Fade Slide', 'savour'),
                'zoom'           => esc_html__('Zoom', 'savour'),
            ],
            'default' => 'fade',
            'required' => array( 0 => 'subscribe', 1 => 'equals', 2 => 'show' ),
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'savour'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        savour_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'savour'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'savour'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'savour'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array_merge(
        savour_header_mobile_opts(),
        array(
            array(
                'id'       => 'mobile_display',
                'type'     => 'button_set',
                'title'    => esc_html__('Display', 'savour'),
                'options'  => array(
                    'show'  => esc_html__('Show', 'savour'),
                    'hide'  => esc_html__('Hide', 'savour'),
                ),
                'default'  => 'show'
            ),
            array(
                'id'       => 'mobile_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Style', 'savour'),
                'options'  => array(
                    'light'  => esc_html__('Light', 'savour'),
                    'dark'  => esc_html__('Dark', 'savour'),
                ),
                'default'  => 'light',
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'logo_m',
                'type'     => 'media',
                'title'    => esc_html__('Logo', 'savour'),
                 'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo.png'
                ),
                'url'      => false,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'logo_height',
                'type'     => 'dimensions',
                'title'    => esc_html__('Logo Height', 'savour'),
                'width'    => false,
                'unit'     => 'px',
                'output'    => array('#pxl-header-default .pxl-header-branding img, #pxl-header-default #pxl-header-mobile .pxl-header-branding img, #pxl-header-elementor #pxl-header-mobile .pxl-header-branding img, .pxl-logo-mobile img'),
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'search_mobile',
                'type'     => 'switch',
                'title'    => esc_html__('Search Form', 'savour'),
                'default'  => true,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'      => 'search_placeholder_mobile',
                'type'    => 'text',
                'title'   => esc_html__('Search Text Placeholder', 'savour'),
                'default' => '',
                'subtitle' => esc_html__('Default: Search...', 'savour'),
                'required' => array( 0 => 'search_mobile', 1 => 'equals', 2 => true ),
            )
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'savour'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        savour_page_title_opts(),
        array(
            array(
                'id'       => 'ptitle_scroll_opacity',
                'title'    => esc_html__('Scroll Opacity', 'savour'),
                'type'     => 'switch',
                'default'  => false,
            ),
        )
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'savour'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        savour_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'savour'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'button_set',
                'title'    => esc_html__('Footer Fixed', 'savour'),
                'options'  => array(
                    'on' => esc_html__('On', 'savour'),
                    'off' => esc_html__('Off', 'savour'),
                ),
                'default'  => 'off',
            ),
        ) 
    )
    
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'savour'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'      => 'blog_sub_title',
            'type'    => 'text',
            'title'   => esc_html__('Sub Title', 'savour'),
            'default' => '',
        ),
        array(
            'id'      => 'blog_title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'savour'),
            'default' => '',
        ),
        array(
            'id'       => 'blog_divider',
            'type'     => 'media',
            'title'    => esc_html__('Divider', 'savour'),
            'default' => '',
            'url'      => false,
        ),
        array(
            'id'       => 'content_archive1',
            'type'     => 'media',
            'title'    => esc_html__('Shape 1', 'savour'),
            'default' => '',
            'url'      => false,
        ),
        array(
            'id'       => 'content_archive2',
            'type'     => 'media',
            'title'    => esc_html__('Shape 2', 'savour'),
            'default' => '',
            'url'      => false,
        ),
        array(
            'id'       => 'content_archive3',
            'type'     => 'media',
            'title'    => esc_html__('Shape 3', 'savour'),
            'default' => '',
            'url'      => false,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'savour'),
    'icon'  => 'el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        savour_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'savour'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'savour'),
                'subtitle' => esc_html__('Display the Author for each blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'savour'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'savour'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'savour'),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'savour'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'savour'),
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'savour'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array_merge(
        savour_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'sg_post_title',
                'type'     => 'button_set',
                'title'    => esc_html__('Page Title Type', 'savour'),
                'options'  => array(
                    'default' => esc_html__('Default', 'savour'),
                    'custom_text' => esc_html__('Custom Text', 'savour'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'      => 'sg_post_title_text',
                'type'    => 'text',
                'title'   => esc_html__('Page Title Text', 'savour'),
                'default' => 'Blog Details',
                'required' => array( 0 => 'sg_post_title', 1 => 'equals', 2 => 'custom_text' ),
            ),
            array(
                'id'      => 'sg_featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'savour'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'savour'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'savour'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'savour'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_navigation',
                'title'    => esc_html__('Navigation', 'savour'),
                'subtitle' => esc_html__('Display the Navigation for blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'post_author_info',
                'title'    => esc_html__('Author Info', 'savour'),
                'subtitle' => esc_html__('Display the Author info for blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'title' => esc_html__('Social', 'savour'),
                'type'  => 'section',
                'id' => 'social_section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social', 'savour'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'savour'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'social_facebook',
                'title'    => esc_html__('Facebook', 'savour'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_twitter',
                'title'    => esc_html__('Twitter', 'savour'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_pinterest',
                'title'    => esc_html__('Pinterest', 'savour'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_linkedin',
                'title'    => esc_html__('LinkedIn', 'savour'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
        )
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'savour'),
        'icon'   => 'el el-shopping-cart',
        'fields'     => array_merge(
            array(
                array(
                    'id'       => 'product_content_shape1',
                    'type'     => 'media',
                    'title'    => esc_html__('Shape 1', 'savour'),
                    'default' => '',
                    'url'      => false,
                ),
                array(
                    'id'       => 'product_content_shape2',
                    'type'     => 'media',
                    'title'    => esc_html__('Shape 2', 'savour'),
                    'default' => '',
                    'url'      => false,
                ),
                array(
                    'id'       => 'product_content_shape3',
                    'type'     => 'media',
                    'title'    => esc_html__('Shape 3', 'savour'),
                    'default' => '',
                    'url'      => false,
                ),
            )
        )
    ));
}

Redux::setSection($opt_name, array(
    'title' => esc_html__('Product Archive', 'savour'),
    'icon'  => 'el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        savour_sidebar_pos_opts([ 'prefix' => 'shop_']),
        array(
            array(
                'id'       => 'shop_layout',
                'type'     => 'button_set',
                'title'    => esc_html__('Layout', 'savour'),
                'options'  => array(
                    'grid'  => esc_html__('Grid', 'savour'),
                    'list'  => esc_html__('List', 'savour'),
                ),
                'default'  => 'grid',
            ),
            array(
                'id'      => 'shop_featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'savour'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'title'         => esc_html__('Products displayed per row', 'savour'),
                'id'            => 'products_columns',
                'type'          => 'slider',
                'subtitle'      => esc_html__('Number product to show per row', 'savour'),
                'default'       => 3,
                'min'           => 2,
                'step'          => 1,
                'max'           => 5,
                'display_value' => 'text',
                'required' => array( 0 => 'shop_layout', 1 => 'equals', 2 => 'grid' ),
            ),
            array(
                'title'         => esc_html__('Products displayed per page', 'savour'),
                'id'            => 'product_per_page',
                'type'          => 'slider',
                'subtitle'      => esc_html__('Number product to show', 'savour'),
                'default'       => 9,
                'min'           => 3,
                'step'          => 1,
                'max'           => 50,
                'display_value' => 'text'
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Single Product', 'savour'),
    'icon'  => 'el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        savour_single_product_opts(),
        array(
            array(
                'id'       => 'single_img_size',
                'type'     => 'dimensions',
                'title'    => esc_html__('Image Size', 'savour'),
                'unit'     => 'px',
            ),
            array(
                'id'       => 'sg_product_ptitle',
                'type'     => 'button_set',
                'title'    => esc_html__('Page Title Type', 'savour'),
                'options'  => array(
                    'default' => esc_html__('Default', 'savour'),
                    'custom_text' => esc_html__('Custom Text', 'savour'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'      => 'sg_product_ptitle_text',
                'type'    => 'text',
                'title'   => esc_html__('Page Title Text', 'savour'),
                'default' => 'Shop Details',
                'required' => array( 0 => 'sg_product_ptitle', 1 => 'equals', 2 => 'custom_text' ),
            ),
            array(
                'id'       => 'product_title',
                'type'     => 'switch',
                'title'    => esc_html__('Product Title', 'savour'),
                'default'  => false
            ),
            array(
                'id'       => 'product_social_share',
                'type'     => 'switch',
                'title'    => esc_html__('Social Share', 'savour'),
                'default'  => false
            ),
        )
    )
));


/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'savour'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'pxl_body_typography',
            'type'     => 'select',
            'title'    => esc_html__('Body Font Type', 'savour'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'savour'),
                'google-font'  => esc_html__('Google Font', 'savour'),
            ),
            'default'  => 'default-font',
        ),

        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'savour'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'pxl_body_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

        array(
            'id'       => 'pxl_heading_typography',
            'type'     => 'select',
            'title'    => esc_html__('Heading Font Type', 'savour'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'savour'),
                'google-font'  => esc_html__('Google Font', 'savour'),
            ),
            'default'  => 'default-font',
        ),
        
        array(
            'id'          => 'font_heading',
            'type'        => 'typography',
            'title'       => esc_html__('Heading Google Font', 'savour'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'font-backup'  => false,
            'font-style'  => false,
            'output'      => array('h1,h2,h3,h4,h5,h6,.ft-heading-default'),
            'units'       => 'px',
            'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

        array(
            'id'          => 'theme_default',
            'type'        => 'typography',
            'title'       => esc_html__('Theme Default', 'savour'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'color'  => false,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'units'       => 'px',
            'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'savour'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'title' => esc_html__('Portfolio', 'savour'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'       => 'portfolio_display',
            'type'     => 'switch',
            'title'    => esc_html__('Portfolio', 'savour'),
            'default'  => true
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'savour'),
            'default' => '',
            'desc'     => 'Default: portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'savour'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'savour' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Service', 'savour'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'       => 'service_display',
            'type'     => 'switch',
            'title'    => esc_html__('Service', 'savour'),
            'default'  => true
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'savour'),
            'default' => '',
            'desc'     => 'Default: service',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'savour'),
            'default' => '',
            'desc'     => 'Default: Services',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'savour' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
    )
));