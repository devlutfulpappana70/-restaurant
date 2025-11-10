<?php
$thumb_col_xs = $widget->get_setting('thumb_col_xs'); 
$thumb_col_sm = $widget->get_setting('thumb_col_sm'); 
$thumb_col_md = $widget->get_setting('thumb_col_md'); 
$thumb_col_lg = $widget->get_setting('thumb_col_lg'); 

$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
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
    'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): ?>
    <div class="pxl-swiper-sliders pxl-tabs-carousel pxl-tabs-carousel1">
        <div class="pxl-carousel-inner">
            
            <div class="pxl-swiper-thumbs-wrap">
                <div class="pxl-swiper-thumbs" data-loop="<?php echo esc_attr($infinite); ?>" data-center="false" data-thumbxs="<?php echo esc_attr($thumb_col_xs); ?>" data-thumbsm="<?php echo esc_attr($thumb_col_sm); ?>" data-thumbmd="<?php echo esc_attr($thumb_col_md); ?>" data-thumblg="<?php echo esc_attr($thumb_col_lg); ?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['tabs'] as $key => $value_top):
                            $title = isset($value_top['title']) ? $value_top['title'] : '';
                            ?>
                            <div class="swiper-slide">
                                <div class="pxl-tab--title"><span><?php echo pxl_print_html($title); ?></span></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if($arrows !== 'false'): ?>
                    <div class="pxl-swiper-arrow-wrap">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-1"><i class="caseicon-angle-arrow-left"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-1"><i class="caseicon-angle-arrow-right"></i></div>
                    </div>
                <?php endif; ?>

            </div>

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['tabs'] as $key => $value): ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($value['content_template'])) { ?>
                                    <div class="pxl-item--content">
                                        <?php $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$value['content_template']);
                                        pxl_print_html($tab_content); ?>
                                    </div>
                                <?php } ?>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-pagination">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
