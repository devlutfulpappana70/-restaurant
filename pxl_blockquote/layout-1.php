<?php
$editor_content = $widget->get_settings_for_display( 'text_ed' );
$editor_content = $widget->parse_text_editor( $editor_content );
?>
<div class="pxl-blockquote-wrap">
	<blockquote class="pxl-blockquote <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<i class="flaticon-quote-top quote-icon1"></i>
		<?php echo wp_kses_post($editor_content); ?>
		<i class="flaticon-quote-top quote-icon2"></i>	
	</blockquote>
</div>