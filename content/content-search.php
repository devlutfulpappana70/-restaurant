<?php
/**
 * @package Case-Themes
 */
$archive_readmore_text = savour()->get_theme_opt('archive_readmore_text', esc_html__('Read More', 'savour'));
$featured_img_size = savour()->get_theme_opt('featured_img_size', '1200x672');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl---post pxl-item--archive pxl-item--standard'); ?>>
    <?php if (has_post_thumbnail()) {
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => get_post_thumbnail_id($post->ID),
            'thumb_size' => $featured_img_size,
        ) );
        $thumbnail    = $img['thumbnail'];
        echo '<div class="pxl-item--image">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>"><?php echo pxl_print_html($thumbnail); ?></a>
        <?php echo '</div>';
    } ?>
    <div class="pxl-item--holder">
        <?php savour()->blog->get_archive_meta(); ?>
        <h2 class="pxl-item--title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="caseicon-check-mark pxl-mr-4"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="pxl-item--excerpt">
            <?php
                savour()->blog->get_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>
        <div class="pxl-item--readmore">
            <a class="btn--readmore" href="<?php echo esc_url( get_permalink()); ?>">
                <span><?php if(get_post_type() === 'product') { echo esc_html__('View Product', 'savour'); } else { echo savour_html($archive_readmore_text); } ?></span>
                <i class="flaticon-right-arrow pxl-ml-15 rtl-reverse"></i>
            </a>
        </div>
    </div>
</article>