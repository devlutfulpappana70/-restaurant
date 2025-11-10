<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'img_size' => '',
    'img_size_popup' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$pxl_col_xl_tmp = $col_xl;
$pxl_col_lg_tmp = $col_lg;

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($img_size) ? $img_size : '600x414';
$image_size_popup = !empty($img_size_popup) ? $img_size_popup : '800x800';

?>
<?php if(isset($settings['gallery']) && !empty($settings['gallery']) && count($settings['gallery'])): ?>
    <div class="pxl-grid pxl-gallery-grid1">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['gallery'] as $key => $value):
                $title = isset($value['title']) ? $value['title'] : '';
                $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                if(!empty($image['id'])) :
                    if($key == '1' ) {
                        $image_size = '600x311';
                    }
                    if($key == '2' ) {
                        $image_size = '600x624';
                    }
                    if($key == '3' ) {
                        $image_size = '600x666';
                    }
                    if($key == '4' ) {
                        $image_size = '600x563';
                    }
                    if($key == '5' ) {
                        $image_size = '600x352';
                    }
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => $image_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail']; 

                    $img_popup = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => $image_size_popup,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail_popup = $img_popup['url']; ?>
                    <div class="<?php echo esc_attr($item_class); ?>">
                        <div class="pxl-item--inner">
                            <div class="pxl-item--featured hover-imge-effect2">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                            <div class="pxl-item--meta">
                                <h5 class="pxl-item--title"><?php echo esc_attr($title); ?></h5>
                                <div class="pxl-item--subtitle"><?php echo esc_attr($sub_title); ?></div>
                            </div>
                            <a href="<?php echo esc_url($thumbnail_popup); ?>" class="pxl-item--link"></a>
                       </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
