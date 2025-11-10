<?php 
 
if(!function_exists('savour_get_post_grid')){
    function savour_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                savour_get_post_grid_layout1($posts, $settings);
                break;

            case 'portfolio-1':
                savour_get_portfolio_grid_layout1($posts, $settings);
                break;

            case 'service-1':
                savour_get_service_grid_layout1($posts, $settings);
                break;

            case 'product-1':
                savour_get_product_grid_layout1($posts, $settings);
                break;

            case 'product-2':
                savour_get_product_grid_layout2($posts, $settings);
                break;

            case 'product-3':
                savour_get_product_grid_layout3($posts, $settings);
                break;

            case 'product-4':
                savour_get_product_grid_layout4($posts, $settings);
                break;

            case 'product-5':
                savour_get_product_grid_layout5($posts, $settings);
                break;

            case 'product-6':
                savour_get_product_grid_layout6($posts, $settings);
                break;

            default:
                return false;
                break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function savour_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '758x424';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--featured hover-imge-effect2">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--holder">
                        <div class="pxl-item--meta">
                            <?php if($show_date == 'true'): ?>
                                <div class="pxl-item--date">
                                    <div class="pxl-date--inner">
                                        <span class="pxl-date--day"><?php echo get_the_date('dS', $post->ID); ?></span>
                                        <span class="pxl-date--month"><?php echo get_the_date('F', $post->ID); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="pxl-item--number"><?php if($key < 9) { echo '0'; } echo esc_attr($key+1); ?>.</div>
                        </div>
                        <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                        <?php if($show_button == 'true') : ?>
                            <div class="pxl-item--button">
                                <a class="btn" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <span><?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Read more', 'savour');
                                    } ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function savour_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '800x541';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-item--featured hover-imge-effect3"><?php echo wp_kses_post($thumbnail); ?></div>
                        <div class="pxl-item--holder">
                            <div class="pxl-item--imgfilter"><?php echo wp_kses_post($thumbnail); ?></div>
                            <div class="pxl-item--meta">
                                <div class="pxl-item--title-wrap">
                                    <h5 class="pxl-item--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h5>
                                </div>
                                <?php if($show_category == 'true'): ?>
                                    <div class="pxl-item--category">
                                        <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}
// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function savour_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '600x800';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                $img_id       = get_post_thumbnail_id( $post->ID );
                $img          = savour_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size
                ) );
                $thumbnail    = $img['thumbnail']; ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-item--featured hover-imge-effect3"><?php echo wp_kses_post($thumbnail); ?></div>
                        <div class="pxl-item--front">
                            <div class="pxl-item--overlay"><?php echo wp_kses_post($thumbnail); ?></div>
                            <h3 class="pxl-item--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h3>
                            <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                                <div class="pxl-item--content">
                                    <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-item--back">
                            <div class="pxl-item--overlay"><?php echo wp_kses_post($thumbnail); ?></div>
                            <div class="pxl-item--holder">
                                <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                    <div class="pxl-item--icon">
                                        <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                    </div>
                                <?php endif; ?>
                                <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                    $icon_img = pxl_get_image_by_size( array(
                                        'attach_id'  => $service_icon_img['id'],
                                        'thumb_size' => 'full',
                                    ));
                                    $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                    <div class="pxl-item--icon">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <h3 class="pxl-item--title">
                                    <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                </h3>
                                <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                                    <div class="pxl-item--content">
                                        <?php echo wp_trim_words( $service_excerpt, $num_words_hover, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="pxl-item--readmore">
                                        <a class="btn btn-default" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                            <span><?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('More Details', 'savour');
                                            } ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php
        endforeach;
    endif;
}
// End Service Grid
//-------------------------------------------------

