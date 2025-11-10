<?php
$arrows = $widget->get_setting('arrows','false');  
$infinite = $widget->get_setting('infinite','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$drap = $widget->get_setting('drap','false');  
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', 'false');
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
    'loop'                          => $infinite,
    'speed'                         => $speed,
    'center'                        => $center,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial_l3']) && !empty($settings['testimonial_l3']) && count($settings['testimonial_l3'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel3" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial_l3'] as $key => $value):
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--boxleft">
                                    <div class="pxl-item--desc el-empty">
                                        <?php echo pxl_print_html($desc); ?>
                                        <div class="pxl-item--bottom pxl-flex">
                                            <?php if(!empty($image['id'])) { 
                                                $img = pxl_get_image_by_size( array(
                                                    'attach_id'  => $image['id'],
                                                    'thumb_size' => '80x80',
                                                    'class' => 'no-lazyload',
                                                ));
                                                $thumbnail = $img['thumbnail'];?>
                                                <div class="pxl-bottom--image pxl-mr-20">
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                </div>
                                            <?php } ?>
                                            <div class="pxl-bottom-meta">
                                                <h4 class="pxl-bottom--title"><?php echo esc_attr($title); ?></h4>
                                                <div class="pxl-bottom--position"><?php echo esc_attr($position); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="pxl-swiper--divider"><i class="flaticon-quote"></i></div>
            </div>

            <div class="pxl-swiper-thumbs" data-center="<?php echo esc_attr($center); ?>" data-loop="<?php echo esc_attr($settings['infinite']); ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['testimonial_l3'] as $key => $value_top):
                        $image = isset($value_top['image']) ? $value_top['image'] : '';
                        $title = isset($value_top['title']) ? $value_top['title'] : '';
                        $position = isset($value_top['position']) ? $value_top['position'] : '';
                        ?>
                        <div class="swiper-slide">
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => '119x119',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <div class="pxl-item--image pxl-cursor-remove">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                    <?php if(!empty($title) || !empty($position)) : ?>
                                        <div class="pxl-item--meta">
                                            <div class="pxl-item--overlay"></div>
                                            <h4 class="pxl-item--title"><?php echo esc_attr($title); ?></h4>
                                            <div class="pxl-item--position"><?php echo esc_attr($position); ?></div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-2"><i class="flaticon-left-arrow"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-2 active"><i class="flaticon-right-arrow"></i></div>
            </div>
        <?php endif; ?>
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-pagination">
                <div class="pxl-swiper-dots style-2"></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
