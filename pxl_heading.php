<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Case Heading', 'savour' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"] and Highlight text with shortcode: [highlight text="Text"]',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
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
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'savour' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'savour' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Bottom Spacer', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'h_title_style',
                            'label' => esc_html__('Style', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-box-shape' => 'Box Shape',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => savour_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'sub_title_style',
                                'label' => esc_html__('Style', 'savour' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'px-sub-title-default' => 'Default',
                                ],
                                'default' => 'px-sub-title-default',
                            ),
                            array(
                                'name' => 'sub_title_color',
                                'label' => esc_html__('Color', 'savour' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_typography',
                                'label' => esc_html__('Typography', 'savour' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle, {{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
                            ),

                            array(
                                'name' => 'sub_title_custom_ff',
                                'label' => esc_html__('Custom Font Family', 'savour' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    '' => 'Inherit',
                                    'ft-james-stroker' => 'James Stroker',
                                ],
                                'default' => '',
                            ),

                            array(
                                'name' => 'sub_title_space_top',
                                'label' => esc_html__('Top Spacer', 'savour' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_space_bottom',
                                'label' => esc_html__('Bottom Spacer', 'savour' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'pxl_animate_sub',
                                'label' => esc_html__('Case Animate', 'savour' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => savour_widget_animate(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'pxl_animate_delay_sub',
                                'label' => esc_html__('Animate Delay', 'savour' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '0',
                                'description' => 'Enter number. Default 0ms',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_highlight',
                    'label' => esc_html__('Highlight', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'highlight_color',
                                'label' => esc_html__('Color', 'savour' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'highlight_typography',
                                'label' => esc_html__('Typography', 'savour' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--highlight',
                            ),
                            array(
                                'name' => 'highlight_text_image',
                                'label' => esc_html__( 'Text Image', 'savour' ),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-image: url( {{URL}} );',
                                ],  
                            ),
                            array(
                                'name' => 'highlight_image_position',
                                'label' => esc_html__( 'Text Image Position', 'savour' ),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'options'      => array(
                                    ''              => esc_html__( 'Default', 'savour' ),
                                    'center center' => esc_html__( 'Center Center', 'savour' ),
                                    'center left'   => esc_html__( 'Center Left', 'savour' ),
                                    'center right'  => esc_html__( 'Center Right', 'savour' ),
                                    'top center'    => esc_html__( 'Top Center', 'savour' ),
                                    'top left'      => esc_html__( 'Top Left', 'savour' ),
                                    'top right'     => esc_html__( 'Top Right', 'savour' ),
                                    'bottom center' => esc_html__( 'Bottom Center', 'savour' ),
                                    'bottom left'   => esc_html__( 'Bottom Left', 'savour' ),
                                    'bottom right'  => esc_html__( 'Bottom Right', 'savour' ),
                                    'initial'       =>  esc_html__( 'Custom', 'savour' ),
                                ),
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-position: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]        
                            ),
                            array(
                                'name' => 'highlight_image_size',
                                'label' => esc_html__( 'Text Image Size', 'savour' ),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'hide_in_inner' => true,
                                'options'      => array(
                                    ''              => esc_html__( 'Default', 'savour' ),
                                    'auto' => esc_html__( 'Auto', 'savour' ),
                                    'cover'   => esc_html__( 'Cover', 'savour' ),
                                    'contain'  => esc_html__( 'Contain', 'savour' ),
                                    'initial'    => esc_html__( 'Custom', 'savour' ),
                                ),
                                'default'      => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-size: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]        
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_typewriter',
                    'label' => esc_html__('Typewriter', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'typewriter_color',
                                'label' => esc_html__('Color', 'savour' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--typewriter' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'typewriter_typography',
                                'label' => esc_html__('Typography', 'savour' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--typewriter',
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    savour_get_class_widget_path()
);