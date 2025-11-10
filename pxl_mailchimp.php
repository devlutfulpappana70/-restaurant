<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_mailchimp',
        'title' => esc_html__('Case Mailchimp', 'savour'),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'savour'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-blur' => 'Blur',
                                'style-box' => 'Box',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'style' => ['style-box'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_email',
                    'label' => esc_html__('Email', 'savour'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'mail_typography',
                            'label' => esc_html__('Typography', 'savour' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-mailchimp [type="email"]',
                        ),
                        array(
                            'name' => 'email_color',
                            'label' => esc_html__('Color', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'email_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'savour' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-mailchimp [type="email"]'
                        ),
                        array(
                            'name' => 'email_padding',
                            'label' => esc_html__('Padding', 'savour' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'email_border_radius',
                            'label' => esc_html__('Border Radius', 'savour' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'savour'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'submit_typography',
                            'label' => esc_html__('Typography', 'savour' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-mailchimp [type="submit"]',
                        ),
                        array(
                            'name' => 'submit_color',
                            'label' => esc_html__('Color', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'submit_color_hover',
                            'label' => esc_html__('Color Hover', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'submit_bgcolor',
                            'label' => esc_html__('Background Color', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'background-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'submit_bgcolor_hover',
                            'label' => esc_html__('Background Color Hover', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]:hover' => 'background-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'submit_padding',
                            'label' => esc_html__('Padding', 'savour' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'submit_border_radius',
                            'label' => esc_html__('Border Radius', 'savour' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                savour_widget_animation_settings(),
            ),
        ),
    ),
    savour_get_class_widget_path()
);