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
if(isset($settings['menu_food5']) && !empty($settings['menu_food5']) && count($settings['menu_food5'])): ?>
    <div class="pxl-swiper-sliders pxl-menu-food pxl-menu-food5" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['menu_food5'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : ''; 
                        $image_shape = isset($value['image_shape']) ? $value['image_shape'] : ''; 
                        $label = isset($value['label']) ? $value['label'] : '';
                        $price = isset($value['price']) ? $value['price'] : '';
                        $price_position = isset($value['price_position']) ? $value['price_position'] : '';
                        $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                        $btn_link = isset($value['btn_link']) ? $value['btn_link'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
                        if ( ! empty( $btn_link['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $btn_link['url'] );

                            if ( $btn_link['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $btn_link['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($image['id'])) : ?>
                                    <div class="pxl-item--image">
                                        <?php $img  = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => 'full',
                                            ) );
                                            $thumbnail    = $img['thumbnail'];
                                        echo pxl_print_html($thumbnail); ?>
                                        <div class="pxl-item--price bg-image <?php echo esc_attr($price_position); ?>">
                                            <div class="pxl-item--price-inner">
                                                <label><?php echo esc_attr($label); ?></label>
                                                <span><?php echo esc_attr($price); ?></span>
                                            </div>
                                        </div>
                                    </div>  
                                <?php endif; ?>
                                <?php if(!empty($btn_text)) : ?>
                                    <div class="pxl-item--button">
                                        <a class="btn btn-morden" <?php echo implode( ' ', [ $link_attributes ] ); ?> class="btn btn-default"><?php echo esc_attr($btn_text); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($image_shape['id'])) : ?>
                                    <div class="pxl-below--image">
                                        <?php $img_shape  = pxl_get_image_by_size( array(
                                                'attach_id'  => $image_shape['id'],
                                                'thumb_size' => 'full',
                                            ) );
                                            $thumbnail_shape = $img_shape['thumbnail'];
                                        echo pxl_print_html($thumbnail_shape); ?>
                                    </div>
                                <?php endif; ?>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <div class="pxl-below--text el-empty"><?php echo esc_attr($settings['text_outline']); ?></div>

        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-1"><i class="flaticon-arrow-left-bold"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-1"><i class="flaticon-arrow-right-bold"></i></div>
            </div>
        <?php endif; ?>
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-pagination">
                <div class="pxl-swiper-dots style-1"></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
