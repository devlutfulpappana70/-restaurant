<?php 
    global $product;
?>
<div class="pxl-product-cart1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if (class_exists('WPCleverWoosw')) { ?>
            <div class="woocommerce-wishlist">
                <?php echo do_shortcode('[woosw id="'.esc_attr( $settings['product_id'] ).'"]'); ?>
            </div>
        <?php } ?>
        <?php if(!empty($settings['image']['id'])) : 
            if ( ! empty( $settings['product_details']['url'] ) ) {
                $widget->add_render_attribute( 'product_details', 'href', $settings['product_details']['url'] );

                if ( $settings['product_details']['is_external'] ) {
                    $widget->add_render_attribute( 'product_details', 'target', '_blank' );
                }

                if ( $settings['product_details']['nofollow'] ) {
                    $widget->add_render_attribute( 'product_details', 'rel', 'nofollow' );
                }
            } ?>
            <div class="pxl-item--image">
                <?php $img = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['image']['id'],
                    'thumb_size' => '100x100',
                ));
                $thumbnail = $img['thumbnail']; ?>
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'product_details' )); ?>><?php echo wp_kses_post($thumbnail); ?></a>
            </div>
        <?php endif; ?>
        <div class="pxl-item--holder">
            <div class="pxl-item--highlight pxl-child--middle"><i class="flaticon-crown pxl-mr-8"></i><?php echo pxl_print_html($settings['highlight']); ?></div>
            <h5 class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></h5>
            <div class="pxl-item--subtitle"><?php echo pxl_print_html($settings['sub_title']); ?></div>
            <div class="pxl-item--price"><?php echo pxl_print_html($settings['price']); ?></div>
            <?php if(!empty($settings['btn_text'])) : ?>
                <div class="pxl-item--add">
                    <a href="?add-to-cart=<?php echo esc_attr($settings['product_id']); ?>" class="pxl-child--middle product_type_simple add_to_cart_button ajax_add_to_cart" data-quantity="1" data-product_id="<?php echo esc_attr($settings['product_id']); ?>"><i class="flaticon-shopping-cart-alt pxl-mr-4"></i><?php echo esc_attr($settings['btn_text']); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>