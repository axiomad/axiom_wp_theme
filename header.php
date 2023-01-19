<script type="application/javascript">
function showMenu(){
	document.getElementById('mobile-navigation').classList.remove('animate-nav-menu-close');
	document.getElementById('mobile-navigation').classList.add('animate-nav-menu-open');
//		document.getElementById('hamburger').style.display = 'none';
}
function hideMenu(){
	document.getElementById('mobile-navigation').classList.remove('animate-nav-menu-open');
	document.getElementById('mobile-navigation').classList.add('animate-nav-menu-close');
//		document.getElementById('hamburger').style.display = 'flex';
}

// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('site-header').outerHeight();
	
$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
//	console.log(lastScrollTop);
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
//        $('#body').removeClass('nav-down').addClass('nav-up-main');
		$('#site-header').removeClass('nav-down').addClass('nav-up');
//		$('#site-header').removeClass('fade-in').addClass('fade-out');
//		$('#main').removeClass('nav-down').addClass('nav-up-main');
    } else {
        // Scroll Up
        if(st + $(window).height() > $(document).height()) {
//            $('#body').removeClass('nav-up-main').addClass('nav-down');
//			$('#site-header').removeClass('nav-up').addClass('nav-down');
//			$('#site-header').removeClass('fade-out').addClass('fade-in');
//			$('#main').removeClass('nav-up-main').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}

</script>
<header id="site-header" class="header nav-down">

<div id="sub-header" class="header">
	<div class="header-nav-menu">
<?php
	$getSubHeaderWidgets = wp_get_sidebars_widgets();
	$numSubHeaderWidgets = count($getSubHeaderWidgets);

	$SubHeaderWidgetsNum = 1;
	
	for($i = 0; $i < $numSubHeaderWidgets; $i++){

		if( is_active_sidebar('sub-header-widget-' . $SubHeaderWidgetsNum )) {
			echo('<div id="sub-header-widget-' . $SubHeaderWidgetsNum . '" class="widget header-widget">');
			dynamic_sidebar( 'sub-header-widget-' . $SubHeaderWidgetsNum );
			echo('</div>');
			$SubHeaderWidgetsNum++;
		}
	}
?>
</div>

</div>
	
<div id="main-header" class="header">
<?php
	$getHeaderWidgets = wp_get_sidebars_widgets();
	$numHeaderWidgets = count($getHeaderWidgets);

	$headerWidgetNum = 1;
	
	for($i = 0; $i < $numHeaderWidgets; $i++){

		if( is_active_sidebar('header-widget-' . $headerWidgetNum )) {
			echo('<div id="header-widget-' . $headerWidgetNum . '" class="widget header-widget">');
			dynamic_sidebar( 'header-widget-' . $headerWidgetNum );
			echo('</div>');
			$headerWidgetNum++;
		}
	}


?>
</div>
<div id="mobile-menu" class="mobile-navigation-container">
		<div id="hamburger" class="hamburger" onClick="showMenu();">
			<span class="hamburger-icon"></span>
			<span class="hamburger-icon"></span>
			<span class="hamburger-icon"></span>
		</div>
		<div id= "mobile-navigation" class="mobile-navigation">
			<div id="close" class="close" onClick="hideMenu();">X</div>
				<?php
					wp_nav_menu( array(
						'menu' => 'Mobile Menu'
					) );
				?>
			</div>
		</div>
</div>
</header>
