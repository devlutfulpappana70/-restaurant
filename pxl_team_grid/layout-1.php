<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
    <div class="pxl-grid pxl-team-grid pxl-team-grid1 pxl-team-layout1">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['team'] as $key => $value):
    			$title = isset($value['title']) ? $value['title'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
                $phone_number = isset($value['phone_number']) ? $value['phone_number'] : '';
                $phone_link = isset($value['phone_link']) ? $value['phone_link'] : '';
                $email_address = isset($value['email_address']) ? $value['email_address'] : '';
                $email_link = isset($value['email_link']) ? $value['email_link'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $img_shape = isset($value['img_shape']) ? $value['img_shape'] : '';
                $social = isset($value['social']) ? $value['social'] : '';
                $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
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
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <div class="pxl-item--holder">
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => $image_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="pxl-item--image">
                                    <a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo wp_kses_post($thumbnail); ?></a>
                                    <?php if(!empty($img_shape['id'])) { 
                                        $img_shape = pxl_get_image_by_size( array(
                                            'attach_id'  => $img_shape['id'],
                                            'thumb_size' => 'full',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail_shape = $img_shape['thumbnail'];
                                        ?>
                                        <div class="pxl-item--shape pxl-image-tilt wow zoomInSmall" data-maxtilt="5" data-speedtilt="400" data-perspectivetilt="1000" data-wow-delay="200ms">
                                            <?php echo wp_kses_post($thumbnail_shape); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <h5 class="pxl-item--title">    
                                <?php echo pxl_print_html($title); ?>
                            </h5>
                            <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                        </div>
                        <div class="pxl-item--bottom bg-image">
                            <?php if(!empty($social)): ?>
                                <div class="pxl-item--social">
                                    <?php  $team_social = json_decode($social, true);
                                    foreach ($team_social as $value): ?>
                                        <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($phone_number)) : ?>
                                <div class="pxl-item--phone"><a href="<?php echo esc_attr($phone_link); ?>"><?php echo esc_attr($phone_number); ?></a></div>
                            <?php endif;  ?>
                            <div class="pxl-item--divider"></div>
                            <?php if(!empty($email_address)) : ?>
                                <div class="pxl-item--email"><a href="<?php echo esc_attr($email_link); ?>"><?php echo esc_attr($email_address); ?></a></div>
                            <?php endif;  ?>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
