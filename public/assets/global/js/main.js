(function () {
	
	'use strict';

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	
	var burgerMenu = function() {

		$('body').on('click', '.js-jsnn-nav-toggle', function(event){
			var $this = $(this);


			if ( $('body').hasClass('overflow offcanvas') ) {
				$('body').removeClass('overflow offcanvas');
			} else {
				$('body').addClass('overflow offcanvas');
			}
			$this.toggleClass('active');
			event.preventDefault();

		});
	};
	
	  /* WOW Scroll Spy
    ========================================================*/
     var wow = new WOW({
      //disabled for mobile
        mobile: false
    });

    wow.init();
	

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};

	$('.slide-one-item-alt').owlCarousel({
	    center: false,
	    items: 1,
	    loop: true,
			stagePadding: 0,
	    margin: 0,
	    smartSpeed: 1000,
	    autoplay: true,
	    pauseOnHover: true,
	    onDragged: function(event) {
	    	console.log('event : ',event.relatedTarget['_drag']['direction'])
	    	if ( event.relatedTarget['_drag']['direction'] == 'left') {
	    		$('.slide-one-item-alt-text').trigger('next.owl.carousel');
	    	} else {
	    		$('.slide-one-item-alt-text').trigger('prev.owl.carousel');
	    	}
	    }
	  });
	  $('.slide-one-item-alt-text').owlCarousel({
	    center: false,
	    items: 1,
	    loop: true,
			stagePadding: 0,
	    margin: 0,
	    smartSpeed: 1000,
	    autoplay: true,
	    pauseOnHover: true,
	    onDragged: function(event) {
	    	console.log('event : ',event.relatedTarget['_drag']['direction'])
	    	if ( event.relatedTarget['_drag']['direction'] == 'left') {
	    		$('.slide-one-item-alt').trigger('next.owl.carousel');
	    	} else {
	    		$('.slide-one-item-alt').trigger('prev.owl.carousel');
	    	}
	    }
	  });

	  $('.custom-next').click(function(e) {
	  	e.preventDefault();
			$('.slide-one-item-alt').trigger('next.owl.carousel');
			$('.slide-one-item-alt-text').trigger('next.owl.carousel');
		});
		$('.custom-prev').click(function(e) {
			e.preventDefault();
		  $('.slide-one-item-alt').trigger('prev.owl.carousel');
		  $('.slide-one-item-alt-text').trigger('prev.owl.carousel');
		});


	

	// var counterWayPoint = function() {
	// 	if ($('#jsnn-counter').length > 0 ) {
	// 		$('#jsnn-counter').waypoint( function( direction ) {
										
	// 			if( direction === 'down' && !$(this.element).hasClass('animated') ) {
	// 				setTimeout( counter , 400);					
	// 				$(this.element).addClass('animated');
	// 			}
	// 		} , { offset: '90%' } );
	// 	}
	// };

	

	
	
	$(function(){
		
		counter();
		// counterWayPoint();
		
	});


}());


(function() {
  
  var autoUpdate = true,
      timeTrans = 4000;
  
	var cdSlider = document.querySelector('.cd-slider'),
		item = cdSlider.querySelectorAll("li"),
		nav = cdSlider.querySelector("nav");

	item[0].className = "current_slide";

	for (var i = 0, len = item.length; i < len; i++) {
		var color = item[i].getAttribute("data-color");
		item[i].style.backgroundColor=color;
	}

	// Detect IE
	// hide ripple effect on IE9
	var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE");
		if ( msie > 0 ) {
			var version = parseInt(ua.substring(msie+ 5, ua.indexOf(".", msie)));
			if (version === 9) { cdSlider.className = "cd-slider ie9";}
	}

	if (item.length <= 1) {
		nav.style.display = "none";
	}

	function prevSlide() {
		var currentSlide = cdSlider.querySelector("li.current_slide"),
			prevElement = currentSlide.previousElementSibling,
			prevSlide = ( prevElement !== null) ? prevElement : item[item.length-1],
			prevColor = prevSlide.getAttribute("data-color"),
			el = document.createElement('span');

		currentSlide.className = "";
		prevSlide.className = "current_slide";

		nav.children[0].appendChild(el);

		var size = ( cdSlider.clientWidth >= cdSlider.clientHeight ) ? cdSlider.clientWidth*2 : cdSlider.clientHeight*2,
		    ripple = nav.children[0].querySelector("span");

		ripple.style.height = size + 'px';
		ripple.style.width = size + 'px';
		ripple.style.backgroundColor = prevColor;

		ripple.addEventListener("webkitTransitionEnd", function() {
			if (this.parentNode) {
				this.parentNode.removeChild(this);
			}
		});

		ripple.addEventListener("transitionend", function() {
			if (this.parentNode) {
				this.parentNode.removeChild(this);
			}
		});

	}

	function nextSlide() {
		var currentSlide = cdSlider.querySelector("li.current_slide"),
			nextElement = currentSlide.nextElementSibling,
			nextSlide = ( nextElement !== null ) ? nextElement : item[0],
			nextColor = nextSlide.getAttribute("data-color"),
			el = document.createElement('span');

		currentSlide.className = "";
		nextSlide.className = "current_slide";

		nav.children[1].appendChild(el);

		var size = ( cdSlider.clientWidth >= cdSlider.clientHeight ) ? cdSlider.clientWidth*2 : cdSlider.clientHeight*2,
			  ripple = nav.children[1].querySelector("span");

		ripple.style.height = size + 'px';
		ripple.style.width = size + 'px';
		ripple.style.backgroundColor = nextColor;

		ripple.addEventListener("webkitTransitionEnd", function() {
			if (this.parentNode) {
				this.parentNode.removeChild(this);
			}
		});

		ripple.addEventListener("transitionend", function() {
			if (this.parentNode) {
				this.parentNode.removeChild(this);
			}
		});

	}

	updateNavColor();

	function updateNavColor () {
		var currentSlide = cdSlider.querySelector("li.current_slide");

		var nextColor = ( currentSlide.nextElementSibling !== null ) ? currentSlide.nextElementSibling.getAttribute("data-color") : item[0].getAttribute("data-color");
		var	prevColor = ( currentSlide.previousElementSibling !== null ) ? currentSlide.previousElementSibling.getAttribute("data-color") : item[item.length-1].getAttribute("data-color");

		if (item.length > 2) {
			nav.querySelector(".prev").style.backgroundColor = prevColor;
			nav.querySelector(".next").style.backgroundColor = nextColor;
		}
	}

	nav.querySelector(".next").addEventListener('click', function(event) {
		event.preventDefault();
		nextSlide();
		updateNavColor();
	});

	nav.querySelector(".prev").addEventListener("click", function(event) {
		event.preventDefault();
		prevSlide();
		updateNavColor();
	});
  
  //autoUpdate
  setInterval(function() {
    if (autoUpdate) {
      nextSlide();
      updateNavColor();
    };
	},timeTrans);

})();





