<div class="pxl-video-parallax pxl-video-parallax1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner" <?php if($settings['parallax'] !== 'false') : ?>data-parallax='{"y":60}'<?php endif; ?>>
        <video loop autoplay>
            <source src="<?php echo esc_url($settings['video_link']); ?>" type="video/mp4">
        </video>
    </div>
</div>