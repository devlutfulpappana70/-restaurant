<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_shop_cart',
        'title' => esc_html__('Case Shop Cart', 'savour' ),
        'icon' => 'eicon-cart-medium',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'savour' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'cart_icon_color',
                            'label' => esc_html__('Icon Color', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button .pxl-cart-meta' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'cart_text_color',
                            'label' => esc_html__('Text Color', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button .pxl-cart-text' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    savour_get_class_widget_path()
);