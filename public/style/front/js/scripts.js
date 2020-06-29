
function scroll_to(clicked_link, nav_height) {
	var element_class = clicked_link.attr('href').replace('#', '.');
	var scroll_to = 0;
	if(element_class != '.top-content') {
		element_class += '-container';
		scroll_to = $(element_class).offset().top - nav_height;
	}
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}


jQuery(document).ready(function() {

	/*
	    Navigation
	*/
	$('a.scroll-link').on('click', function(e) {
		e.preventDefault();
		scroll_to($(this), $('nav').outerHeight());
	});

    /*
        Background
    */
    $('.section-4-container').backstretch("assets/img/backgrounds/bg.jpg");

    /*
	    Wow
	*/
	new WOW().init();

	/*
	    Carousel
	*/
	$('#carousel-example').on('slide.bs.carousel', function (e) {

	    /*
	        CC 2.0 License Iatek LLC 2018
	        Attribution required
	    */
	    var $e = $(e.relatedTarget);
	    var idx = $e.index();
	    var itemsPerSlide = 5;
	    var totalItems = $('.carousel-item').length;

	    if (idx >= totalItems-(itemsPerSlide-1)) {
	        var it = itemsPerSlide - (totalItems - idx);
	        for (var i=0; i<it; i++) {
	            // append slides to end
	            if (e.direction=="left") {
	                $('.carousel-item').eq(i).appendTo('.carousel-inner');
	            }
	            else {
	                $('.carousel-item').eq(0).appendTo('.carousel-inner');
	            }
	        }
	    }
	});

});

(function(){
    /**
     * jQuery
     */
    /* Variables */
    /*var icon = $('.icon');
    var products = $('.products');*/


    /* Do Something */
    /*$(icon).click(function(){
      if($(this).hasClass('active')) return;
      $(products).toggleClass('list').toggleClass('grid');
      $(icon).toggleClass('active');
    });*/


    /**
     * Vanilla JS
     */
    /* Variables */
    var icon = document.getElementsByClassName('icon');
    var products = document.getElementsByClassName('products');

    /* Functions */
    // Has class
    function hasClass(elem, className) {
      return elem.classList.contains(className);
    }

    /* Do stuff */
    // For each icon
    for (var i = 0, len = icon.length; i < len; i++) {
      // On click of icon
      icon[i].addEventListener('click', function() {
        // If clicked icon has 'active' class
        if (hasClass(this, 'active')) {
          // Do nothing
          return;
        // If clicked icon doesn't have 'active' class
        } else {
          // For each icon
          for (var j = 0, len = icon.length; j < len; j++) {
            // Toggle the 'active' class
            icon[j].classList.toggle('active');
          }
          // Toggle the 'list' and 'grid' classes
          products[0].classList.toggle('list');
          products[0].classList.toggle('grid');

        }

      });

    }
  })();
