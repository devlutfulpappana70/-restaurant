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
$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap','false');  
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
    'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
?>
<?php if(isset($settings['team_l3']) && !empty($settings['team_l3']) && count($settings['team_l3'])): 
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '213x213'; ?>
    <div class="pxl-swiper-sliders pxl-team pxl-team-carousel3 pxl-team-layout3" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-team--shape"></div>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['team_l3'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'item_link', 'value', $key );
                        if ( ! empty( $value['item_link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $value['item_link']['url'] );

                            if ( $value['item_link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $value['item_link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        $icon_label = isset($value['icon_label']) ? $value['icon_label'] : '';
                        $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                        $widget->add_render_attribute( $icon_key, [
                            'class' => $value['pxl_icon'],
                            'aria-hidden' => 'true',
                        ] );

                        $link_key_icon = $widget->get_repeater_setting_key( 'icon_link', 'value', $key );
                        if ( ! empty( $value['icon_link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key_icon, 'href', $value['icon_link']['url'] );

                            if ( $value['icon_link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key_icon, 'target', '_blank' );
                            }

                            if ( $value['icon_link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key_icon, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes_icon = $widget->get_render_attribute_string( $link_key_icon );

                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                    ?>
                                    <div class="pxl-item--image">
                                        <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo wp_kses_post($thumbnail); ?></a>
                                    </div>
                                <?php } ?>

                                <div class="pxl-item--holder">
                                    <h5 class="pxl-item--title">    
                                        <?php echo pxl_print_html($title); ?>
                                    </h5>
                                    <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                </div>

                                <div class="pxl-item--bottom pxl-flex">
                                    <a class="pxl-flex" <?php echo implode( ' ', [ $link_attributes_icon ] ); ?>>
                                        <?php if ( $is_new ):
                                            \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                                        elseif(!empty($value['pxl_icon'])): ?>
                                            <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                                        <?php endif; ?>
                                        <span class="pxl-ml-14"><?php echo esc_attr($icon_label); ?></span>
                                    </a>
                                </div>      
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <?php if($arrows !== 'false'): 
                $mouse_move_animation = savour()->get_theme_opt('mouse_move_animation', false); ?>
                <div class="pxl-swiper-arrow-wrap">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-2 <?php if($mouse_move_animation) { echo 'pxl-mouse-effect'; } ?>" data-cursor-icon-left="arrow-left"><i class="flaticon-left-arrow"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-2 active <?php if($mouse_move_animation) { echo 'pxl-mouse-effect'; } ?>" data-cursor-icon-right="arrow-right"><i class="flaticon-right-arrow"></i></div>
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

<div class="box"></div>
