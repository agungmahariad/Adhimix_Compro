/*!
 * JS Custom - Provis
 * Last Update : Jul 28, 2018
 */
	
// ---> Addon & Additional Bootstrap

	// Center modal
	function centerModals(){
	  $('.modal').each(function(i){
		var $clone = $(this).clone().css('display', 'block').appendTo('body');
		var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
		top = top > 0 ? top : 0;
		$clone.remove();
		$(this).find('.modal-content').css("margin-top", top);
	  });
	}
	$('.modal').on('show.bs.modal', centerModals);
	$(window).on('resize', centerModals);
	
	
// ---> Bootstrap Accordion Mobile
	$(document).ready(function(){
	  var windowWidth = $(window).width();
	  if(windowWidth <= 767) //for iPad & smaller devices
		 $('.panel-collapse').removeClass('in')
		 
	});
	

// ---> Form Label Float

	$('.float-form input').on('blur', function(){
	  if( !$(this).val() == "" ){
		$(this).next().addClass('stay');
	  } else {
		$(this).next().removeClass('stay');
	  }
	});

// ---> Simple Parallax

	$('.float-form input').on('blur', function(){
	  if( !$(this).val() == "" ){
		$(this).next().addClass('stay');
	  } else {
		$(this).next().removeClass('stay');
	  }
	});	


// ---> Swiper
	$(document).ready(function(){
	  var swiper = new Swiper('.main-slider', {
        pagination: {
          el: '.swiper-pagination',
          dynamicBullets: true,
        },
   	  });

   	  var swiper = new Swiper('.testimonial-slider', {
        pagination: {
          el: '.swiper-pagination',
          dynamicBullets: true,
        },
   	  });


      var swiper = new Swiper('.content-slider', {
        slidesPerView: 2,
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    });

	
// ---> Smooth anchor
	$(function() {
	  $('a.smooth[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1500);
			return false;
		  }
		}
	  });
	});

// ---> Shrink Header
	$(function(){
	 var shrinkHeader = 300;
	  $(window).scroll(function() {
	    var scroll = getCurrentScroll();
	      if ( scroll >= shrinkHeader ) {
	           $('header').addClass('shrink');
	        }
	        else {
	            $('header').removeClass('shrink');
	        }
	  });
	function getCurrentScroll() {
	    return window.pageYOffset || document.documentElement.scrollTop;
	    }
	});	



// ---> Fluid youtube By Chris Coyier & tweaked by Mathias Bynens

	// By Chris Coyier & tweaked by Mathias Bynens

	$(function() {
	
		// Find all YouTube videos
		var $allVideos = $("iframe[src^='http://www.youtube.com']"),
	
			// The element that is fluid width
			$fluidEl = $(".video-fluid-wrapper");
	
		// Figure out and save aspect ratio for each video
		$allVideos.each(function() {
	
			$(this)
				.data('aspectRatio', this.height / this.width)
				
				// and remove the hard coded width/height
				.removeAttr('height')
				.removeAttr('width');
	
		});
	
		// When the window is resized
		// (You'll probably want to debounce this)
		$(window).resize(function() {
	
			var newWidth = $fluidEl.width();
			
			// Resize all videos according to their own aspect ratio
			$allVideos.each(function() {
	
				var $el = $(this);
				$el
					.width(newWidth)
					.height(newWidth * $el.data('aspectRatio'));
	
			});
	
		// Kick off one resize to fix all videos on page load
		}).resize();
	
	});
	

