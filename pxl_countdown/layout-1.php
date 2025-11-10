<?php
$default_settings = [
    'date' => '2030/10/10',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$month = esc_html__('Month', 'savour');
$months = esc_html__('Months', 'savour');
$day = esc_html__('Day', 'savour');
$days = esc_html__('Days', 'savour');
$hour = esc_html__('Hour', 'savour');
$hours = esc_html__('Hours', 'savour');
$minute = esc_html__('Minute', 'savour');
$minutes = esc_html__('Minutes', 'savour');
$second = esc_html__('Second', 'savour');
$seconds = esc_html__('Seconds', 'savour');
?>
<div class="pxl-countdown-wrap">
	<div class="pxl-countdown pxl-countdown-layout1 <?php echo esc_attr($settings['pxl_animate']); ?>" 
		data-month="<?php echo esc_attr($month) ?>"
		data-months="<?php echo esc_attr($months) ?>"
		data-day="<?php echo esc_attr($day) ?>"
		data-days="<?php echo esc_attr($days) ?>"
		data-hour="<?php echo esc_attr($hour) ?>"
		data-hours="<?php echo esc_attr($hours) ?>"
		data-minute="<?php echo esc_attr($minute) ?>"
		data-minutes="<?php echo esc_attr($minutes) ?>"
		data-second="<?php echo esc_attr($second) ?>"
		data-seconds="<?php echo esc_attr($seconds) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<div class="pxl-countdown-inner" data-count-down="<?php echo esc_attr($date);?>"></div>
	</div>
</div>