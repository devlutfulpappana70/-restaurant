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
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel1" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $heading = isset($value['heading']) ? $value['heading'] : '';
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $banner = isset($value['banner']) ? $value['banner'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--boxleft bg-image <?php if(!empty($banner['url'])) { echo 'box-right-active'; } ?>">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><g><path d="M50.6292648,26.225668c-0.1288986-1.3934994-0.0303001-5.1816006,3.5985985-10.4492006c0.2745018-0.3975,0.2247009-0.9335995-0.1161957-1.2743998c-1.4795036-1.4794998-2.395504-2.4131002-3.0379982-3.0663996c-0.8448029-0.8614006-1.2305031-1.2539005-1.795002-1.7657003c-0.3769035-0.3388004-0.9472008-0.3446999-1.3281021-0.0125999c-6.3251991,5.5038996-13.3505974,16.8768997-12.3339958,30.8105011c0.5956955,8.1815987,6.5634956,14.1200981,14.1894951,14.1200981c7.8260994,0,14.1932983-6.3661995,14.1932983-14.1923981C63.9993629,32.845768,58.0736694,26.6543674,50.6292648,26.225668z M49.8060646,52.5879669c-6.5489006,0-11.6767998-5.1581993-12.1953011-12.2645988c0,0,0,0,0-0.0009995c-1.1435966-15.6709003,8.1718025-25.8496017,10.9863014-28.5449009c0.2743988,0.2705002,0.5878983,0.5887995,1.0498009,1.0594997c0.5565987,0.5664005,1.3183975,1.3417997,2.4706993,2.4981003c-4.4053001,6.7870998-3.5741997,11.6229992-3.2099991,12.3164005c0.1728973,0.3290997,0.5273972,0.5508003,0.8984985,0.5508003c6.7236023,0,12.1932983,5.469698,12.1932983,12.1933002C61.9993629,47.1182671,56.5296669,52.5879669,49.8060646,52.5879669z"/><path d="M15.1136675,26.225668c-0.1299-1.3896008-0.0341997-5.1748009,3.5985994-10.4492006c0.2735004-0.3975,0.2245998-0.9335995-0.1161995-1.2743998c-1.4766006-1.4765997-2.3915997-2.4091997-3.0332003-3.0625c-0.8476-0.8633003-1.2343998-1.2568998-1.7987995-1.7695999c-0.3769999-0.3388004-0.9473-0.3437004-1.3281002-0.0136003c-6.3251996,5.5039005-13.3515997,16.875-12.3369999,30.8115005v0.0009995c0.5977,8.1805992,6.5664001,14.1190987,14.1924,14.1190987c7.8261995,0,14.1934004-6.3661995,14.1934004-14.1923981C28.4847679,32.8448677,22.5589676,26.6524677,15.1136675,26.225668z M14.2913675,52.5879669c-6.5478001,0-11.6786995-5.1581993-12.1982002-12.2655983v0.0009995c-1.1406-15.6748009,8.1747999-25.8516006,10.9892006-28.5459003c0.2754002,0.2705002,0.5899,0.5908003,1.0528002,1.0625c0.5555992,0.5663996,1.3163996,1.3408003,2.4667988,2.4951c-4.4052992,6.7880993-3.5741997,11.6229992-3.2099991,12.3153992c0.1729002,0.3291016,0.5283003,0.5518017,0.8993998,0.5518017c6.7237005,0,12.1934004,5.469698,12.1934004,12.1933002C26.4847679,47.1182671,21.0150681,52.5879669,14.2913675,52.5879669z"/></g></svg>
                                    <div class="pxl-item--holder">
                                        <h5 class="pxl-item--heading el-empty"><?php echo pxl_print_html($heading); ?></h5>
                                        <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                        <div class="pxl-item--bottom">
                                            <?php if(!empty($image['id'])) { 
                                                $img = pxl_get_image_by_size( array(
                                                    'attach_id'  => $image['id'],
                                                    'thumb_size' => '80x80',
                                                    'class' => 'no-lazyload',
                                                ));
                                                $thumbnail = $img['thumbnail'];?>
                                                <div class="pxl-item--avatar pxl-mr-18">
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                </div>
                                            <?php } ?>
                                            <div class="pxl-item--meta">
                                                <h5 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h5>
                                                <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(!empty($banner['url'])) : ?>
                                    <div class="pxl-item--boxright bg-image" style="background-image: url(<?php echo esc_url($banner['url']); ?>);"></div>
                                <?php endif; ?>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="pxl-swiper-thumbs" data-loop="<?php echo esc_attr($settings['infinite']); ?>">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value_top):
                        $image = isset($value_top['image']) ? $value_top['image'] : '';
                        ?>
                        <div class="swiper-slide">
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => '90x90',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <div class="pxl-item--image pxl-cursor-remove">
                                    <?php echo wp_kses_post($thumbnail); ?>
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
                <div class="pxl-swiper-dots style-1"></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
