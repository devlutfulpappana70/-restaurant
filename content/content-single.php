<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */
$post_tag = savour()->get_theme_opt( 'post_tag', true );
$post_navigation = savour()->get_theme_opt( 'post_navigation', false );
$post_social_share = savour()->get_theme_opt( 'post_social_share', false );
$tags_list = get_the_tag_list();
$sg_post_title = savour()->get_theme_opt('sg_post_title', 'default');
$sg_featured_img_size = savour()->get_theme_opt('sg_featured_img_size', '1200x672');
$post_author_info = savour()->get_theme_opt( 'post_author_info', false );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl---post'); ?>>
    <?php if (has_post_thumbnail()) {
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => get_post_thumbnail_id($post->ID),
            'thumb_size' => $sg_featured_img_size,
        ) );
        $thumbnail    = $img['thumbnail'];
        echo '<div class="pxl-item--image">'; ?>
            <?php echo pxl_print_html($thumbnail); ?>
        <?php echo '</div>';
    } ?>
    <div class="pxl-item--holder">
        <?php savour()->blog->get_post_metas(); ?>
        <?php if(is_singular('post') && $sg_post_title == 'custom_text') { ?>
            <h2 class="pxl-item--title">
                <?php the_title(); ?>
            </h2>
        <?php } ?>
        <div class="pxl-item--content clearfix">
            <?php
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>

    </div>

    <?php if($post_tag && $tags_list || $post_social_share ) :  ?>
        <div class="pxl--post-footer">
            <?php if($post_tag) { savour()->blog->get_tagged_in(); } ?>
            <?php if($post_social_share) { savour()->blog->get_socials_share(); } ?>
        </div>
    <?php endif; ?>
    <?php if($post_author_info) { savour()->blog->get_post_author_info(); } ?>
    <?php if($post_navigation) { savour()->blog->get_post_nav_small(); } ?>
</article><!-- #post -->