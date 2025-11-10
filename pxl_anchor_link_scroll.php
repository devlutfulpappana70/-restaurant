<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_anchor_link_scroll',
        'title' => esc_html__('Asri Anchor Link Scroll', 'savour'),
        'icon' => 'eicon-anchor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'savour'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'anchor_text',
                            'label' => esc_html__('Text', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'anchor_id',
                            'label' => esc_html__('ID', 'savour'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                    ),
                ),
                savour_widget_animation_settings(),
            ),
        ),
    ),
    savour_get_class_widget_path()
);