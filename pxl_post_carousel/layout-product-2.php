<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('product', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$img_size = $widget->get_setting('img_size');
$show_author = $widget->get_setting('show_author');
$show_date = $widget->get_setting('show_date');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,  
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);

$image_size = !empty($img_size) ? $img_size : '400x360';  ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-product-carousel pxl-product-carousel2 pxl-product-style2" <?php if($settings['drap'] !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php if($settings['slider_row'] == '1') {
                        foreach ($posts as $key => $post):
                            $img_id       = get_post_thumbnail_id( $post->ID );
                            $product = wc_get_product( $post->ID );
                            $product_ingredient = get_post_meta($post->ID, 'product_ingredient', true); ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                                        $img_id = get_post_thumbnail_id($post->ID);
                                        $img = savour_get_image_by_size( array(
                                            'attach_id'  => $img_id,
                                            'thumb_size' => $image_size,
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail'];
                                        ?>
                                        <div class="pxl-item--image">
                                            <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-item--holder">
                                        <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                                        <div class="pxl-item--description el-empty"><?php echo esc_attr($product_ingredient); ?></div>
                                        <div class="pxl-item--bottom pxl-flex">
                                            <div class="pxl-item--price pxl-pr-20"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                                            <?php if (class_exists('WPCleverWoosw')) { ?>
                                                <div class="woocommerce-wishlist pxl-mr-10">
                                                    <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <?php echo '<div class="pxl-swiper-slide pxl-item--odd">'; $i = 0; foreach ($posts as $key => $post): $product = wc_get_product( $post->ID ); $product_ingredient = get_post_meta($post->ID, 'product_ingredient', true); ?>
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img = savour_get_image_by_size( array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                    ?>
                                    <div class="pxl-item--image">
                                        <a class="woocommerce-product-details" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl-item--holder">
                                    <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                                    <div class="pxl-item--description el-empty"><?php echo esc_attr($product_ingredient); ?></div>
                                    <div class="pxl-item--bottom pxl-flex">
                                        <div class="pxl-item--price pxl-pr-20"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                                        <?php if (class_exists('WPCleverWoosw')) { ?>
                                            <div class="woocommerce-wishlist pxl-mr-10">
                                                <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++;  
                            if ($i % 2 == 0 && $i != count($posts)) { 
                                echo '</div><div class="pxl-swiper-slide pxl-item--even">';
                            } ?>
                        <?php endforeach; echo "</div>" ?>
                    <?php } ?>
                </div> 
            </div>
            
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow-wrap">
                    <div class="style-round">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right"></i></div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-pagination">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>