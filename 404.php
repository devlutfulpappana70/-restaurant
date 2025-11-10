<?php
/**
 * @package Case-Themes
 */
get_header(); ?>
<div class="container">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main">
                <div class="pxl-error-inner">
                    <div class="pxl-error-image1 slide-up-down"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404/img1.png'); ?>" /></div>
                    <div class="pxl-error-image2"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404/img2.png'); ?>" /></div>
                    <h3 class="pxl-error-title">
                        <?php echo esc_html__('Oops... It looks like you‘re lost !', 'savour'); ?>
                    </h3>
                    <div class="pxl-error-description"><?php echo esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'savour'); ?></div>
                    <a class="btn btn-default" href="<?php echo esc_url(home_url('/')); ?>">
                        <span><?php echo esc_html__('Go Back Home', 'savour'); ?></span>
                        <i class="flaticon-right-arrow3 pxl-sz-16 pxl-ml-10"></i>
                    </a>
                    <div class="pxl-error-shape">
                        <div class="pxl-item-shape1" data-parallax='{"y":-40}'><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404/shape1.png'); ?>" /></div>
                        <div class="pxl-item-shape2" data-parallax='{"y":-60}'><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404/shape2.png'); ?>" /></div>
                        <div class="pxl-item-shape3" data-parallax='{"y":-80}'><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404/shape3.png'); ?>" /></div>
                        <div class="pxl-item-shape4" data-parallax='{"y":-50}'><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/404/shape4.png'); ?>" /></div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
