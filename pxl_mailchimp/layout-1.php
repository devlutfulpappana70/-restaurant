<?php if(class_exists('MC4WP_Container')) : ?>
	<div class="pxl-mailchimp pxl-mailchimp-l1 <?php echo esc_attr($settings['style']); ?>">
		<?php if($settings['style'] == 'style-box' && !empty($settings['title'])) : ?>
			<div class="pxl-mailchimp--title bg-image">
				<?php echo esc_attr($settings['title']); ?>
			</div>
		<?php endif; ?>
		<?php echo do_shortcode('[mc4wp_form]'); ?>
	</div>
<?php endif; ?>
