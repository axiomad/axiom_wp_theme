
<header id="site-header" class="header sticky">
	
<div id="contact-header" class="header">
	<div class="col1">
		<a href="tel:317-975-2746" class="dashicons dashicons-phone" style="text-decoration: none; color: white;"></a> <b>Have additional questions?</b> Give us a call at 317.975.2746
	</div>
	<div class="col2">
		<?php if ( has_nav_menu( 'secondary' ) ) : ?>
			<nav id="contact-nav-menu" class="navigation contact-nav" role="navigation" aria-label="<?php esc_attr_e( 'Contact Nav Menu', 'AXIOM' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'secondary',
						'menu_class'      => 'contact-nav-wrapper',
						'container_class' => 'contact-nav-container',
						'items_wrap'      => '<ul id="contact-nav-list" class="%2$s">%3$s</ul>',
						'fallback_cb'     => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>
	</div>
</div>	
	
	
<div id="main-header" class="header">
<?php
	$getHeaderWidgets = wp_get_sidebars_widgets();
	$numHeaderWidgets = count($getHeaderWidgets);

	$headerWidgetNum = 1;
	
	for($i = 0; $i < $numHeaderWidgets; $i++){

		if( is_active_sidebar('header-widget-' . $headerWidgetNum )) {
			echo('<div id="Header-Widget-' . $headerWidgetNum . '" class="widget header-widget">');
			dynamic_sidebar( 'header-widget-' . $headerWidgetNum );
			echo('</div>');
			$headerWidgetNum++;
		}
	}


?>
</div>
	
</header>