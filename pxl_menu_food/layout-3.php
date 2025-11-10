<?php
if(isset($settings['menu_food']) && !empty($settings['menu_food']) && count($settings['menu_food'])): ?>
    <div class="pxl-menu-food pxl-menu-food3">
        <?php foreach ($settings['menu_food'] as $key => $value):
            $image = isset($value['image']) ? $value['image'] : ''; 
            $title = isset($value['title']) ? $value['title'] : ''; 
            $desc = isset($value['desc']) ? $value['desc'] : ''; 
            $price = isset($value['price']) ? $value['price'] : ''; ?>
            <div class="pxl-menu--item pxl-item--flexnw <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php if(!empty($image['id'])) : ?>
                    <div class="pxl-item--image pxl-mr-38">
                        <?php $img_icon  = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => '288x244',
                            ) );
                            $thumbnail_icon    = $img_icon['thumbnail'];
                        echo pxl_print_html($thumbnail_icon); ?>
                    </div>  
                <?php endif; ?>
                <div class="pxl-item--holder pxl-item--flexnw">
                    <div class="pxl-item--meta pxl-pr-20">
                        <h4 class="pxl-item--title"><?php echo esc_attr($title); ?></h4>
                        <div class="pxl-item--star">
                            <i class="flaticon-star"></i>
                            <i class="flaticon-star"></i>
                            <i class="flaticon-star"></i>
                            <i class="flaticon-star"></i>
                            <i class="flaticon-star"></i>
                        </div>
                        <div class="pxl-item--description"><?php echo esc_attr($desc); ?></div>
                    </div>
                    <div class="pxl-item--price"><?php echo esc_attr($price); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
