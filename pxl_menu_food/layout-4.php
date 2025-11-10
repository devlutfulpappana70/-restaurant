<?php
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
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
$infinite = $widget->get_setting('infinite','false');  
$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$drap = $widget->get_setting('drap','false');  
$speed = $widget->get_setting('speed', '500');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['menu_food_l4']) && !empty($settings['menu_food_l4']) && count($settings['menu_food_l4'])): ?>
    <div class="pxl-swiper-sliders pxl-menu-food pxl-menu-food4" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php if($settings['slider_row'] == '1') { ?>
                        <?php foreach ($settings['menu_food_l4'] as $key => $value):
                            $image = isset($value['image']) ? $value['image'] : ''; 
                            $title = isset($value['title']) ? $value['title'] : ''; 
                            $desc = isset($value['desc']) ? $value['desc'] : ''; 
                            $price = isset($value['price']) ? $value['price'] : '';
                            $product_details = isset($value['product_details']) ? $value['product_details'] : '';
                            $link_key = $widget->get_repeater_setting_key( 'product_details', 'value', $key );
                            if ( ! empty( $product_details['url'] ) ) {
                                $widget->add_render_attribute( $link_key, 'href', $product_details['url'] );

                                if ( $product_details['is_external'] ) {
                                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                                }

                                if ( $product_details['nofollow'] ) {
                                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                }
                            }
                            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                    <?php if(!empty($image['id'])) : ?>
                                        <div class="pxl-item--image">
                                            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                                <?php $img  = pxl_get_image_by_size( array(
                                                        'attach_id'  => $image['id'],
                                                        'thumb_size' => '300x300',
                                                    ) );
                                                    $thumbnail    = $img['thumbnail']; ?>
                                                <?php echo pxl_print_html($thumbnail); ?>
                                            </a>
                                        </div>  
                                    <?php endif; ?>
                                    <div class="pxl-item--holder">
                                        <h5 class="pxl-item--title"><?php echo esc_attr($title); ?></h5>
                                        <div class="pxl-item--description"><?php echo esc_attr($desc); ?></div>
                                        <div class="pxl-item--bottom pxl-flex">
                                            <div class="pxl-item--price pxl-pr-20"><?php echo esc_attr($price); ?></div>
                                            <div class="pxl-item--favourite">
                                                <a href="#">
                                                    <i class="flaticon-like-alt"></i>
                                                    <i class="flaticon-like"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <?php echo '<div class="pxl-swiper-slide pxl-item--odd">'; $i = 0; foreach ($settings['menu_food_l4'] as $key => $value):
                            $image = isset($value['image']) ? $value['image'] : ''; 
                            $title = isset($value['title']) ? $value['title'] : ''; 
                            $desc = isset($value['desc']) ? $value['desc'] : ''; 
                            $price = isset($value['price']) ? $value['price'] : '';
                            $product_id = isset($value['product_id']) ? $value['product_id'] : '';
                            $product_details = isset($value['product_details']) ? $value['product_details'] : '';
                            $link_key = $widget->get_repeater_setting_key( 'product_details', 'value', $key );
                            if ( ! empty( $product_details['url'] ) ) {
                                $widget->add_render_attribute( $link_key, 'href', $product_details['url'] );

                                if ( $product_details['is_external'] ) {
                                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                                }

                                if ( $product_details['nofollow'] ) {
                                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                }
                            }
                            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
                                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                    <?php if(!empty($image['id'])) : ?>
                                        <div class="pxl-item--image">
                                            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                                <?php $img  = pxl_get_image_by_size( array(
                                                        'attach_id'  => $image['id'],
                                                        'thumb_size' => '300x300',
                                                    ) );
                                                    $thumbnail    = $img['thumbnail']; ?>
                                                <?php echo pxl_print_html($thumbnail); ?>
                                            </a>
                                        </div>  
                                    <?php endif; ?>
                                    <div class="pxl-item--holder">
                                        <h5 class="pxl-item--title"><?php echo esc_attr($title); ?></h5>
                                        <div class="pxl-item--description"><?php echo esc_attr($desc); ?></div>
                                        <div class="pxl-item--bottom pxl-flex">
                                            <div class="pxl-item--price pxl-pr-20"><?php echo esc_attr($price); ?></div>
                                            <?php if(!empty($image['id']) && class_exists('WPCleverWoosw')) : 
                                                $img_url  = pxl_get_image_by_size( array(
                                                    'attach_id'  => $image['id'],
                                                    'thumb_size' => '150x150',
                                                ) );
                                                $thumbnail_url    = $img_url['url']; ?>
                                                <button class="woosw-btn woosw-btn-<?php echo esc_attr($product_id); ?>" data-id="<?php echo esc_attr($product_id); ?>" data-product_name="<?php echo esc_attr($title); ?>" data-product_image="<?php echo esc_url($thumbnail_url); ?>"></button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;  
                            if ($i % 2 == 0 && $i != count($settings['menu_food_l4'])) { 
                                echo '</div><div class="pxl-swiper-slide pxl-item--even">';
                            } ?>
                        <?php endforeach; echo "</div>" ?>
                    <?php } ?>
                </div>
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
<?php endif; ?>
