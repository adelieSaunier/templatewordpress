<?php

/**
 * Single Video Page.
 *
 * @link    https://plugins360.com
 * @since   1.0.0
 *
 * @package All_In_One_Video_Gallery
 */
?>

<div class="aiovg aiovg-single-video">
    <!-- Player -->
    <?php echo the_aiovg_player( $attributes['id'] ); ?>

    <!-- Description -->
    <div class="aiovg-description"><?php echo $content; ?></div>

    <!-- Meta informations -->
    <div class="aiovg-meta">
        <?php
        $meta = array();					
        
        // Author & Date
        $user_meta = array();
        
        if ( $attributes['show_date'] ) {
            $user_meta[] = sprintf( esc_html__( 'on %s', 'all-in-one-video-gallery' ), get_the_date() );
        }
                
        if ( $attributes['show_user'] ) {
			$author_url  = aiovg_get_user_videos_page_url( $post->post_author );
            $user_meta[] = sprintf( '%s <a href="%s" class="aiovg-link-author">%s</a>', esc_html__( 'by', 'all-in-one-video-gallery' ), esc_url( $author_url ), esc_html( get_the_author() ) );				
        }
        
        if ( count( $user_meta ) ) {
            printf( '<div class="aiovg-user"><small>%s</small></div>', esc_html__( 'Posted', 'all-in-one-video-gallery' ) . ' ' . implode( ' ', $user_meta ) );
        }
        
        // Category(s)
        if ( $attributes['show_category'] && ! empty( $attributes['categories'] ) ) {
            $term_meta = array();
            foreach ( $attributes['categories'] as $category ) {
				$category_url = aiovg_get_category_page_url( $category );
                $term_meta[]  = sprintf( '<a class="aiovg-link-category" href="%s">%s</a>', esc_url( $category_url ), esc_html( $category->name ) );
            }
            printf( '<div class="aiovg-category"><span class="aiovg-icon-categories"></span> %s</div>', implode( ', ', $term_meta ) );
        }

        // Tag(s)
        if ( $attributes['show_tag'] && ! empty( $attributes['tags'] ) ) {
            $term_meta = array();
            foreach ( $attributes['tags'] as $tag ) {
				$tag_url     = aiovg_get_tag_page_url( $tag );
                $term_meta[] = sprintf( '<a class="aiovg-link-tag" href="%s">%s</a>', esc_url( $tag_url ), esc_html( $tag->name ) );
            }
            printf( '<div class="aiovg-tag"><span class="aiovg-icon-tags"></span> %s</div>', implode( ', ', $term_meta ) );
        }
        ?>  
        
        <!-- Views count -->
        <?php if ( $attributes['show_views'] ) : ?>
            <div class="aiovg-views aiovg-text-muted">
                <span class="aiovg-icon-views"></span>
                <?php
                $views_count = get_post_meta( get_the_ID(), 'views', true );
                printf( esc_html__( '%d views', 'all-in-one-video-gallery' ), $views_count );
                ?>
            </div>
        <?php endif; ?>        
    </div>    
    
    <!-- Socialshare buttons -->
    <?php the_aiovg_socialshare_buttons(); ?>
</div>

<?php
// Related videos
if ( $attributes['related'] ) {
	$atts = array();
	
	$atts[] = 'title="' . esc_html__( 'You may also like', 'all-in-one-video-gallery' ) . '"';
	
	if ( ! empty( $attributes['categories'] ) ) {
		$ids = array();
		foreach ( $attributes['categories'] as $category ) {
			$ids[] = $category->term_id;
		}
		$atts[] = 'category="' . implode( ',', $ids ) . '"';
    }
    
    if ( ! empty( $attributes['tags'] ) ) {
		$ids = array();
		foreach ( $attributes['tags'] as $tag ) {
			$ids[] = $tag->term_id;
		}
		$atts[] = 'tag="' . implode( ',', $ids ) . '"';
	}
    
    $atts[] = 'related="1"';
    $atts[] = 'exclude="' . (int) $attributes['id'] . '"';
    $atts[] = 'show_count="0"';
    $atts[] = 'columns="' . (int) $attributes['columns'] . '"';
    $atts[] = 'limit="' . (int) $attributes['limit'] . '"';
    $atts[] = 'orderby="' . sanitize_text_field( $attributes['orderby'] ) . '"';
    $atts[] = 'order="' . sanitize_text_field( $attributes['order'] ) . '"';
    $atts[] = 'show_pagination="' . (int) $attributes['show_pagination'] . '"';

	$related_videos = do_shortcode( '[aiovg_videos ' . implode( ' ', $atts ) . ']' );
		
	if ( $related_videos != aiovg_get_message( 'videos_empty' ) ) {
		echo $related_videos;
	} 
}