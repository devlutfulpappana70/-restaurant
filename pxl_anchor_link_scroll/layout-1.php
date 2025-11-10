<?php if(!empty($settings['anchor_text'])) : $html_id = pxl_get_element_id($settings); ?>
    <div class="pxl-anchor-link-scroll <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-anchor-icon">
            <i class="flaticon-right-arrow-1"></i>
        </div>
        <div class="pxl-anchor-text">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.48 144.48">
                <path id="pxl-anchor-text-<?php echo esc_attr($html_id); ?>" d="M242.93,123A71.74,71.74,0,1,1,171.2,51.22,71.73,71.73,0,0,1,242.93,123Z" transform="translate(-98.96 -50.72)"></path>
                <text fill=""> 
                    <textPath href="#pxl-anchor-text-<?php echo esc_attr($html_id); ?>"><?php echo esc_attr($settings['anchor_text']); ?></textPath>
                </text>
            </svg>
            <div class="pxl-anchor-divider"></div>
        </div>
        <a href="<?php echo esc_attr($settings['anchor_id']); ?>"></a>
    </div>
<?php endif; ?>