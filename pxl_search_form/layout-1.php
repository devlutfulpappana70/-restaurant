<form role="search" method="get" class="pxl-search-form <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" action="<?php echo esc_url(home_url( '/' )); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-searchform-wrap">
        <input type="text" class="pxl-search-field" placeholder="<?php if(!empty($settings['email_placefolder'])) { echo esc_attr($settings['email_placefolder']); } else { esc_attr_e('Type Words Then Enter', 'savour'); } ?>" name="s" />
    	<button type="submit" class="pxl-search-submit"><i class="flaticon-search"></i></button>
    	<div class="pxl-searchform-divider"></div>
    </div>
</form>