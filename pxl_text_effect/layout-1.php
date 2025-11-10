<?php if(!empty($settings['text'])) : ?>
	<div class="pxl-text-effect pxl-text-effect1 <?php echo esc_attr($settings['text_style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<div class="pxl-text--inner <?php echo esc_attr($settings['white_space']); ?>">
			<span class="pxl-text-front"><?php echo pxl_print_html($settings['text']); ?></span>
			<span class="pxl-text-backdrop <?php echo esc_attr($settings['text_effect']); ?>" <?php if($settings['text_effect'] == 'pxl-scroll-parallax') : ?>data-parallax='{"<?php echo esc_attr($settings['scroll_parallax_type']); ?>":<?php echo esc_attr($settings['parallax_scroll_value']); ?>}'<?php endif; ?> <?php if(!empty($settings['effect_speed'])) { ?>style="animation-duration:<?php echo esc_attr($settings['effect_speed']); ?>ms"<?php } ?>><?php echo pxl_print_html($settings['text']); ?></span>
		</div>
	</div>
<?php endif; ?>