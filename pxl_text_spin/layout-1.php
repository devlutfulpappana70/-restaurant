<?php $html_id = pxl_get_element_id($settings); ?>
<div class="pxl-text-spin pxl-text-spin1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if ( !empty($settings['logo']['id']) ) : 
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['logo']['id'],
            'thumb_size' => $image_size,
        ) );
        $thumbnail    = $img['thumbnail'];
        ?>
        <div class="pxl-item--logo"><?php echo wp_kses_post($thumbnail); ?></div>
    <?php endif; ?>
    <div class="pxl-item--text">
        <svg viewBox="0 0 200 200" width="200" height="200">
            <defs>
                <path id="pxl-circle-<?php echo esc_attr($html_id); ?>" d="M 100, 100m -75, 0a 75, 75 0 1, 0 150, 0a 75, 75 0 1, 0 -150, 0"></path>
            </defs>
            <text>
                <textPath alignment-baseline="top" xlink:href="#pxl-circle-<?php echo esc_attr($html_id); ?>" class="text">
                    <?php echo pxl_print_html($settings['text']); ?>
                </textPath>
            </text>
        </svg>
    </div>
</div>