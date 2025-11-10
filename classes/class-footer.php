<?php

if (!class_exists('Savour_Footer')) {

    class Savour_Footer
    {
        public function getFooter()
        {
            if(is_singular('elementor_library')) return;
            
            $footer_layout = (int)savour()->get_opt('footer_layout');
            
            if ($footer_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/footer/default');
            } else {
                $args = [
                    'footer_layout' => $footer_layout
                ];
                get_template_part( 'template-parts/footer/elementor','', $args );
            } 

            // Back To Top
            $back_totop_on = savour()->get_theme_opt('back_totop_on', true);
            $back_top_top_style = savour()->get_opt('back_top_top_style', 'style-default');
            if (isset($back_totop_on) && $back_totop_on) : ?>
                <a class="pxl-scroll-top <?php echo esc_attr($back_top_top_style); ?>" href="#"><i class="flaticon-right-arrow"></i></a>
            <?php endif;

            // Mouse Move Animation
            savour_mouse_move_animation();

            // Cookie Policy
            savour_cookie_policy();

            // Subscribe Popup
            savour_subscribe_popup();

            // Page Popup
            savour_page_popup();
            
        }
 
    }
}
 