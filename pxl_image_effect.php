<?php
// Register Image Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_effect',
        'title' => esc_html__('Case Image Effect', 'savour' ),
        'icon' => 'eicon-image-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'images',
                            'label' => esc_html__('Images', 'savour'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'savour' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'item_link',
                                    'label' => esc_html__('Link', 'savour'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-effect-1' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'box_item_width',
                            'label' => esc_html__('Item Width', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-effect-1 .pxl-image--item' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'hover_effect',
                            'label' => esc_html__('Box Hover Effect', 'savour'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'None',
                                'hover-left' => 'Slide To Left',
                                'hover-right' => 'Slide To Right',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'effect_speed',
                            'label' => esc_html__('Effect Speed', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Enter number',
                            'condition' => [
                                'hover_effect' => ['hover-left', 'hover-right'],
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