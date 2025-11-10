<?php if(!function_exists('savour_configs')){
    function savour_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'savour'), 
                    'value' => savour()->get_opt('primary_color', '#c2902d')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'savour'), 
                    'value' => savour()->get_opt('secondary_color', '#000')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'savour'), 
                    'value' => savour()->get_opt('third_color', '#704010')
                ],
                'dark'   => [
                    'title' => esc_html__('Dark', 'savour'), 
                    'value' => savour()->get_opt('dark_color', '#2D2D2D')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'savour'), 
                    'value' => savour()->get_page_opt('body_bg_color', '#fff')
                ]
            ],
            'link' => [
                'color' => savour()->get_opt('link_color', ['regular' => '#c2902d'])['regular'],
                'color-hover'   => savour()->get_opt('link_color', ['hover' => '#c2902d'])['hover'],
                'color-active'  => savour()->get_opt('link_color', ['active' => '#c2902d'])['active'],
            ],
            'gradient' => [
                'color-from' => savour()->get_opt('gradient_color', ['from' => '#c2902d'])['from'],
                'color-to' => savour()->get_opt('gradient_color', ['to' => '#e1b375'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('savour_inline_styles')) {
    function savour_inline_styles() {  
        
        $theme_colors      = savour_configs('theme_colors');
        $link_color        = savour_configs('link');
        $gradient_color    = savour_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  savour_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 