<?php
 
add_action( 'pxl_post_metabox_register', 'savour_page_options_register' );
function savour_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'savour' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'savour' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						savour_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'savour' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
					    )
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'savour' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'savour' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        savour_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						savour_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'header_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Header Display', 'savour'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'savour'),
				                    'hide'  => esc_html__('Hide', 'savour'),
				                ),
				                'default'  => 'show',
				            ),
				            array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo', 'savour'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
					            'id'       => 'mobile_style',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Mobile Style', 'savour'),
					            'options'  => array(
					                'inherit'  => esc_html__('Inherit', 'savour'),
					                'light'  => esc_html__('Light', 'savour'),
					                'dark'  => esc_html__('Dark', 'savour'),
					            ),
					            'default'  => 'inherit',
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Custom Menu Desktop', 'savour' ),
				                'options'  => savour_get_nav_menu_slug(),
				                'default' => '',
				            ),
				            array(
				                'id'       => 'p_menu_mobile',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Custom Menu Mobile', 'savour' ),
				                'options'  => savour_get_nav_menu_slug(),
				                'default' => '',
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'savour'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'savour'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'savour'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'savour'),
				                ),
				                'default'  => '-1',
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'savour' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        savour_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'savour' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						savour_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'savour' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'savour' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        savour_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'footer_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Display', 'savour'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'savour'),
				                    'hide'  => esc_html__('Hide', 'savour'),
				                ),
				                'default'  => 'show',
				            ),
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'savour'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'savour'),
				                    'on' => esc_html__('On', 'savour'),
				                    'off' => esc_html__('Off', 'savour'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				                'id'       => 'back_top_top_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Back to Top Style', 'savour'),
				                'options'  => array(
				                    'style-default' => esc_html__('Default', 'savour'),
				                    'style-round' => esc_html__('Round', 'savour'),
				                ),
				                'default'  => 'style-default',
				            ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'savour' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id'          => 'body_bg_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Body Background Color', 'savour'),
					            'transparent' => false,
					            'default'     => ''
					        ),
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'savour'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					        array(
					            'id'          => 'gradient_color',
					            'type'        => 'color_gradient',
					            'title'       => esc_html__('Gradient Color', 'savour'),
					            'transparent' => false,
					            'default'  => array(
					                'from' => '',
					                'to'   => '', 
					            ),
					        ),
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'savour' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'savour'),
					        ),
					    )
				    )
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'savour' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'savour' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'portfolio_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'savour'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'portfolio_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon Font', 'savour'),
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'savour' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'savour' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'savour' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'savour'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							array(
					            'id'=> 'service_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'savour'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'savour'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'savour'),
					                'image'  => esc_html__('Image', 'savour'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'savour'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'savour'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'savour' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
				    )
				],
			]
		],

		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Options', 'savour' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'savour' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'product_ingredient',
					            'type' => 'textarea',
					            'title' => esc_html__('Ingredient', 'savour'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
						)
				    )
				],
			]
		],

		'pxl-template' => [ //post_type
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Options', 'savour' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'savour' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'savour'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'savour'), 
								'header'       => esc_html__('Header Desktop', 'savour'),
								'header-mobile'       => esc_html__('Header Mobile', 'savour'),
								'footer'       => esc_html__('Footer', 'savour'), 
								'mega-menu'    => esc_html__('Mega Menu', 'savour'), 
								'page-title'   => esc_html__('Page Title', 'savour'), 
								'tab' => esc_html__('Tab', 'savour'),
								'hidden-panel' => esc_html__('Hidden Panel', 'savour'),
								'popup' => esc_html__('Popup', 'savour'),
								'slider' => esc_html__('Slider', 'savour'),
								'bottom-product' => esc_html__('Product', 'savour'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'savour'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'savour'), 
								'px-header--transparent'       => esc_html__('Transparent', 'savour'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),

				        array(
							'id'    => 'header_mobile_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'savour'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'savour'), 
								'px-header--transparent'       => esc_html__('Transparent', 'savour'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header-mobile' ),
				        ),

				        array(
							'id'    => 'hidden_panel_position',
							'type'  => 'select',
							'title' => esc_html__('Hidden Panel Position', 'savour'),
				            'options' => [
				            	'top'       	   => esc_html__('Top', 'savour'),
				            	'right'       	   => esc_html__('Right', 'savour'),
				            ],
				            'default' => 'right',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_height',
				            'type'        => 'text',
				            'title'       => esc_html__('Hidden Panel Height', 'savour'),
				            'subtitle'       => esc_html__('Enter number.', 'savour'),
				            'transparent' => false,
				            'default'     => '',
				            'force_output' => true,
				            'required' => array( 0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_boxcolor',
				            'type'        => 'color',
				            'title'       => esc_html__('Box Color', 'savour'),
				            'transparent' => false,
				            'default'     => '',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 