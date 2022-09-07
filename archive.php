<?php
/** *
 *
 * @package AXIOM\Templates
 * @author  AXIOM Web Development Team
 * @link    https://axiomad.com
 */


/**
 * Adds post page body class.
 *
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function add_body_classes ( $classes ) {

	$classes[] = 'blog-page';
	return $classes;

}
add_filter( 'body_class', 'add_body_classes' );

function wpse_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>'; 
    }

if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) : 

    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
    global $post;
    $raw_excerpt = $wpse_excerpt;
        if ( '' == $wpse_excerpt ) {

            $wpse_excerpt = get_the_content('');
            $wpse_excerpt = strip_shortcodes( $wpse_excerpt );
            $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
            $wpse_excerpt = str_replace(']]>', ']]&gt;', $wpse_excerpt);
            $wpse_excerpt = strip_tags($wpse_excerpt, wpse_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 50;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $wpse_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_word_count && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $wpse_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = '<a href="'. esc_url( get_permalink() ) . '"><strong>' . sprintf(__( 'Read More&raquo;', 'wpse' ), get_the_title()) . '</strong></a>'; 
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($wpse_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$wpse_excerpt = substr_replace($wpse_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                $wpse_excerpt .= $excerpt_end; /*Add read more in new paragraph */

            return $wpse_excerpt;   

        }
        return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt'); 

?>
<?php get_header(); ?>
<style>

article {
	position: relative;
	float: left;
	width: 63%;
	padding-right: 7%;
}
aside {
	position: relative;
/*	float: right;*/
	width: 30%;
}
#blog-post-container{
	overflow: auto;
	position: relative;
	padding: 2% 5%;
}
#blog-post-container p {
	line-height: 1.5;
	margin: 10px 0;
}
.right-sidebar{
	float: right;
}
.blog-latest-posts-header, .latest-posts{
	display: none;
}
	.post-title a{
		color: #2097d4;
	}
.post-title a:hover {
	color: black !important;
}
</style>
<?php
		$image = wp_get_attachment_image_src( get_post_thumbnail_id('64'), 'header' );
		echo '<div class="header-image"><img src="'. $image[0] . '"></div>';

?>
<div class="iats-bg-image iats-blue-bg">
	<h2 class="page-header has-text-align-center">IATS News and Updates</h2>
<div id="blog-post-container" class="blog-post">
<?php 
//	if (have_posts()):
		echo '<article id="article" class="blog-article" role="article">';
	
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$posts_query = new WP_Query(
array(
'post_type' => 'post',
'post_status' => 'publish',
'posts_per_page' => 99,
'paged' => $paged
) ); ?>
<div class="posts-section">
<?php if ( $posts_query->have_posts() ) { ?>
<div class="archived-posts">
<?php while ( $posts_query->have_posts() ) {
$posts_query->the_post(); ?>
<div class="archive-item">
<?php if ( has_post_thumbnail( get_the_ID() ) ) { ?>
<div class="post-thumbnail">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail('thumbnail'); ?>
</a>
</div>
<?php } ?>
<div class="post-title">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="post-excerpt">
<?php echo apply_filters( 'wpse_custom_wp_trim_excerpt', get_the_excerpt() ); ?>
</div>
</div>
<?php } ?>
</div>
<?php
$total_pages = $posts_query->max_num_pages;
if ( $total_pages > 1 ) {
$current_page = max( 1, get_query_var( 'paged' ) ); ?>
<div class="archive-pagination">
<?php echo paginate_links( array(
'base' => get_pagenum_link( 1 ) . '%_%',
'format' => 'page/%#%',
'current' => $current_page,
'total' => $total_pages
) ); ?>
</div>
<?php }
wp_reset_postdata();
} else { ?>
<div class="archived-posts"><?php echo esc_html__( 'No posts matching the query were found.', 'textdomain' ); ?></div>
<?php } ?>
</div>
	
<?php
//			// Start the loop.
//			while ( have_posts() ) : the_post();
//				the_content();
//				wp_reset_postdata();
//			// End of the loop.
//			endwhile;
		echo '</article>';
?>
<?php 
	if (is_active_sidebar ('blog-sidebar')) {
		echo '<aside id="blog-sidebar" class="sidebar right-sidebar">';
 		dynamic_sidebar('blog-sidebar');
		echo '</aside>';
	} 
?>
<?php //endif; ?>
</div>
</div>
<?php get_footer(); ?>
