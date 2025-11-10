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
if(isset($settings['menu_food2']) && !empty($settings['menu_food2']) && count($settings['menu_food2'])): ?>
    <div class="pxl-swiper-sliders pxl-menu-food pxl-menu-food2" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['menu_food2'] as $key => $value):
                        $author_rating = isset($value['author_rating']) ? $value['author_rating'] : ''; 
                        $ratio_rating = isset($value['ratio_rating']) ? $value['ratio_rating'] : ''; 
                        $image = isset($value['image']) ? $value['image'] : ''; 
                        $title = isset($value['title']) ? $value['title'] : ''; 
                        $desc = isset($value['desc']) ? $value['desc'] : ''; 
                        $price = isset($value['price']) ? $value['price'] : '';
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
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($image['id'])) : ?>
                                    <div class="pxl-item--image">
                                        <?php $img_icon  = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => '176x176',
                                            ) );
                                            $thumbnail_icon    = $img_icon['thumbnail'];
                                        echo pxl_print_html($thumbnail_icon); ?>
                                    </div>  
                                <?php endif; ?>
                                <div class="pxl-item--top pxl-flex">
                                    <?php if(!empty($author_rating['id'])) : ?>
                                        <div class="pxl-item--author pxl-mr-9">
                                            <?php $img_author  = pxl_get_image_by_size( array(
                                                    'attach_id'  => $author_rating['id'],
                                                    'thumb_size' => 'full',
                                                ) );
                                                $thumbnail_author   = $img_author['thumbnail'];
                                            echo pxl_print_html($thumbnail_author); ?>
                                        </div>
                                        <?php if(!empty($ratio_rating)) : ?>
                                            <div class="pxl-item--ratio pxl-flex">
                                                <i class="flaticon-star pxl-mr-8"></i>
                                                <?php echo esc_attr($ratio_rating); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="pxl-item--holder">
                                    <h5 class="pxl-item--title"><?php echo esc_attr($title); ?></h5>
                                    <div class="pxl-item--description"><?php echo esc_attr($desc); ?></div>
                                    <div class="pxl-item--bottom">
                                        <div class="pxl-item--price"><?php echo esc_attr($price); ?></div>
                                        <?php if(!empty($btn_text)) : ?>
                                            <div class="pxl-item--button">
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
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-pagination">
                <div class="pxl-swiper-dots style-1"></div>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
