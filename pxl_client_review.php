<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_client_review',
        'title' => esc_html__('Case Client Review', 'savour' ),
        'icon' => 'eicon-blockquote',
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
                            'type' => \Elementor\Controls_Manager::GALLERY,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'rating_number',
                            'label' => esc_html__('Rating Number', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'rating_label',
                            'label' => esc_html__('Rating Label', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'rating_star',
                            'label' => esc_html__('Rating Star', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'rating-1-star' => '1',
                                'rating-2-star' => '2',
                                'rating-3-star' => '3',
                                'rating-4-star' => '4',
                                'rating-5-star' => '5',
                            ],
                            'default' => 'rating-5-star',
                        ),
                        array(
                            'name' => 'rating_star_w',
                            'label' => esc_html__('Star Width', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 88,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client-review1 .pxl-item--star .star-solid' => 'width: {{SIZE}}{{UNIT}};',
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