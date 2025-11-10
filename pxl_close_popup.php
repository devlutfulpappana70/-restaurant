<?php
$templates_df = ['0' => esc_html__('None', 'savour')];
$templates = $templates_df + savour_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_close_popup',
        'title' => esc_html__('Case Close Popup', 'savour' ),
        'icon' => 'eicon-editor-close',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'savour' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'savour' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-close-popup:before, {{WRAPPER}} .pxl-close-popup:after' => 'background-color: {{VALUE}};',
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