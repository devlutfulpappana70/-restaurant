<?php
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
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
    'slide_mode'                    => 'fade', 
    'slides_to_show'                => '1',
    'slides_to_show_xxl'            => '1',
    'slides_to_show_lg'             => '1',
    'slides_to_show_md'             => '1',
    'slides_to_show_sm'             => '1',
    'slides_to_show_xs'             => '1',
    'slides_to_scroll'              => '1',
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => 'false',
    'speed'                         => $speed,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$number_item = count($settings['slider_l2']);
if(isset($settings['slider_l2']) && !empty($settings['slider_l2']) && count($settings['slider_l2'])): ?>
    <div class="pxl-element-slider pxl-swiper-sliders pxl-slider pxl-slider2" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="bg-image <?php if($settings['box_image_parallax'] !== 'false') { echo 'bg-image-parallax'; } ?>" <?php if($settings['box_image_parallax'] !== 'false') : ?>data-parallax='{"y":-70}'<?php endif; ?>></div>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['slider_l2'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $title = isset($value['title']) ? $value['title'] : '';
                        $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                        $description = isset($value['description']) ? $value['description'] : '';
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
                        $icon_key = $widget->get_repeater_setting_key( 'btn_icon', 'icons', $key );
                        $widget->add_render_attribute( $icon_key, [
                            'class' => $value['btn_icon'],
                            'aria-hidden' => 'true',
                        ] );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner">
                                <div class="pxl-item--left">
                                    <div class="pxl-item--content">
                                        <?php if(!empty($sub_title)) : ?>
                                            <div class="pxl-item--subtitle wow PXLfadeInUp" data-wow-delay="200ms">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="39" viewBox="0 0 34 39"><path class="color-primary" d="M12.019,26.5c2.32-3.613,6.768-6.212,11.03-7.167,1.859,0.213,3.735.351,5.567,0.678a3.453,3.453,0,0,1,1.751,1.076c1.119,1.2.982,1.742-.306,2.933-3.657,3.383-7.286,6.8-10.926,10.2-0.271.255-.53,0.522-0.807,0.769-1.553,1.386-3.281,2.286-5.265,1.494a4.452,4.452,0,0,1-2.813-4.9A12.19,12.19,0,0,1,12.019,26.5Z"/><path d="M30.293,14.787c-1.169.206-2.367,0.155-3.545,0.311-4.063.537-8.12,1.165-12.185,1.656A39.588,39.588,0,0,1,8.4,17.1,7.962,7.962,0,0,1,4.95,16.066c-3.266-1.816-3.78-5.545-1.187-8.523a15.76,15.76,0,0,1,9.456-5.1c6.644-.706,12.647.54,16.612,6.414a17.9,17.9,0,0,1,1.857,3.916C32.087,13.875,31.349,14.6,30.293,14.787Z"/></svg>
                                                <span><?php echo esc_attr($sub_title); ?></span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="29" viewBox="0 0 36 29"><path class="color-primary" d="M9.745,20.884c4.954-3.266,10.2-4.549,15.715-2.721a12.136,12.136,0,0,1,3.866,2.218,10.481,10.481,0,0,1,1.732,2.742c-0.024,2-.851,3.559-2.651,4.02a8.873,8.873,0,0,1-3.99.133c-3.439-.768-6.8-1.809-10.213-2.693-1.335-.346-2.738-0.479-4.054-0.874A2.307,2.307,0,0,1,8.611,22.52,2.444,2.444,0,0,1,9.745,20.884Z"/><path d="M33.213,9.4a11.979,11.979,0,0,1-5.94,3.175c-4.462,1.056-8.972,1.869-13.4,3.085-2.814.772-5.509,2.091-8.261,3.154a7.228,7.228,0,0,1-1.937.647,1.405,1.405,0,0,1-1.284-2.249C8.3,9.7,15.036,3.391,24.722,1.858a19.273,19.273,0,0,1,6.17.187,4.459,4.459,0,0,1,3.633,3.629A4.363,4.363,0,0,1,33.213,9.4Z"/></svg> 
                                            </div>
                                        <?php endif; ?>
                                        <?php if(!empty($title)) : ?>
                                            <h3 class="pxl-item--title wow PXLfadeInUp" data-wow-delay="400ms"><?php echo esc_attr($title); ?></h3>
                                            <div class="pxl-item--divider wow PXLfadeInUp" data-wow-delay="600ms">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="273.000000pt" height="19.000000pt" viewBox="0 0 273.000000 19.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,19.000000) scale(0.100000,-0.100000)" class="color-primary" stroke="none"><path d="M1545 159 c-533 -17 -1033 -58 -1381 -114 -189 -31 -130 -29 226 6 542 52 947 77 1485 89 231 5 453 10 494 10 41 0 72 3 68 6 -9 9 -630 12 -892 3z"/></g></svg>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pxl-item--desc wow PXLfadeInUp" data-wow-delay="800ms"><?php echo esc_attr($description); ?></div>
                                        <?php if(!empty($btn_text)) : ?>
                                            <div class="pxl-item--button wow PXLfadeInUp" data-wow-delay="1000ms">
                                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?> class="btn btn-default">
                                                    <?php if ( $is_new ):
                                                        \Elementor\Icons_Manager::render_icon( $value['btn_icon'], [ 'aria-hidden' => 'true' ] );
                                                    elseif(!empty($value['btn_icon'])): ?>
                                                        <i class="<?php echo esc_attr( $value['btn_icon'] ); ?>" aria-hidden="true"></i>
                                                    <?php endif; ?>
                                                    <span class="pxl-ml-12"><?php echo esc_attr($btn_text); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '414x414',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--right">
                                        <div class="pxl-item--image">
                                            <div class="pxl-image--bg wow zoomInSmall" data-wow-delay="200ms"></div>
                                            <div class="pxl-item--number wow zoomInSmall" data-wow-delay="600ms"><?php if($key < 8) { echo '0'; } echo esc_attr($key + 1); ?></div>
                                            <div class="pxl-image--main wow zoomInSmall" data-wow-delay="300ms"><?php echo wp_kses_post($thumbnail); ?></div>
                                            <div class="slider-shape bg-image slider-shape1 wow skewInRight" data-wow-delay="500ms"></div>
                                            <div class="slider-shape bg-image slider-shape2 wow skewIn" data-wow-delay="500ms"></div>
                                            <div class="pxl-item-icon">
                                                <div class="icon-left wow zoomInSmall" data-wow-delay="700ms"><i class="flaticon-forward"></i></div>
                                                <div class="icon-right wow zoomInSmall" data-wow-delay="700ms"><i class="flaticon-forward"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($number_item <= 3) { ?>
                <div class="pxl-swiper-thumbs" data-loop="<?php echo esc_attr($settings['infinite']); ?>" data-center="true" data-direction="vertical">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['slider_l2'] as $key => $value_thumb):
                            $title_thumb = isset($value_thumb['title']) ? $value_thumb['title'] : '';
                            $image_thumb = isset($value_thumb['image']) ? $value_thumb['image'] : ''; ?>
                            <div class="swiper-slide">
                                <div class="pxl-thumb--inner">
                                    <?php if(!empty($image_thumb['id'])) { 
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $image_thumb['id'],
                                            'thumb_size' => '128x128',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail'];?>
                                        <div class="pxl-thumb--image">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                        <div class="pxl-thumb--title"><?php echo esc_attr($title_thumb); ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-1"><i class="flaticon-arrow-left-bold"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-1 active"><i class="flaticon-arrow-right-bold"></i></div>
            </div>
        <?php endif; ?>

        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-pagination">
                <div class="pxl-swiper-dots style-1"></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
