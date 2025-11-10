<?php 
/**
 * Actions Hook for the theme
 *
 * @package Case-Themes
 */
add_action('after_setup_theme', 'savour_setup');
function savour_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'savour_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'savour', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1170, 710 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'savour' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'post-formats', array (
        '',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size( 'savour-thumb-small', 80, 70, true );
    add_image_size( 'savour-thumb-xs', 120, 104, true );
    add_image_size( 'savour-large', 1170, 627, true );
    add_image_size( 'savour-portfolio', 600, 600, true );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'savour_widgets_position' );
function savour_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'savour' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2><div class="widget-content">',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'savour' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2><div class="widget-content">',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'savour' ),
			'id'            => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2><div class="widget-content">',
		) );
	}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'savour_scripts' );
function savour_scripts() {  
    $savour_version = wp_get_theme( get_template() );

    /* Popup Libs */
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );

    /* Wow Libs */
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );

    /* Particles Background Libs */
    wp_register_script( 'particles-background', get_template_directory_uri() . '/assets/js/libs/particles.min.js', array( 'jquery' ), '1.1.0', true );

    /* Parallax Image */
    wp_register_script( 'tilt', get_template_directory_uri() . '/assets/js/libs/tilt.min.js', array( 'jquery' ), '1.0.0', true );

    /* Parallax Libs */
    wp_register_script( 'stellar-parallax', get_template_directory_uri() . '/assets/js/libs/stellar-parallax.min.js', array( 'jquery' ), '0.6.2', true );

    /* Nice Select */
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.min.js', array( 'jquery' ), 'all', true );

    /* Icons Lib - CSS */
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css' , array(), $savour_version->get( 'Version' ));

    /* Counter Effect */
    wp_register_script( 'pxl-counter-slide', get_template_directory_uri() . '/assets/js/libs/counter-slide.min.js', array( 'jquery' ), '1.0.0', true );

    /* Scroll Effect */
    wp_register_script( 'pxl-scroll', get_template_directory_uri() . '/assets/js/libs/scroll.min.js', array( 'jquery' ), '0.6.0', true );

    /* Parallax Scroll */
    wp_enqueue_script( 'pxl-parallax-background', get_template_directory_uri() . '/assets/js/libs/parallax-background.js', array( 'jquery' ), $savour_version->get( 'Version' ), true );
    wp_enqueue_script( 'pxl-parallax-scroll', get_template_directory_uri() . '/assets/js/libs/parallax-scroll.js', array( 'jquery' ), $savour_version->get( 'Version' ), true );
    wp_register_script( 'pxl-easing', get_template_directory_uri() . '/assets/js/libs/easing.js', array( 'jquery' ), '1.3.0', true );

    /* Tweenmax */
    wp_register_script( 'pxl-tweenmax', get_template_directory_uri() . '/assets/js/libs/tweenmax.min.js', array( 'jquery' ), '2.1.2', true );
    
    /* Parallax Move Mouse */
    wp_register_script( 'pxl-parallax-move-mouse', get_template_directory_uri() . '/assets/js/libs/parallax-move-mouse.js', array( 'jquery' ), '1.0.0', true );

    /* Woocommerce */
    wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/js/woocommerce.js', array( 'jquery' ), $savour_version->get( 'Version' ), true );

    /* Cookie */
    wp_register_script( 'pxl-cookie', get_template_directory_uri() . '/assets/js/libs/cookie.js', array( 'jquery' ), '1.4.1', true );

	wp_enqueue_style( 'pxl-caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $savour_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $savour_version->get( 'Version' ) );
	wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $savour_version->get( 'Version' ) );
	wp_add_inline_style( 'pxl-style', savour_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $savour_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', savour_fonts_url(), array(), null );
	wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $savour_version->get( 'Version' ), true );
    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'savour_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'savour_admin_style');
