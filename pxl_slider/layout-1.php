<?php
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
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
    'drap'                          => 'false',
    'speed'                         => $speed,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['slider']) && !empty($settings['slider']) && count($settings['slider'])): ?>
    <div class="pxl-element-slider pxl-swiper-sliders pxl-slider pxl-slider1" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="bg-image <?php if($settings['box_image_parallax'] !== 'false') { echo 'bg-image-parallax'; } ?>" <?php if($settings['box_image_parallax'] !== 'false') : ?>data-parallax='{"y":-70}'<?php endif; ?>></div>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['slider'] as $key => $value):
                        $time = isset($value['image']) ? $value['time'] : '';
                        $price = isset($value['price']) ? $value['price'] : '';
                        $popular_icon = isset($value['popular_icon']) ? $value['popular_icon'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $popular = isset($value['popular']) ? $value['popular'] : '';
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
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '493x493',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--left">
                                        <div class="pxl-item--image">
                                            <div class="pxl-image--main wow zoomInSmall" data-wow-delay="0ms">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </div>
                                            <div class="pxl-image--rotate wow PXLrotateIn" data-wow-delay="0ms"><?php echo wp_kses_post($thumbnail); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item--right">
                                    <div class="pxl-item--content">
                                        <div class="pxl-item--meta wow skewIn" data-wow-delay="700ms">
                                            <div class="pxl-item--meta-inner">
                                                <?php if(!empty($settings['shape_image']['id'])) { 
                                                    $img_shape = pxl_get_image_by_size( array(
                                                        'attach_id'  => $settings['shape_image']['id'],
                                                        'thumb_size' => 'full',
                                                        'class' => 'no-lazyload',
                                                    ));
                                                    $thumbnail_shape = $img_shape['thumbnail'];?>
                                                    <div class="pxl-shape--image">
                                                        <?php echo wp_kses_post($thumbnail_shape); ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="pxl-item--time">
                                                    <div class="pxl-time--inner">
                                                        <i class="caseicon-clock"></i>
                                                        <span><?php echo esc_attr($time); ?></span>
                                                    </div>
                                                </div>
                                                <?php if(!empty($price)) : ?>
                                                    <div class="pxl-item--middle">
                                                        <div class="pxl-item--star">
                                                            <i class="flaticon-star"></i>
                                                            <i class="flaticon-star"></i>
                                                            <i class="flaticon-star"></i>
                                                            <i class="flaticon-star"></i>
                                                            <i class="flaticon-star"></i>
                                                        </div>
                                                        <div class="pxl-item--price el-empty"><?php echo esc_attr($price); ?></div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="pxl-item--popular pxl-flex wow skewIn" data-wow-delay="700ms">
                                            <?php if(!empty($popular_icon['id'])) { 
                                                $img_icon = pxl_get_image_by_size( array(
                                                    'attach_id'  => $popular_icon['id'],
                                                    'thumb_size' => 'full',
                                                    'class' => 'no-lazyload',
                                                ));
                                                $thumbnail_icon = $img_icon['thumbnail'];
                                                echo wp_kses_post($thumbnail_icon);
                                            } ?>
                                            <span><?php echo esc_attr($popular); ?></span>
                                        </div>
                                        <div class="pxl-item--subtitle wow skewInRight" data-wow-delay="700ms"><?php echo esc_attr($sub_title); ?></div>
                                        <h3 class="pxl-item--title wow skewIn" data-wow-delay="700ms"><?php echo esc_attr($title); ?></h3>
                                        <div class="pxl-item--desc wow skewInRight" data-wow-delay="700ms"><?php echo esc_attr($description); ?></div>
                                        <?php if(!empty($btn_text)) : ?>
                                            <div class="pxl-item--button wow skewIn" data-wow-delay="700ms">
                                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?> class="btn btn-default">
                                                    <?php if ( $is_new ):
                                                        \Elementor\Icons_Manager::render_icon( $value['btn_icon'], [ 'aria-hidden' => 'true' ] );
                                                    elseif(!empty($value['btn_icon'])): ?>
                                                        <i class="<?php echo esc_attr( $value['btn_icon'] ); ?>" aria-hidden="true"></i>
                                                    <?php endif; ?>
                                                    <span class="pxl-ml-15"><?php echo esc_attr($btn_text); ?></span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="pxl-swiper-thumbs-wrap">
                <div class="pxl-swiper-thumbs">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['slider'] as $key => $value_thumb):
                            $title_thumb = isset($value_thumb['thumb_title']) ? $value_thumb['thumb_title'] : '';
                            $image_thumb = isset($value_thumb['image']) ? $value_thumb['image'] : ''; ?>
                            <div class="swiper-slide">
                                <div class="pxl-thumb--inner">
                                    <?php if(!empty($image_thumb['id'])) { 
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $image_thumb['id'],
                                            'thumb_size' => '142x142',
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
                <?php if($arrows !== 'false'): ?>
                    <div class="pxl-swiper-arrow-wrap">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-1"><i class="flaticon-arrow-left-bold"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-1 active"><i class="flaticon-arrow-right-bold"></i></div>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-pagination">
                <div class="pxl-swiper-dots style-1"></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
