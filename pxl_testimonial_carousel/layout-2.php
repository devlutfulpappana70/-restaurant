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
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial_l2']) && !empty($settings['testimonial_l2']) && count($settings['testimonial_l2'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel2" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial_l2'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--holder" data-parallax='{"y":30}'>
                                    <div class="pxl-item--meta">
                                        <i class="flaticon-quote-top"></i>
                                        <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                        <?php if(!empty($image['id'])) { 
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => '320x320',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];?>
                                            <div class="pxl-bottom--image">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></div>
                                        <?php if($pagination !== 'false'): ?>
                                            <div class="pxl-swiper-pagination">
                                                <div class="pxl-swiper-dots style-1"></div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '320x320',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--image" data-parallax='{"y":-30}'>
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-1"><i class="flaticon-arrow-left-bold"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-1"><i class="flaticon-arrow-right-bold"></i></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
