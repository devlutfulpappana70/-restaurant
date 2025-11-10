<div class="pxl-image-box pxl-image-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( !empty($settings['image']['id']) ) : 
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $image_size,
            ) );
            $thumbnail_url    = $img['url'];
            ?>
            <div class="pxl-item--image bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>

        <?php endif; ?>
        <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h3>
        <div class="pxl-item--subtitle el-empty"><?php echo pxl_print_html($settings['sub_title']); ?></div>
        
        <?php if ( !empty($settings['btn_text']) && ! empty( $settings['btn_link']['url'] ) ) {
            $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

            if ( $settings['btn_link']['is_external'] ) {
                $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
            }

            if ( $settings['btn_link']['nofollow'] ) {
                $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
            } ?>
            <div class="pxl-item--button">
                <a class="btn" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><?php echo esc_attr($settings['btn_text']); ?></a>
            </div>
        <?php } ?>
    </div>
</div>