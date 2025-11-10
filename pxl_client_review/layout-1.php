<div class="pxl-client-review pxl-client-review1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner pxl-flex">
        <div class="pxl-item--images pxl-mr-28">
            <?php foreach ($settings['images'] as $key => $value): 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $value['id'],
                    'thumb_size' => '56x56',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="pxl-item--img">
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pxl-item--holder">
            <div class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></div>
            <div class="pxl-item--meta pxl-flex">
                <div class="pxl-item--star pxl-mr-10 <?php echo esc_attr($settings['rating_star']); ?>">
                    <div class="star-solid pxl-flex">
                        <i class="flaticon-star"></i>
                        <i class="flaticon-star"></i>
                        <i class="flaticon-star"></i>
                        <i class="flaticon-star"></i>
                        <i class="flaticon-star"></i>
                    </div>
                    <div class="star-outline pxl-flex">
                        <i class="flaticon-star-outline"></i>
                        <i class="flaticon-star-outline"></i>
                        <i class="flaticon-star-outline"></i>
                        <i class="flaticon-star-outline"></i>
                        <i class="flaticon-star-outline"></i>
                    </div>
                </div>
                <div class="pxl-item--number pxl-mr-6"><?php echo esc_attr($settings['rating_number']); ?></div>
                <div class="pxl-item--label"><?php echo esc_attr($settings['rating_label']); ?></div>
            </div>
        </div>
    </div>
</div>