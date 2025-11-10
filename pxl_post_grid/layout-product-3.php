<?php
if(class_exists('Woocommerce')) {
    $html_id = pxl_get_element_id($settings);
    $tax = array();
    $select_post_by = $widget->get_setting('select_post_by', '');
    $source = $post_ids = [];
    if($select_post_by === 'post_selected'){
        $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
    }else{
        $source  = $widget->get_setting('source_'.$settings['post_type'], '');
    }
    $orderby = $widget->get_setting('orderby', 'date');
    $order = $widget->get_setting('order', 'desc');
    $limit = $widget->get_setting('limit', 6);
    extract(pxl_get_posts_of_grid(
        'product', 
        ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
        ['product_cat']
    ));
    $filter_default_title = $widget->get_setting('filter_default_title', 'All');
    $col_xl = 12 / intval($widget->get_setting('col_xl', 4));
    $col_lg = 12 / intval($widget->get_setting('col_lg', 4));
    $col_md = 12 / intval($widget->get_setting('col_md', 3));
    $col_sm = 12 / intval($widget->get_setting('col_sm', 2));
    $col_xs = 12 / intval($widget->get_setting('col_xs', 1));
    $grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

    $grid_class = 'pxl-grid-inner pxl-grid-masonry row';

    $filter = $widget->get_setting('filter', 'false');
    $filter_alignment = $widget->get_setting('filter_alignment', 'center');
    $pagination_type = $widget->get_setting('pagination_type', 'pagination');

    $post_type = $widget->get_setting('post_type','product');
    $layout = $widget->get_setting('layout_'.$post_type, 'product-1');

    $grid_masonry = $widget->get_setting('grid_masonry');
    $pxl_animate = $widget->get_setting('pxl_animate');

    $load_more = array(
        'post_type'       => $post_type,   
        'layout'          => $layout,
        'startPage'       => $paged,
        'maxPages'        => $max,
        'total'           => $total,
        'perpage'         => $limit,
        'nextLink'        => $next_link,
        'source'          => $source,
        'orderby'         => $orderby,
        'order'           => $order,
        'limit'           => $limit,
        'post_ids'        => $post_ids,
        'col_xl'          => $col_xl,
        'col_lg'          => $col_lg,
        'col_md'          => $col_md,
        'col_sm'          => $col_sm,
        'col_xs'          => $col_xs,
        'pagination_type' => $pagination_type,
        'grid_masonry'    => $grid_masonry,
        'pxl_animate'    => $pxl_animate,
    );
    
    ?>

    <div id="<?php echo esc_attr($html_id) ?>" class="pxl-grid pxl-product-grid pxl-product-grid-layout3" data-layout="masonry" data-start-page="<?php echo esc_attr($paged); ?>" data-max-pages="<?php echo esc_attr($max); ?>" data-total="<?php echo esc_attr($total); ?>" data-perpage="<?php echo esc_attr($limit); ?>" data-next-link="<?php echo esc_attr($next_link); ?>">

        <?php if ($select_post_by == 'term_selected' && $filter == "true"): ?>
            <div class="pxl-shop-toolbars" >
                <div class="pxl-toolbar-inner pxl-flex-middle">
                    <div class="pxl-filter-by">
                        <label class="pxl-mr-20"><?php echo esc_html__('Filter by', 'savour') ?></label>
                        <form class="pxl-js-filter-form" method="post">
                            <?php $term_ids = [];
                            foreach ($categories as $category){
                                $category_arr = explode('|', $category); 
                                $tax[] = $category_arr[1]; 
                                $term = get_term_by('slug',$category_arr[0], $category_arr[1]);  
                                $term_ids[] = $term->term_id;
                            }
                             
                            $cat_args = array(
                                'taxonomy'         => 'product_cat',
                                'show_option_none' => esc_html__( 'All Products', 'savour' ),
                                'option_none_value' => '*',
                                'orderby'          => 'name',
                                'echo'             => 1,
                                'include'          => $term_ids,
                                'value_field'       => 'slug',
                                'class'            => 'pxl-nice-select filter-product-cat',
                            );
                            wp_dropdown_categories($cat_args); ?>
                        </form>
                    </div>
                    <div class="pxl-sort-by">
                        <label class="pxl-mr-20"><?php echo esc_html__('Sort By', 'savour') ?></label>
                        <?php $catalog_orderby_options = apply_filters(
                                'woocommerce_catalog_orderby',
                                array(
                                    'popularity' => esc_html__( 'Best Selling', 'savour' ),
                                    'name' => esc_html__( 'Sort by name', 'savour' ),
                                    'rating'     => esc_html__( 'Sort by average rating', 'savour' ),
                                    'date'       => esc_html__( 'Sort by latest', 'savour' ),
                                    'price'      => esc_html__( 'Sort by price: low to high', 'savour' ),
                                    'price_desc' => esc_html__( 'Sort by price: high to low', 'savour' ),
                                )
                            );
                            $show_default_orderby = 'date'; 
                            $orderby = isset( $_POST['orderby'] ) ? wc_clean( wp_unslash( $_POST['orderby'] ) ) : $show_default_orderby;
                            if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
                                $orderby = current( array_keys( $catalog_orderby_options ) );
                            }
                        ?>
                        <form class="pxl-js-ordering-form" method="post">
                            <select class="pxl-nice-select orderby" name="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'savour' ); ?>">
                                <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                                    <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="paged" value="1" />
                            <?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
                        </form>
                    </div>
                    <div class="pxl-number-result">
                        <div class="pxl-result-count">
                            <?php printf( _nx( '<span>%d</span> Product', '<span>%d</span> Products', $total, 'in page result', 'savour' ), $total );?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="15">
            <div class="grid-sizer"></div>
            <?php $load_more['tax'] = $tax; savour_get_post_grid($posts, $load_more); ?>
        </div>
        <?php if ($pagination_type == 'pagination') { ?>
            <div class="pxl-grid-pagination" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
                <?php savour()->page->get_pagination($query, true); ?>
            </div>
        <?php } ?>
        <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
            <div class="pxl-load-more <?php echo esc_attr($settings['loadmore_style']); ?>" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>">
                <span class="btn <?php if($settings['loadmore_style'] == 'pxl-load-more-style2') echo 'btn-morden'; ?>">
                    <span class="pxl-loadmore-text"><?php echo esc_html__('Load More', 'savour') ?></span>
                    <span class="pxl-load-icon"></span>
                </span>
            </div>
        <?php } ?>
    </div>
<?php } ?>