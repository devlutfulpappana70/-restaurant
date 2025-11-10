<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$img_size = $widget->get_setting('img_size');
$show_author = $widget->get_setting('show_author');
$show_date = $widget->get_setting('show_date');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,  
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-post-carousel pxl-post-carousel1 pxl-blog-style1" <?php if($settings['drap'] !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'savour'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        $image_size = !empty($img_size) ? $img_size : '758x424';
                        foreach ($posts as $key => $post):
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        $author = get_user_by('id', $post->post_author); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                                    $img          = pxl_get_image_by_size( array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ) );
                                    $thumbnail    = $img['thumbnail'];
                                    ?>
                                    <div class="pxl-item--featured hover-imge-effect2">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                        <a class="pxl-item--link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl-item--holder">
                                    <div class="pxl-item--meta">
                                        <?php if($show_date == 'true'): ?>
                                            <div class="pxl-item--date">
                                                <div class="pxl-date--inner">
                                                    <span class="pxl-date--day"><?php echo get_the_date('dS', $post->ID); ?></span>
                                                    <span class="pxl-date--month"><?php echo get_the_date('F', $post->ID); ?></span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pxl-item--number"><?php if($key < 9) { echo '0'; } echo esc_attr($key+1); ?>.</div>
                                    </div>
                                    <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                                    <?php if($show_button == 'true') : ?>
                                        <div class="pxl-item--button">
                                            <a class="btn" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <span><?php if(!empty($button_text)) {
                                                    echo esc_attr($button_text);
                                                } else {
                                                    echo esc_html__('Read more', 'savour');
                                                } ?></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow-wrap">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style-1"><i class="flaticon-arrow-left-bold"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next style-1"><i class="flaticon-arrow-right-bold"></i></div>
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-pagination">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>