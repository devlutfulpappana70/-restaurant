<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_effect',
        'title' => esc_html__('Case Text Effect', 'savour' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'pxl-easing',
            'pxl-parallax-scroll',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'savour' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'savour' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'savour' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'savour' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'savour' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-effect' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__('Max Width', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-effect .pxl-text--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_style',
                            'label' => esc_html__('Text Style', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text-default' => 'Default',
                                'text-outline' => 'Outline',
                            ],
                            'default' => 'text-default',
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'savour' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-effect',
                        ),
                        array(
                            'name' => 'white_space',
                            'label' => esc_html__('White Space', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'white-space-normal' => 'Normal',
                                'white-space-nowrap' => 'NoWrap',
                            ],
                            'default' => 'white-space-normal',
                        ),
                        array(
                            'name' => 'text_effect',
                            'label' => esc_html__('Text Effect', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'None',
                                'pxl-scroll-parallax' => 'Scroll Parallax',
                                'pxl-slide-to-left' => 'Slide Right To Left',
                                'pxl-slide-to-right' => 'Slide Left To Right',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'effect_speed',
                            'label' => esc_html__('Effect Speed', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Default: 18000 - Unit: ms',
                            'condition' => [
                                'text_effect' => ['pxl-slide-to-left', 'pxl-slide-to-right'],
                            ],
                        ),
                        array(
                            'name' => 'scroll_parallax_type',
                            'label' => esc_html__('Scroll Parallax Type', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'y' => 'Effect Y',
                                'x' => 'Effect X',
                                'z' => 'Effect Z',
                            ],
                            'default' => 'y',
                            'condition' => [
                                'text_effect' => 'pxl-scroll-parallax',
                            ],
                        ),
                        array(
                            'name' => 'parallax_scroll_value',
                            'label' => esc_html__('Scroll Parallax Value', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '80',
                            'description' => esc_html__('Enter number.', 'savour' ),
                            'condition' => [
                                'text_effect' => 'pxl-scroll-parallax',
                            ],
                        ),
                    ),
                ),
                savour_widget_animation_settings(),
            ),
        ),
    ),
    savour_get_class_widget_path()
);