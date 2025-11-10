<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_banner_box',
        'title' => esc_html__('Case Banner Box', 'savour'),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'savour-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'savour' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'savour' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_banner_box/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'savour'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'banner_image',
                            'label' => esc_html__('Image', 'savour' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_position',
                            'label' => esc_html__('Image Position', 'savour' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'pos-left' => 'Left',
                                'pos-right' => 'Right',
                            ],
                            'default' => 'pos-left',
                        ),
                        array(
                            'name' => 'banner_divider',
                            'label' => esc_html__('Divider', 'savour' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'banner_title',
                            'label' => esc_html__('Title', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'banner_sub_title',
                            'label' => esc_html__('Sub Title', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'banner_desc',
                            'label' => esc_html__('Description', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'savour' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'savour' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'banner_number',
                            'label' => esc_html__('Number', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'banner_label',
                            'label' => esc_html__('Label', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                    ),
                ),

            ),
        ),
    ),
    savour_get_class_widget_path()
);