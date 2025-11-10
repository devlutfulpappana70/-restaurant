<?php

if (!class_exists('Savour_Blog')) {

    class Savour_Blog
    {

        public function get_archive_shape() {
            $content_archive1 = savour()->get_theme_opt( 'content_archive1' );
            $content_archive2 = savour()->get_theme_opt( 'content_archive2' );
            $content_archive3 = savour()->get_theme_opt( 'content_archive3' ); ?>
            <div class="pxl-blog-shape">
                <?php if(!empty($content_archive1['url'])) : ?><div class="pxl-blog-shape1 slide-right-to-left"><img src="<?php echo esc_url($content_archive1['url']); ?>" /></div><?php endif; ?>
                <?php if(!empty($content_archive2['url'])) : ?><div class="pxl-blog-shape2 slide-up-down"><img src="<?php echo esc_url($content_archive2['url']); ?>" /></div><?php endif; ?>
                <?php if(!empty($content_archive3['url'])) : ?><div class="pxl-blog-shape3 slide-up-down"><img src="<?php echo esc_url($content_archive3['url']); ?>" /></div><?php endif; ?>
            </div>
        <?php }

        public function get_archive_heading() {
            $blog_sub_title = savour()->get_theme_opt( 'blog_sub_title' );
            $blog_title = savour()->get_theme_opt( 'blog_title' );
            $blog_divider = savour()->get_theme_opt( 'blog_divider' );
            if ( !is_front_page() && is_home() ) { ?>
                <div class="pxl-blog-heading col-12">
                    <?php if(!empty($blog_sub_title)) : ?><div class="pxl-blog--subtitle"><?php echo esc_attr($blog_sub_title); ?></div><?php endif; ?>
                    <?php if(!empty($blog_title)) : ?><h3 class="pxl-blog--title"><?php echo esc_attr($blog_title); ?></h3><?php endif; ?>
                    <?php if(!empty($blog_divider['url'])) : ?><div class="pxl-blog-divider"><img src="<?php echo esc_url($blog_divider['url']); ?>" /></div><?php endif; ?>
                </div>
            <?php }
        }
        
        public function get_archive_meta() {
            $archive_author = savour()->get_theme_opt( 'archive_author', true );
            $archive_date = savour()->get_theme_opt( 'archive_date', true );
            if($archive_author || $archive_category || $archive_date) : ?>
                <div class="pxl-item--meta pxl-flex">
                    <?php if($archive_author) : ?>
                        <span class="pxl-item--author pxl-item--flexnw"><i class="flaticon-avatar color-primary pxl-mr-12"></i><?php echo esc_html__('By', 'savour'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
                    <?php endif; ?>
                    <div class="pxl-item--divider"></div>
                    <?php if($archive_date) : ?>
                        <span class="pxl-item--date pxl-item--flexnw"><i class="flaticon-calendar color-primary pxl-mr-12"></i><?php echo get_the_date(); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; 
        }

        public function get_post_metas(){
            $post_author = savour()->get_theme_opt( 'post_author', true );
            $post_date = savour()->get_theme_opt( 'post_date', true );
            if($post_author || $post_date) : ?>
                <div class="pxl-item--meta pxl-flex">
                    <?php if($post_author) : ?>
                        <span class="pxl-item--author pxl-item--flexnw"><i class="flaticon-avatar color-primary pxl-mr-12"></i><?php echo esc_html__('By', 'savour'); ?>&nbsp;<?php the_author_posts_link(); ?></span>
                    <?php endif; ?>
                    <div class="pxl-item--divider"></div>
                    <?php if($post_date) : ?>
                        <span class="pxl-item--date pxl-item--flexnw"><i class="flaticon-calendar color-primary pxl-mr-12"></i><?php echo get_the_date(); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; 
        }

        public function get_excerpt(){
            $archive_excerpt_length = savour()->get_theme_opt('archive_excerpt_length', '50');
            $savour_the_excerpt = get_the_excerpt();
            if(!empty($savour_the_excerpt)) {
                echo wp_trim_words( $savour_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }

        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = savour()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'savour' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'savour_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }

        public function savour_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_tagged_in(){
            $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Tags:', 'savour'). '</label>', ' ' );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = savour()->get_theme_opt( 'social_facebook', true );
            $social_twitter = savour()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = savour()->get_theme_opt( 'social_pinterest', true );
            $social_linkedin = savour()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                <label><?php echo esc_html__('Share:', 'savour'); ?></label>
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'savour'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><?php echo esc_attr__('facebook', 'savour'); ?></a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'savour'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><?php echo esc_attr__('twitter', 'savour'); ?></a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'savour'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><?php echo esc_attr__('pinterest', 'savour'); ?></a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'savour'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><?php echo esc_attr__('linkedIn', 'savour'); ?></a>
                <?php endif; ?>
            </div>
            <?php
        }

        public function get_socials_share_portfolio() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            ?>
            <div class="pxl--social">
                <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'savour'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'savour'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'savour'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'savour'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
            </div>
            <?php
        }

        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'savour-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="caseicon-double-chevron-left"></i><span><?php echo esc_html__('Previous Post', 'savour'); ?></span></a>
                                <div class="pxl--holder">
                                    <?php if(!empty($prev_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl--meta">
                                        <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                $next_img_id = get_post_thumbnail_id($next_post->ID);
                                $next_img_url = wp_get_attachment_image_src($next_img_id, 'savour-thumb-xs');
                                ?>
                                <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><span><?php echo esc_html__('Next Post', 'savour'); ?></span><i class="caseicon-double-chevron-right"></i></a>
                                <div class="pxl--holder">
                                    <div class="pxl--meta">
                                        <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                    </div>
                                    <?php if(!empty($next_img_id)) : ?>
                                        <div class="pxl--img">
                                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" /></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
            <?php }
        }

        public function get_post_nav_small() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-post--navigation pxl-flex">
                    <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                        <div class="pxl--item pxl--item-prev">
                            <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="flaticon-left-arrow pxl-mr-16"></i><span><?php echo esc_html__('Previous Post', 'savour'); ?></span></a>
                        </div>
                    <?php } ?>
                    <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                        <div class="pxl--item pxl--item-next">
                            <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><span><?php echo esc_html__('Next Post', 'savour'); ?></span><i class="flaticon-right-arrow pxl-ml-16"></i></a>
                        </div>
                    <?php } ?>
                </div>
            <?php }
        }

        public function get_post_author_info() { ?>
            <div class="pxl-post--author-info pxl-item--flexnw">
                <div class="pxl-post--author-image pxl-mr-30"><?php echo get_avatar( get_the_author_meta( 'ID' ), 280 ); ?></div>
                <div class="pxl-post--author-meta">
                    <?php savour_get_user_name(); ?>
                    <div class="pxl-post--author-description"><?php the_author_meta( 'description' ); ?></div>
                    <?php savour_get_user_social(); ?>
                </div>
            </div>
        <?php }

        public function get_related_post(){
            $post_related_on = savour()->get_theme_opt( 'post_related_on', false );

            if($post_related_on) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1', 
                        'slide_mode'                    => 'slide', 
                        'slides_to_show'                => 3, 
                        'slides_to_show_lg'             => 3, 
                        'slides_to_show_md'             => 2, 
                        'slides_to_show_sm'             => 2, 
                        'slides_to_show_xs'             => 1, 
                        'slides_to_scroll'              => 1, 
                        'slides_gutter'                 => 30, 
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'savour'); ?></h4>
                        <div class="class" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                            <?php foreach ($query_similar->posts as $post):
                                $thumbnail_url = '';
                                if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pxl-blog-small', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <h3 class="item-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            wp_reset_postdata();
        }
    }
}
