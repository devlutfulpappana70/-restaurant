<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_open_table',
        'title' => esc_html__('Case OpenTable Form', 'savour' ),
        'icon' => 'eicon-code-highlight',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Layout', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                                'style-3' => 'Style 3',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'restaurant_name',
                            'label' => esc_html__('Restaurant Name', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'restaurant_id',
                            'label' => esc_html__('Restaurant ID', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                    ),
                ),
                savour_widget_animation_settings(),
            ),
        ),
    ),
    savour_get_class_widget_path()
);