function savour_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'savour-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'elementor-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
    wp_enqueue_style( 'savour-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );

/* Favicon */
add_action('wp_head', 'savour_site_favicon');
function savour_site_favicon(){
    $favicon = savour()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url'])) {
        $favicon_sm  = pxl_get_image_by_size( array(
            'attach_id'  => $favicon['id'],
            'thumb_size' => '32x32',
        ) );
        $favicon_sm_url    = $favicon_sm['url'];

        $favicon_xs  = pxl_get_image_by_size( array(
            'attach_id'  => $favicon['id'],
            'thumb_size' => '16x16',
        ) );
        $favicon_xs_url    = $favicon_xs['url'];

        echo '<link rel="icon" type="image/png" sizes="32x32" href="'.esc_url($favicon_sm_url).'"/>';
        echo '<link rel="icon" type="image/png" sizes="16x16" href="'.esc_url($favicon_xs_url).'"/>';
    }
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'savour_pingback_header' );
function savour_pingback_header(){
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

/* Hidden Panel */
add_action( 'pxl_anchor_target', 'savour_hook_anchor_templates_hidden_panel');
function savour_hook_anchor_templates_hidden_panel(){

    $hidden_templates = savour_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;

    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id']
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){  
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );  
        }
    } 
}
if(!function_exists('savour_hook_anchor_hidden_panel')){
    function savour_hook_anchor_hidden_panel($args){
        $hidden_panel_position = get_post_meta( $args['post_id'], 'hidden_panel_position', true );
        $hidden_panel_boxcolor = get_post_meta( $args['post_id'], 'hidden_panel_boxcolor', true );
        $hidden_panel_height = get_post_meta( $args['post_id'], 'hidden_panel_height', true ); ?>
        <div class="pxl-hidden-panel-popup pxl-hidden-template-<?php echo esc_attr($args['post_id'])?> pxl-pos-<?php echo esc_attr($hidden_panel_position); ?>">
            <div class="pxl-popup--overlay pxl-cursor--cta"></div>
            <div class="pxl-popup--conent" style="height:<?php echo esc_attr($hidden_panel_height).'px'; ?>; background-color:<?php echo esc_attr($hidden_panel_boxcolor); ?>;">
                <div class="pxl-conent-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
                </div>
            </div>
        </div>
    <?php }
}

/* Cart Sidebar */
if(!function_exists('savour_hook_anchor_cart')){
    function savour_hook_anchor_cart(){ 
        global $woocommerce; ?>
        <div id="pxl-cart-sidebar" class="pxl-popup-wrap">
            <div class="pxl-popup--overlay pxl-cursor--cta"></div>
            <div class="pxl-popup--conent pxl-widget-cart-sidebar">
                <div class="widget_shopping_cart">
                    <div class="widget_shopping_head">
                        <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
                        <div class="widget_shopping_title">
                            <?php echo esc_html__( 'Cart', 'savour' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'savour' ), WC()->cart->cart_contents_count ); ?>)</span>
                        </div>
                    </div>
                    <div class="widget_shopping_cart_content">
                        <?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
                        <ul class="cart_list product_list_widget">

                        <?php if ( ! WC()->cart->is_empty() ) : ?>

                            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                        ?>
                                        <li>
                                            <?php if(!empty($thumbnail)) : ?>
                                                <div class="cart-product-image">
                                                    <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="cart-product-meta">
                                                <h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
                                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                                                <?php
                                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                        '<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
                                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                        esc_attr__( 'Remove this item', 'savour' ),
                                                        esc_attr( $product_id ),
                                                        esc_attr( $cart_item_key ),
                                                        esc_attr( $_product->get_sku() )
                                                    ), $cart_item_key );
                                                ?>
                                            </div>  
                                        </li>
                                        <?php
                                    }
                                }
                            ?>

                        <?php else : ?>

                            <li class="empty">
                                <i class="caseicon-shopping-cart-alt"></i>
                                <span><?php esc_html_e( 'Your cart is empty', 'savour' ); ?></span>
                                <a class="btn btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'savour'); ?></a>
                            </li>

                        <?php endif; ?>

                        </ul><!-- end product list -->
                    </div>
                    <?php if ( ! WC()->cart->is_empty() ) : ?>
                        <div class="widget_shopping_cart_footer">
                            <p class="total"><strong><?php esc_html_e( 'Subtotal', 'savour' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

                            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

                            <p class="buttons">
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-shop wc-forward"><?php esc_html_e( 'View Cart', 'savour' ); ?></a>
                                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn checkout wc-forward"><?php esc_html_e( 'Checkout', 'savour' ); ?></a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php }
}