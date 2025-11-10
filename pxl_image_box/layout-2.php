<div class="pxl-image-box pxl-image-box2 <?php echo esc_attr($settings['style_l2'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( !empty($settings['image']['id']) ) : 
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $image_size,
            ) );
            $thumbnail   = $img['thumbnail'];
            $thumbnail_url    = $img['url'];
            ?>
            <div class="pxl-item--image">
                <div class="bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            </div>
            <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h3>
        <?php endif; ?>
    </div>
</div>