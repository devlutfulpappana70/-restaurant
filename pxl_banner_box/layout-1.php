<div class="pxl-banner pxl-banner1 <?php echo esc_attr($settings['image_position']); ?>">
	<div class="pxl-banner-inner">
		<div class="pxl-item--left" data-parallax='{"y":0}'>
			<div class="pxl-item--meta pxl-item--metaTop">
				<div class="pxl-item--number"><?php echo esc_attr($settings['banner_number']); ?></div>
				<?php if(!empty($settings['banner_label'])) : ?>
					<div class="pxl-item--label"><?php echo esc_attr($settings['banner_label']); ?></div>
				<?php endif; ?>
			</div>

			<?php if(!empty($settings['banner_image']['id'])) : 
				$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; 
				$img = pxl_get_image_by_size( array(
					'attach_id'  => $settings['banner_image']['id'],
					'thumb_size' => $image_size,
				));
				$thumbnail = $img['thumbnail']; ?>
				<div class="pxl-item--image wow <?php if($settings['image_position'] == 'pos-left') { echo 'skewIn'; } else { echo 'skewInRight'; } ?>">
					<?php echo pxl_print_html($thumbnail); ?>
				</div>
			<?php endif; ?>
			<div class="pxl-item--meta pxl-item--metaBottom wow fadeInUp" data-wow-delay="240ms">
				<div class="pxl-item--number"><?php echo esc_attr($settings['banner_number']); ?></div>
				<?php if(!empty($settings['banner_label'])) : ?>
					<div class="pxl-item--label"><?php echo esc_attr($settings['banner_label']); ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="pxl-item--right" data-parallax='{"y":0}'>
			<div class="pxl-item--holder wow <?php if($settings['image_position'] == 'pos-left') { echo 'fadeInRight'; } else { echo 'fadeInLeft'; } ?>" data-wow-delay="240ms">
				<div class="pxl-item--subtitle"><?php echo esc_attr($settings['banner_sub_title']); ?></div>
				<h3 class="pxl-item--title"><?php echo esc_attr($settings['banner_title']); ?></h3>
				<?php if(!empty($settings['banner_divider']['id'])) : 
					$img_divider = pxl_get_image_by_size( array(
						'attach_id'  => $settings['banner_divider']['id'],
						'thumb_size' => 'full',
					));
					$thumbnail_divider = $img_divider['thumbnail']; ?>
					<div class="pxl-item--divider">
						<?php echo pxl_print_html($thumbnail_divider); ?>
					</div>
				<?php endif; ?>
				<div class="pxl-item--description"><?php echo esc_attr($settings['banner_desc']); ?></div>
				<?php if(!empty($settings['btn_text'])) : 
					if ( ! empty( $settings['btn_link']['url'] ) ) {
					    $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );

					    if ( $settings['btn_link']['is_external'] ) {
					        $widget->add_render_attribute( 'button', 'target', '_blank' );
					    }

					    if ( $settings['btn_link']['nofollow'] ) {
					        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
					    }
					}
					?>
					<div class="pxl-item--button">
						<a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> class="btn btn-outline btn-text-nina">
							<span class="pxl--btn-text" data-text="<?php echo esc_attr($settings['btn_text']); ?>">
								<?php $chars = str_split($settings['btn_text']);
			                    foreach ($chars as $value) {
			                        if($value == ' ') {
			                            echo '<span class="spacer">&nbsp;</span>';
			                        } else {
			                            echo '<span>'.$value.'</span>';
			                        }
			                    } ?>
							</span>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>