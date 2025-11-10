<?php
if(isset($settings['menu_food']) && !empty($settings['menu_food']) && count($settings['menu_food'])): ?>
    <div class="pxl-menu-food pxl-menu-food1 <?php echo esc_attr($settings['style_l1']); ?>">
        <?php foreach ($settings['menu_food'] as $key => $value):
            $image = isset($value['image']) ? $value['image'] : ''; 
            $title = isset($value['title']) ? $value['title'] : ''; 
            $desc = isset($value['desc']) ? $value['desc'] : ''; 
            $price = isset($value['price']) ? $value['price'] : ''; ?>
            <div class="pxl-menu--item pxl-item--flexnw <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php if(!empty($image['id'])) : ?>
                    <div class="pxl-item--image pxl-mr-20">
                        <?php $img_icon  = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => '184x184',
                            ) );
                            $thumbnail_icon    = $img_icon['thumbnail'];
                        echo pxl_print_html($thumbnail_icon); ?>
                    </div>  
                <?php endif; ?>
                <div class="pxl-item--holder">
                    <h5 class="pxl-item--title"><span><?php echo esc_attr($title); ?></span></h5>
                    <div class="pxl-item--bottom pxl-item--flexnw">
                        <div class="pxl-item--description pxl-pr-10"><?php echo esc_attr($desc); ?></div>
                        <div class="pxl-item--divider"></div>
                    </div>
                    <div class="pxl-item--price"><?php echo esc_attr($price); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
