<?php 
	$restaurant_name = str_replace(array(' ','/'), '-', strtolower($settings['restaurant_name']));
	wp_enqueue_script('datetimepicker', get_template_directory_uri() . '/assets/js/libs/datetimepicker.min.js', array('jquery'), '2.3.7', true);
	wp_enqueue_script('pxl-datetimepicker', get_template_directory_uri() . '/assets/js/libs/datetimepicker.pxl.js', array('jquery'), '1.0.0', true);
	wp_enqueue_style('pxl-datetimepicker', get_template_directory_uri() . '/assets/css/libs/datetimepicker.css', array(), '1.0.0');
?>
<div class="pxl-open-table <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php
    	switch ($settings['style']) {
    		case 'style-2': ?>
    			<form target="_blank" method="get" action="https://www.opentable.com/restref/client/">
			        <div class="row">
			            <div class="pxl-form--item col-lg-3 col-md-6 col-sm-12 col-xs-12">
			                <div class="pxl-item-group">
				                <select name="partysize">
				                    <?php for($i=1;$i<21;$i++):?>
				                        <option value="<?php echo esc_attr($i)?>"><?php echo esc_attr($i).' '.esc_html__('people', 'savour')?></option>
				                    <?php endfor ?>
				                </select>
				            </div>
			            </div>
			            <div class="pxl-form--item pxl-form-date col-lg-3 col-md-6 col-sm-12 col-xs-12">
			            	<div class="pxl-item-group">
				            	<input id="pxl-open-table-date" type="text"/>
				            </div>
			            </div>
			            <div class="pxl-form--item col-lg-3 col-md-6 col-sm-12 col-xs-12">
			            	<div class="pxl-item-group">
				                <select id="pxl-open-table-time">
				                    <option value="6:00">6:00 AM</option>
				                    <option value="6:30">6:30 AM</option>
				                    <option value="7:00">7:00 AM</option>
				                    <option value="7:30">7:30 AM</option>
				                    <option value="8:00">8:00 AM</option>
				                    <option value="8:30">8:30 AM</option>
				                    <option value="9:00">9:00 AM</option>
				                    <option value="9:30">9:30 AM</option>
				                    <option value="10:00">10:00 AM</option>
				                    <option value="10:30">10:30 AM</option>
				                    <option value="11:00">11:00 AM</option>
				                    <option value="11:30">11:30 AM</option>
				                    <option value="12:00">12:00 PM</option>
				                    <option value="12:30">12:30 PM</option>
				                    <option value="13:00">1:00 PM</option>
				                    <option value="13:30">1:30 PM</option>
				                    <option value="14:00">2:00 PM</option>
				                    <option value="14:30">2:30 PM</option>
				                    <option value="15:00">3:00 PM</option>
				                    <option value="15:30">3:30 PM</option>
				                    <option value="16:00">4:00 PM</option>
				                    <option value="16:30">4:30 PM</option>
				                    <option value="17:00">5:00 PM</option>
				                    <option value="17:30">5:30 PM</option>
				                    <option value="18:00">6:00 PM</option>
				                    <option value="18:30">6:30 PM</option>
				                    <option value="19:00">7:00 PM</option>
				                    <option value="19:30">7:30 PM</option>
				                    <option value="20:00">8:00 PM</option>
				                    <option value="20:30">8:30 PM</option>
				                    <option value="21:00">9:00 PM</option>
				                    <option value="21:30">9:30 PM</option>
				                    <option value="22:0m">10:00 PM</option>
				                    <option value="22:30">10:30 PM</option>
				                    <option value="23:00">11:00 PM</option>
				                    <option value="23:30">11:30 PM</option>
				                </select>
				            </div>
			            </div>
			            <div class="pxl-form--item pxl-btn-submit col-lg-3 col-md-6 col-sm-12 col-xs-12">
				            <button type="submit" class="btn btn-outline-normal"><?php echo esc_html__('Find a table', 'savour')?></button>
				        </div>
				        <input type="hidden" name="rid" value="<?php echo esc_attr($settings['restaurant_id']) ?>">
				        <input type="hidden" name="restref" value="<?php echo esc_attr($settings['restaurant_id']) ?>"/>
		                <input type="hidden" name="dateTime">
			        </div>
			    </form>
    		<?php break;
    		
    		default: ?>
    			<form target="_blank" method="get" action="https://www.opentable.com/restref/client/">
			        <div class="row">
			            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			                <div class="pxl-item-group">
				                <i class="pxl--form-icon flaticon-user"></i>
				                <select name="partysize">
				                    <?php for($i=1;$i<21;$i++):?>
				                        <option value="<?php echo esc_attr($i)?>"><?php echo esc_attr($i).' '.esc_html__('people', 'savour')?></option>
				                    <?php endfor ?>
				                </select>
				            </div>
			            </div>
			            <div class="pxl-form-date col-lg-4 col-md-12 col-sm-12 col-xs-12">
			            	<div class="pxl-item-group">
				            	<i class="pxl--form-icon flaticon-appointment"></i>
				                <input id="pxl-open-table-date" type="text"/>
				            </div>
			            </div>
			            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			            	<div class="pxl-item-group">
				                <i class="pxl--form-icon flaticon-clock"></i>
				                <select id="pxl-open-table-time">
				                    <option value="6:00">6:00 AM</option>
				                    <option value="6:30">6:30 AM</option>
				                    <option value="7:00">7:00 AM</option>
				                    <option value="7:30">7:30 AM</option>
				                    <option value="8:00">8:00 AM</option>
				                    <option value="8:30">8:30 AM</option>
				                    <option value="9:00">9:00 AM</option>
				                    <option value="9:30">9:30 AM</option>
				                    <option value="10:00">10:00 AM</option>
				                    <option value="10:30">10:30 AM</option>
				                    <option value="11:00">11:00 AM</option>
				                    <option value="11:30">11:30 AM</option>
				                    <option value="12:00">12:00 PM</option>
				                    <option value="12:30">12:30 PM</option>
				                    <option value="13:00">1:00 PM</option>
				                    <option value="13:30">1:30 PM</option>
				                    <option value="14:00">2:00 PM</option>
				                    <option value="14:30">2:30 PM</option>
				                    <option value="15:00">3:00 PM</option>
				                    <option value="15:30">3:30 PM</option>
				                    <option value="16:00">4:00 PM</option>
				                    <option value="16:30">4:30 PM</option>
				                    <option value="17:00">5:00 PM</option>
				                    <option value="17:30">5:30 PM</option>
				                    <option value="18:00">6:00 PM</option>
				                    <option value="18:30">6:30 PM</option>
				                    <option value="19:00">7:00 PM</option>
				                    <option value="19:30">7:30 PM</option>
				                    <option value="20:00">8:00 PM</option>
				                    <option value="20:30">8:30 PM</option>
				                    <option value="21:00">9:00 PM</option>
				                    <option value="21:30">9:30 PM</option>
				                    <option value="22:0m">10:00 PM</option>
				                    <option value="22:30">10:30 PM</option>
				                    <option value="23:00">11:00 PM</option>
				                    <option value="23:30">11:30 PM</option>
				                </select>
				            </div>
			            </div>
			        </div>
			        <div class="pxl-btn-submit">
			            <button type="submit" class="btn btn-default"><?php echo esc_html__('Find a table', 'savour')?></button>
			        </div>
			        <input type="hidden" name="rid" value="<?php echo esc_attr($settings['restaurant_id']) ?>">
			        <input type="hidden" name="restref" value="<?php echo esc_attr($settings['restaurant_id']) ?>"/>
	                <input type="hidden" name="dateTime">
			    </form>
    		<?php break;
    	}
    ?>
</div>