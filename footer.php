<footer id="site-footer" class="footer">

<?php
	$getWidgets = wp_get_sidebars_widgets();
	$numWidgets = count($getWidgets);

	$widgetNum = 1;
	
//	echo "
//		<style>
//		.footer-widget {
//			width: " . number_format(100 / $numWidgets, 2) . "%;
//		}
//		</style>
//	";
	
	for($i = 0; $i < $numWidgets; $i++){

		if( is_active_sidebar('footer-widget-' . $widgetNum )) {
			echo('<div id="Footer-Widget-' . $widgetNum . '" class="widget footer-widget">');
			dynamic_sidebar( 'footer-widget-' . $widgetNum );
			echo('</div>');
			$widgetNum++;
		}
	}


?>
</footer>
<?php wp_footer(); ?>