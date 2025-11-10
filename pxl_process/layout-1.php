<div class="pxl-process pxl-process1 <?php echo esc_attr($settings['image_position'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">

        <?php if($settings['image_position'] == 'img-bottom') : ?>
	        <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h3>
	        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
	    <?php endif; ?>
        
        <?php if(!empty($settings['image']['id'])) : ?>
            <div class="pxl-item--image">
                <?php $img = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['image']['id'],
                    'thumb_size' => '278x278',
                ));
                $thumbnail = $img['thumbnail']; ?>
                <?php echo wp_kses_post($thumbnail); ?>
                <div class="pxl-item--shape">
	            	<div class="shape-top"></div>
	            	<div class="shape-bottom"></div>
	            </div>
            </div>
        <?php endif; ?>

        <?php if($settings['image_position'] == 'img-top') : ?>
	        <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h3>
	        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
	    <?php endif; ?>

    </div>
</div>