// Start Product Grid
//--------------------------------------------------
function savour_get_product_grid_layout1($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '557x600';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $product = wc_get_product( $post->ID ); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="woocommerce-product-inner">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img = savour_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                            ?>
                            <div class="woocommerce-product-header">
                                <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="woocommerce-product-content">
                            <div class="woocommerce-product-meta">
                                <h5 class="woocommerce-product-title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                                <div class="woocommerce-product--price">
                                    <?php echo wp_kses_post($product->get_price_html()); ?>
                                </div>
                            </div>
                            <div class="woocommerce-product--buttons">
                                <div class="woocommerce-add-to-cart pxl-mr-10">
                                    <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s">%s</a>',
                                            esc_url( $product->add_to_cart_url() ),
                                            esc_attr( $product->get_id() ),
                                            esc_attr( $product->get_sku() ),
                                            $product->is_purchasable() ? 'add_to_cart_button' : '',
                                            esc_attr( $product->get_type() ),
                                            esc_html( $product->add_to_cart_text() )
                                        ),
                                        $product );
                                    ?>
                                </div>
                                <?php if (class_exists('WPCleverWoosw')) { ?>
                                    <div class="woocommerce-wishlist pxl-mr-10">
                                        <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (class_exists('WPCleverWoosc')) { ?>
                                    <div class="woocommerce-compare">
                                        <?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function savour_get_product_grid_layout2($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '451x416';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $weight_unit = get_option('woocommerce_weight_unit');
            $product = wc_get_product( $post->ID ); 
            $attributes = $product->get_attributes(); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = savour_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--image">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <?php if(!empty($attributes) && count($attributes) > 0) : ?>
                                <div class="pxl-item--attr">
                                    <span class="pxl-button--info flaticon flaticon-info"></span>
                                    <div class="pxl-attr--content">
                                        <?php foreach ( $attributes as $attribute ) { ?>
                                            <div class="pxl-attr--item">
                                                <label><?php echo esc_attr($attribute['name']); ?></label>
                                                <?php echo esc_attr($attribute['value']); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="pxl-item--top pxl-flex">
                        <div class="pxl-item--price pxl-pr-20">
                            <?php echo wp_kses_post($product->get_price_html()); ?>
                        </div>
                        <div class="pxl-item--weight"><?php echo wp_kses_post($product->get_weight()).$weight_unit; ?></div>
                    </div>

                    <div class="pxl-item--meta">
                        <h4 class="pxl-item--title pxl-pr-30">
                            <?php echo esc_attr(get_the_title($post->ID)); ?>
                        </h4>
                        <a class="pxl-item--details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">+</a>
                    </div>

                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function savour_get_product_grid_layout3($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '680x600';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $product = wc_get_product( $post->ID ); 

            $sort_name = $product->get_name();
            $sort_units_sold = $product->get_total_sales();
            $sort_post_date = $product->get_date_created();
            $sort_price = $product->get_price();
            $sort_rating = $product->get_average_rating(); 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <span class="sort-name" style="display:none;"><?php echo esc_html($sort_name) ?></span>
                <span class="sort-popularity" style="display:none;"><?php echo esc_html($sort_units_sold) ?></span>
                <span class="sort-date" style="display:none;"><?php echo strtotime($sort_post_date) ?></span>
                <span class="sort-price" style="display:none;"><?php echo esc_html($sort_price) ?></span>
                <span class="sort-rating" style="display:none;"><?php echo esc_html($sort_rating) ?></span>
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = savour_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--image">
                            <a class="pxl-item--details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                    <div class="pxl-item--meta pxl-flex">
                        <div class="pxl-item--cart">
                            <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button ajax_add_to_cart %s product_type_%s">%s</a>',
                                    esc_url( $product->add_to_cart_url() ),
                                    esc_attr( $product->get_id() ),
                                    esc_attr( $product->get_sku() ),
                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                    esc_attr( $product->get_type() ),
                                    esc_html( $product->add_to_cart_text() )
                                ),
                                $product );
                            ?>
                        </div>
                        <div class="pxl-item--price">
                            <?php echo wp_kses_post($product->get_price_html()); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function savour_get_product_grid_layout4($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x624';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $product = wc_get_product( $post->ID ); 
            $product_ingredient = get_post_meta($post->ID, 'product_ingredient', true); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = savour_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--image hover-imge-effect3">
                            <a class="pxl-item--details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                            <div class="pxl-item--price">
                                <?php echo wp_kses_post($product->get_price_html()); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <h3 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                    <div class="pxl-item--ingredient el-empty"><?php echo esc_attr($product_ingredient); ?></div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function savour_get_product_grid_layout5($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x574';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $product = wc_get_product( $post->ID ); 
            $product_ingredient = get_post_meta($post->ID, 'product_ingredient', true); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = savour_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--image hover-imge-effect3">
                            <a class="pxl-item--details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <h3 class="pxl-item--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h3>
                    <div class="pxl-item--ingredient el-empty"><?php echo esc_attr($product_ingredient); ?></div>
                    <div class="pxl-item--meta pxl-flex">
                        <div class="pxl-item--price pxl-pr-10">
                            <?php echo wp_kses_post($product->get_price_html()); ?>
                        </div>
                        <div class="pxl-item--button pxl-pl-10">
                            <a class="btn btn-default" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html__('Order Now', 'savour'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function savour_get_product_grid_layout6($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x539';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $product = wc_get_product( $post->ID ); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = savour_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--image hover-imge-effect3">
                            <a class="pxl-item--details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--holder">
                        <div class="pxl-item--meta pxl-pr-10">
                            <h3 class="pxl-item--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h3>
                            <div class="pxl-item--price">
                                <?php echo wp_kses_post($product->get_price_html()); ?>
                            </div>
                        </div>
                        <a class="pxl-item--readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.624 7.96986L11.4887 1.8345C10.9474 1.29312 10.0451 1.29312 9.50379 1.8345L8.24063 3.09766C8.00002 3.33827 7.81959 3.69915 7.81959 4.06006C7.81959 4.42098 7.9399 4.78185 8.24063 5.02246L9.92482 6.70666H1.44362C0.661676 6.70666 0 7.36834 0 8.15028V9.89463C0 10.6164 0.661641 11.2179 1.44362 11.2179H9.86467L8.24059 12.842C7.99998 13.0826 7.81956 13.4435 7.81956 13.8646C7.81956 14.2255 7.93986 14.5864 8.24059 14.8871L9.50376 16.1503C9.74436 16.3909 10.1052 16.5714 10.4662 16.5714C10.8271 16.5714 11.188 16.4511 11.4286 16.1503L17.5639 10.0149C17.8647 9.71417 17.985 9.35326 17.985 8.99238C18.0451 8.6315 17.9248 8.27062 17.624 7.96986ZM16.7819 9.17284L10.6466 15.3082C10.5263 15.4285 10.4662 15.4285 10.3459 15.3082L9.08269 14.045C9.02254 13.9849 9.02254 13.9247 9.02254 13.8646C9.02254 13.8045 9.02254 13.7443 9.08269 13.6842L11.7293 11.0376C11.9097 10.8572 11.9699 10.6165 11.8496 10.3759C11.7293 10.1353 11.5488 10.015 11.3083 10.015H1.44362C1.32332 10.015 1.20301 9.95485 1.20301 9.8947V8.15035C1.20301 8.03005 1.32332 7.90974 1.44362 7.90974H11.4286C11.6692 7.90974 11.9098 7.78944 11.9699 7.54883C12.0301 7.30822 12.0301 7.06761 11.8496 6.88715L9.14288 4.1804C9.08272 4.12025 9.08272 4.0601 9.08272 4.0601C9.08272 3.99994 9.08272 3.99994 9.14288 3.93979L10.406 2.67666C10.4662 2.61651 10.5865 2.55636 10.7068 2.67666L16.8421 8.81196C16.9022 8.87211 16.9022 8.93226 16.9022 8.99238C16.8421 9.05257 16.8421 9.11272 16.7819 9.17284Z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

// End Product Grid
//--------------------------------------------------

add_action( 'wp_ajax_savour_get_pagination_html', 'savour_get_pagination_html' );
add_action( 'wp_ajax_nopriv_savour_get_pagination_html', 'savour_get_pagination_html' );
function savour_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'savour'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        savour()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'savour'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_savour_load_more_post_grid', 'savour_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_savour_load_more_post_grid', 'savour_load_more_post_grid' );
function savour_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'savour'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();
         
        savour_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'savour'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_savour_get_filter_html', 'savour_get_filter_html' );
add_action( 'wp_ajax_nopriv_savour_get_filter_html', 'savour_get_filter_html' );
function savour_get_filter_html(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'savour'));
        }
        $settings = $_POST['settings'];
        $loadmore_filter = $_POST['loadmore_filter'];
        if($loadmore_filter == '1'){
            set_query_var('paged', 1);
            $limit = isset($settings['limit'])?$settings['limit']:'6';
            $limitx = (int)$limit * (int)$settings['paged'];
        }else{
            set_query_var('paged', $settings['paged']);
            $limitx = isset($settings['limit'])?$settings['limit']:'6';
        }
        extract(pxl_get_posts_of_grid($settings['post_type'], [
                'source' => isset($settings['source'])?$settings['source']:'',
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => $limitx,
                'post_ids' => isset($settings['post_ids'])?$settings['post_ids']: [],
            ],
            $settings['tax']
        ));
        ob_start(); ?>
        
        <span class="filter-item active" data-filter="*">
            <?php echo esc_html($settings['filter_default_title']); ?>
            <?php if($settings['show_cat_count'] == '1'): ?>
                <span class="filter-item-count"><?php echo count($posts); ?></span> 
            <?php endif; ?>
        </span>
        <?php foreach ($categories as $category):
            $category_arr = explode('|', $category);
            $term = get_term_by('slug',$category_arr[0], $category_arr[1]);
            $tax_count = 0;
            foreach ($posts as $key => $post){
                $this_terms = get_the_terms( $post->ID,  $settings['tax'][0] );
                $term_list = [];
                foreach ($this_terms as $t) {
                    $term_list[] = $t->slug;
                } 
                if(in_array($term->slug,$term_list))
                    $tax_count++;
            } 
            if($tax_count > 0): ?>
                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                    <?php if($settings['show_cat_count'] == '1'): ?>
                        <span class="filter-item-count"><?php echo esc_attr($tax_count); ?></span> 
                    <?php endif; ?>
                </span>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'savour'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

 