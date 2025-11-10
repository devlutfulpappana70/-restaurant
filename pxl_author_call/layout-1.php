<div class="pxl-author-call pxl-author-call1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner pxl-flex">
        <?php if(!empty($settings['image']['id'])) : ?>
            <div class="pxl-item--image pxl-mr-15">
                <?php $img = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['image']['id'],
                    'thumb_size' => '150x150',
                ));
                $thumbnail = $img['thumbnail']; ?>
                <?php echo wp_kses_post($thumbnail); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--holder">
            <div class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></div>
            <div class="pxl-item--subtitle"><?php echo pxl_print_html($settings['sub_title']); ?></div>
            <?php if(!empty($settings['phone_number'])) : ?>
                <a href="<?php echo esc_attr($settings['phone_number']); ?>" class="pxl-item--call"><i class="flaticon-call"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>