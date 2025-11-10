<?php if(isset($settings['images']) && !empty($settings['images']) && count($settings['images'])): ?>
    <div class="pxl-image-effect pxl-image-effect-1 <?php echo esc_attr($settings['hover_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-image--content" <?php if(!empty($settings['effect_speed'])) { ?>style="animation-duration:<?php echo esc_attr($settings['effect_speed']); ?>ms"<?php } ?>>
            <?php $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '550x550';
                foreach ($settings['images'] as $key => $value):
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
                ?>
                <div class="pxl-image--item">
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
                        </div>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
            <?php $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '550x550';
                foreach ($settings['images'] as $key => $value_bottom):
                $image = isset($value_bottom['image']) ? $value_bottom['image'] : '';
                $link_key2 = $widget->get_repeater_setting_key( 'item_link2', 'value', $key );
                if ( ! empty( $value_bottom['item_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key2, 'href', $value_bottom['item_link']['url'] );

                    if ( $value_bottom['item_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key2, 'target', '_blank' );
                    }

                    if ( $value_bottom['item_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key2, 'rel', 'nofollow' );
                    }
                }
                $link_attributes2 = $widget->get_render_attribute_string( $link_key2 );
                ?>
                <div class="pxl-image--item">
                   <?php if(!empty($image['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => $image_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="pxl-item--image">
                            <a <?php echo implode( ' ', [ $link_attributes2 ] ); ?>><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>