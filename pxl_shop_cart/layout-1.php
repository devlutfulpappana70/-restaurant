<?php if ( class_exists( 'Woocommerce' ) ) { ?>
	<div class="pxl-cart-sidebar-button">
		<span class="pxl-cart-meta">
			<?php if(!empty($settings['pxl_icon']['value'])) {
	            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
		    } else { ?>
		    	<i class="flaticon-grocery-store"></i>
		    <?php } ?>
	        <span class="pxl_cart_counter"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'savour' ), WC()->cart->cart_contents_count ); ?></span>
	    </span>
	    <span class="pxl-cart-text"><?php echo esc_html__('Cart', 'savour'); ?></span>
	</div>
<?php }
add_action( 'pxl_anchor_target', 'savour_hook_anchor_cart'); ?>