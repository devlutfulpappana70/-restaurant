<?php

if (!class_exists('Savour_Page')) {

    class Savour_Page
    {
        public function get_site_loader(){

            $site_loader = savour()->get_theme_opt( 'site_loader', false );
            if($site_loader) { ?>
                <div class="pxl-preloader"></div>
            <?php }
        }

        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) ); 
        }

        public function get_page_title(){
            $titles = $this->get_title();
            $pt_mode = savour()->get_opt('pt_mode');
            $ptitle_scroll_opacity = savour()->get_opt('ptitle_scroll_opacity');
            if( $pt_mode == 'none' ) return;
            $ptitle_layout = (int)savour()->get_opt('ptitle_layout');
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
                ?>
                <div id="pxl-page-title-elementor" class="<?php if($ptitle_scroll_opacity == true) { echo 'pxl-scroll-opacity'; } ?>">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php 
            } else {
                $ptitle_breadcrumb_on = savour()->get_opt( 'ptitle_breadcrumb_on', '1' ); 
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-default" class="pxl--parallax" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <h1 class="pxl-page-title"><?php echo savour_html($titles['title']) ?></h1>
                            </div>
                            <div class="ptitle-col-right col-sm-12 col-md-6 col-lg-6">
                                <?php if($ptitle_breadcrumb_on == '1') : ?>
                                    <?php $this->get_breadcrumb(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } 
        } 

        public function get_title() {
            $title = '';
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'savour' );
                    }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404 Error', 'savour' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'savour' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'savour' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb(){

            if ( ! class_exists( 'CASE_Breadcrumb' ) )
            {
                return;
            }

            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if ( empty( $entries ) )
            {
                return;
            }

            ob_start();

            foreach ( $entries as $entry )
            {
                $entry = wp_parse_args( $entry, array(
                    'label' => '',
                    'url'   => ''
                ) );

                $entry_label = $entry['label'];

                if(!empty($_GET['blog_title'])) {
                    $blog_title = $_GET['blog_title'];
                    $custom_title = explode('_', $blog_title);
                    foreach ($custom_title as $index => $value) {
                        $arr_str_b[$index] = $value;
                    }
                    $str = implode(' ', $arr_str_b);
                    $entry_label = $str;
                }

                if ( empty( $entry_label ) )
                {
                    continue;
                }

                echo '<li>';

                if ( ! empty( $entry['url'] ) )
                {
                    printf(
                        '<a class="breadcrumb-hidden" href="%1$s">%2$s</a>',
                        esc_url( $entry['url'] ),
                        esc_attr( $entry_label )
                    );
                }
                else
                {
                    $sg_post_title = savour()->get_theme_opt('sg_post_title', 'default');
                    $sg_post_title_text = savour()->get_theme_opt('sg_post_title_text');
                    if(is_singular('post') && $sg_post_title == 'custom_text' && !empty($sg_post_title_text)) {
                        $entry_label = $sg_post_title_text;
                    }
                    $sg_product_ptitle = savour()->get_theme_opt('sg_product_ptitle', 'default');
                    $sg_product_ptitle_text = savour()->get_theme_opt('sg_product_ptitle_text');
                    if(is_singular('product') && $sg_product_ptitle == 'custom_text' && !empty($sg_product_ptitle_text)) {
                        $entry_label = $sg_product_ptitle_text;
                    }
                    printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry_label ) );
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ( $output )
            {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'savour_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => '<i class="caseicon-double-chevron-left"></i>',
                'next_text' => '<i class="caseicon-double-chevron-right"></i>',
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
            ?>
            <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                <div class="pxl-pagination-links">
                    <?php
                        printf($links);
                    ?>
                </div>
            </nav>
            <?php
            endif;
        }

        public function get_shop_shape() {
            $product_content_shape1 = savour()->get_theme_opt( 'product_content_shape1' );
            $product_content_shape2 = savour()->get_theme_opt( 'product_content_shape2' );
            $product_content_shape3 = savour()->get_theme_opt( 'product_content_shape3' ); ?>
            <div class="pxl-blog-shape">
                <?php if(!empty($product_content_shape1['url'])) : ?><div class="pxl-blog-shape1 slide-right-to-left"><img src="<?php echo esc_url($product_content_shape1['url']); ?>" /></div><?php endif; ?>
                <?php if(!empty($product_content_shape2['url'])) : ?><div class="pxl-blog-shape2 slide-up-down"><img src="<?php echo esc_url($product_content_shape2['url']); ?>" /></div><?php endif; ?>
                <?php if(!empty($product_content_shape3['url'])) : ?><div class="pxl-blog-shape3 slide-up-down"><img src="<?php echo esc_url($product_content_shape3['url']); ?>" /></div><?php endif; ?>
            </div>
        <?php }
    }
}
