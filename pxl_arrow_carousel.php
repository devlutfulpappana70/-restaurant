<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_arrow_carousel',
        'title' => esc_html__('Case Nav Carousel', 'savour'),
        'icon' => 'eicon-animation',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_alignment_section',
                    'label' => esc_html__('Content Alignment', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                            ],
                            'default' => 'style-1',
                        ),
                    ),
                ),
            ),
        ),
    ),
    savour_get_class_widget_path()
);