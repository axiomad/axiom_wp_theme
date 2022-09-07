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
	position: relative;
	float: right;
}

.blog-featured-image{
	position: relative;
}
.blog-featured-image img{
	box-shadow: 0 1px 10px rgb(0 0 0 / 50%);
}
.header-title{
/*
	font-size: 40px;
	line-height: 46px;
	border-left: 5px solid #a3cd39;
	padding: 0 30px 0 10px;
	color: white;
*/
}

/*
.latest-posts, .blog-categories{
	margin: 0 !important;
	padding: 0 0 0 20px !important;
}
.latest-posts li {
	list-style-type: circle;
	margin: 0 0 20px 0;
}

.latest-posts a{
	display: block;
	padding: 0 0 0 10px !important;
}
.blog-categories li{
	list-style-type: circle;
	padding: 2.5px 0;
	font-size: 16px !important;
}
.blog-categories a {
	padding: 0 0 0 10px !important;
}
#blog-sidebar h3 {
	margin: 20px 0 20px 0;
}
.fb-page{
	margin: 40px 0 0 0 !important; 
}
*/
</style>
<?php
	if (has_post_thumbnail() ) {
	// Display featured image above content
	echo '<div class="header-image">';
		the_post_thumbnail('header');
	echo '</div>';
	}
	else {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id('64'), 'header' );
		echo '<div class="header-image"><img src="'. $image[0] . '"></div>';
	}
?>
<div class="iats-bg-image iats-blue-bg">
	<h2 class="page-header has-text-align-center">IATS News and Updates</h2>
<div id="blog-post-container" class="blog-post">

<div class="header-title">
	<h2><?php the_title(); ?></h2>
</div>
<?php 
	if (have_posts()):
		echo '<article id="article" class="blog-article" role="article">';
			// Start the loop.
			while ( have_posts() ) : the_post();
				the_content();
			// End of the loop.
			endwhile;
		echo '</article>';
?>
<?php 
	if (is_active_sidebar ('blog-sidebar')) {
		echo '<aside id="blog-sidebar" class="sidebar right-sidebar">';
 		dynamic_sidebar('blog-sidebar');
		echo '</aside>';
	} 
?>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>
