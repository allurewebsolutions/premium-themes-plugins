/*  Table of Contents 
01. MENU ACTIVATION
02. FITVIDES RESPONSIVE VIDEOS 
03. MOBILE MENU
04. SCROLL TO TOP MENU JS 
05. PRELOADER JS
06. STICKY HEADER JS
07. SHOW/HIDE SEARCH & CART
*/

jQuery(document).ready(function($) {
	 'use strict';

/*
=============================================== 01. MENU ACTIVATION  ===============================================
*/
	 jQuery('.progression-studios-one-page-nav-off nav#site-navigation ul.sf-menu, #progression-header-top-left-container ul.sf-menu, #progression-header-top-right-container ul.sf-menu').superfish({
			 	popUpSelector: 'ul.sub-menu,.sf-mega', 	// within menu context
	 			delay:      	200,                	// one second delay on mouseout
	 			speed:      	0,               		// faster \ speed
		 		speedOut:    	200,             		// speed of the closing animation
				animation: 		{opacity: 'show'},		// animation out
				animationOut: 	{opacity: 'hide'},		// adnimation in
		 		cssArrows:     	true,              		// set to false
			 	autoArrows:  	true,                    // disable generation of arrow mark-up
		 		disableHI:      true,
	 });

/*
=============================================== 02. FITVIDES RESPONSIVE VIDEOS  ===============================================
*/
	 $("#content-pro").fitVids();

	 
/*
=============================================== 03. MOBILE MENU  ===============================================
*/
	 
   	$('ul.mobile-menu-pro').slimmenu({
   	    resizeWidth: '960',
   	    collapserTitle: 'Menu',
   	    easingEffect:'easeInOutQuint',
   	    animSpeed:350,
   	    indentChildren: false,
   		childrenIndenter: '- '
   	});
	
	
	$('.mobile-menu-icon-pro').on('click', function(e){
		e.preventDefault();
		$('#main-nav-mobile').slideToggle(350);
		$("#masthead-pro").toggleClass("active-mobile-icon-pro");
	});
	


/*
=============================================== 04. SCROLL TO TOP MENU JS  ===============================================
*/
  	// browser window scroll (in pixels) after which the "back to top" link is shown
	$('#pro-scroll-top').hide();
	
    $(window).scroll(function(){
		if ($(this).scrollTop() > 200) {
			$('#pro-scroll-top').fadeIn();
		} else {
			$('#pro-scroll-top').fadeOut();
		}
	 });

	 // Click event to scroll to top
     $('#pro-scroll-top').on('click', function(){
         $('html, body').animate({scrollTop : 0},800);
         return false;
     }); 
	 
	 var offset_scroll = 150;
 
	
	/* Scroll to link inside page */
	$('a.scroll-to-link').on('click', function(){
	  $('html, body').animate({
	    scrollTop: $( $.attr(this, 'href') ).offset_scroll().top - pro_top_offset
	  }, 400);
	  return false;
	});



/*
=============================================== 05. PRELOADER JS  ===============================================
*/
	(function($) {
		var didDone = false;
		    function done() {
		        if(!didDone) {
		            didDone = true;
					$("#page-loader-pro").addClass('finished-loading');
					$("#boxed-layout-pro").addClass('progression-preloader-completed');
		        }
		    }
		    var loaded = false;
		    var minDone = false;
		    //The minimum timeout.
		    setTimeout(function(){
		        minDone = true;
		        //If loaded, fire the done callback.
		        if(loaded)  {  done(); } }, 400);
		    //The maximum timeout.
		    setTimeout(function(){  done();   }, 2000);
		    //Bind the load listener.
		    $(window).load(function(){  loaded = true;
		        if(minDone) { done(); }
		    });
	})(jQuery);


/*
=============================================== 06. STICKY HEADER JS  ===============================================
*/	
	
	/* HEADER HEIGHT FOR SPACING OF ONE PAGE NAV AND STICKY HEADER */
	var pro_top_offset = $('header#masthead-pro').height();  // get height of fixed navbar
		
	var pro_very_top_bar_offset = $('#the-food-truck-progression-header-top').height();  // get height of fixed navbar
	

	$('#progression-sticky-header').scrollToFixed({ minWidth: 959 });
	

	$(window).resize(function() {
	   var width_progression = $(document).width();
	      if (width_progression > 959) {
				/* STICKY HEADER CLASS */
				$(window).on('load scroll resize orientationchange', function () {
					
				    var scroll = $(window).scrollTop();
				    if (scroll >=  pro_very_top_bar_offset + 1 ) {
				        $("#progression-sticky-header").addClass("progression-sticky-scrolled");
				    } else {
				        $("#progression-sticky-header").removeClass("progression-sticky-scrolled");
				    }
				});
			} else {
				
				$(window).on('load scroll resize orientationchange', function () {
				 	$("#progression-sticky-header").removeClass("progression-sticky-scrolled");
				});
				
			}
		
	}).resize();
	
	

/*
=============================================== 07. SHOW/HIDE SEARCH & CART  ===============================================
*/	
	var hidesearch = false;
	var hidecart = false;
	var clickOrTouch = (('ontouchend' in window)) ? 'touchend' : 'click';
	
 	$("#progression-studios-header-search-icon .progression-icon-search").on(clickOrTouch, function(e) {
		var clicks = $(this).data('clicks');
		  if (clicks) {
		     $("#progression-studios-header-search-icon").removeClass("active-search-icon-pro");
		     $("#progression-studios-header-search-icon").addClass("hide-search-icon-pro");
			 
		  } else {
		     $("#progression-studios-header-search-icon").addClass("active-search-icon-pro");
			  $("#progression-studios-header-search-icon").removeClass("hide-search-icon-pro");
		  }
		  $(this).data("clicks", !clicks);
 	});
	
	
    $("#progression-shopping-cart-toggle").hover(function(){
        if (hidecart) clearTimeout(hidecart);
		$("#progression-shopping-cart-toggle").addClass("activated-class").removeClass("hover-out-class");
    }, function() {
        hidecart = setTimeout(function() { 
			$("#progression-shopping-cart-toggle").removeClass("activated-class").addClass("hover-out-class");
		}, 100);
    });
	
	
	
});