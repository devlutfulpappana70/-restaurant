<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

if($settings['col_xl'] == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / intval($widget->get_setting('col_xl', 4));
}
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<?php if(isset($settings['showcase']) && !empty($settings['showcase']) && count($settings['showcase'])): ?>
    <div class="pxl-grid pxl-showcase-grid pxl-showcase-grid2 <?php echo esc_attr($settings['style']); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['showcase'] as $key => $value):
    			$title = isset($value['title']) ? $value['title'] : '';
                $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                $btn_text2 = isset($value['btn_text2']) ? $value['btn_text2'] : '';
                $link = isset($value['btn_link']) ? $value['btn_link'] : '';
                $link2 = isset($value['btn_link']) ? $value['btn_link2'] : '';
                $link_key = $widget->get_repeater_setting_key( 'btn_text', 'value', $key );
                if ( ! empty( $link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                    if ( $link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );

                $link_key2 = $widget->get_repeater_setting_key( 'btn_text2', 'value', $key );
                if ( ! empty( $link2['url'] ) ) {
                    $widget->add_render_attribute( $link_key2, 'href', $link2['url'] );

                    if ( $link2['is_external'] ) {
                        $widget->add_render_attribute( $link_key2, 'target', '_blank' );
                    }

                    if ( $link2['nofollow'] ) {
                        $widget->add_render_attribute( $link_key2, 'rel', 'nofollow' );
                    }
                }
                $link_attributes2 = $widget->get_render_attribute_string( $link_key2 );

                $image = isset($value['image']) ? $value['image'] : '';
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <?php if(!empty($image['id'])) { 
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                            $thumbnail_url = $img['url'];
                            ?>
                            <div class="pxl-item--dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="pxl-item--image">
                                <?php echo wp_kses_post($thumbnail); ?>
                                <div class="pxl-item--overlay">
                                    <div class="bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
                                </div>
                                <div class="pxl-item--buttons">
                                    <?php if(!empty($btn_text) || !empty($btn_text2)) : ?>
                                        <div class="pxl-item--button">
                                            <a class="btn btn-primary" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                                <svg class="pxl-mr-12" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.2064 2H17.9995M17.9995 2V7.79311M17.9995 2L12.2064 7.79311M7.79363 18H2.00052M2.00052 18V12.2069M2.00052 18L8.00052 12M18 12.2064V17.9995M18 17.9995H12.2069M18 17.9995L12.2069 12.2064M2 7.79363L2 2.00052M2 2.00052L7.79311 2.00052M2 2.00052L8 8.00052" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <?php echo esc_attr($btn_text); ?>
                                            </a>
                                        </div>
                                        <div class="pxl-item--button">
                                            <?php if(!empty($btn_text2)) : ?>
                                                <a class="btn btn-primary" <?php echo implode( ' ', [ $link_attributes2 ] ); ?>>
                                                    <svg class="pxl-mr-12" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.2064 2H17.9995M17.9995 2V7.79311M17.9995 2L12.2064 7.79311M7.79363 18H2.00052M2.00052 18V12.2069M2.00052 18L8.00052 12M18 12.2064V17.9995M18 17.9995H12.2069M18 17.9995L12.2069 12.2064M2 7.79363L2 2.00052M2 2.00052L7.79311 2.00052M2 2.00052L8 8.00052" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                    <?php echo esc_attr($btn_text2); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <h5 class="pxl-item--title"><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo pxl_print_html($title); ?></a></h5>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
