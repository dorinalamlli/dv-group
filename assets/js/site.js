jQuery(document).ready(function( $ ){

/*
* config
*------------------------------*/
var screen = {
	'window_width'    : $(window).width(),  
	'window_height'   : $(window).height(), 
	'document_width'  : $(document).width(), 
	'document_height' : $(document).height()
};

var device = {
	'tablet_land' : 1024,  // landscape
	'tablet_port' : 768,  // portrait
	'smartphone'  : 600  // smartphone
};

var device = {
	'is_desktop'      : ( screen.window_width > device.tablet_land )  ? true : false,
	'is_tablet_land'  : ( screen.window_width <= device.tablet_land  && screen.window_width >= device.tablet_port ) ? true : false,
	'is_tablet_port'  : ( screen.window_width <= device.tablet_port && screen.window_width >= screen.smartphone ) ? true : false,
	'is_smartphone'   : ( screen.window_width < device.tablet_port) ? true : false
};

/*
* slick sliders
*------------------------------*/

$('.slideshow, .news-slideshow').slick({
	autoplay       : true,
	autoplaySpeed  : 4000,
	arrows         : false,
	dots           : true,
	infinite       : true,
	speed          : 300,
	slidesToShow   : 1,
	adaptiveHeight : false,
	fade		       : true,
	pauseOnHover   : true,
	pauseOnFocus   : true,
}).find('.item').fadeIn(500);



/*
* slick sliders clients
*------------------------------*/

$('.slide-partners').slick({
  autoplay       : true,
  infinite       : true,
  arrows         : false,
  dots           : false,
  speed          : 200,
  slidesToShow   : 5,
  slidesToScroll : 1,
  pauseOnHover   : true,
  pauseOnFocus   : true,
  responsive     : [ 
    {
      breakpoint: 1200 , settings: {slidesToShow : 2, slidesToScroll: 1, infinite: true } },
    {   breakpoint: 768  , settings: { slidesToShow: 1, slidesToScroll: 1 } },
    {   breakpoint: 480  , settings: { slidesToShow: 1, slidesToScroll: 1 } } 
  ]
});

$('.gallery-popup-product').slick({
  autoplay       : true,
  infinite       : true,
  arrows         : false,
  dots           : false,
  speed          : 200,
  slidesToShow   : 3,
  slidesToScroll : 1,
  pauseOnHover   : true,
  pauseOnFocus   : true,
  responsive     : [ 
    {
      breakpoint: 1200 , settings: {slidesToShow : 2, slidesToScroll: 1, infinite: true } },
    {   breakpoint: 768  , settings: { slidesToShow: 1, slidesToScroll: 1 } },
    {   breakpoint: 480  , settings: { slidesToShow: 1, slidesToScroll: 1 } } 
  ]
});


/**
* matchHeight
*------------------------------*/

$('.home-single-news').matchHeight();

if(device.is_desktop){

}

/**
* nicescroll
*------------------------------*/
//nicescroll();
function nicescroll(){
	if(!device.is_smartphone){
		$('.nicescroll').niceScroll({
			cursorcolor: '#fff',
			cursoropacitymin: 0.5,
			railpadding: { top: 10, right: 3, left: 3, bottom: 10 },
		});
	}
}

/**
* Enllax
*------------------------------*/
$(window).enllax();

/**
* Media Gallery
*------------------------------*/
$('.media-gallery').slick({
	dots: false,
	arrow: false,
	infinite: false,
	speed: 300,
	slidesToShow: 1,
	slidesToScroll: 1,
	adaptiveHeight: ( $('.main-content').length ) ? true : false,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				adaptiveHeight: true
			}
		},
	]
});

/**
* GMap
*------------------------------*/
map_init();
function map_init(){

	var mapdata = $('#gmap').attr( 'data-map' );

	if( typeof mapdata != 'undefined' ){
		
		mapdata = $.parseJSON( mapdata );

		var coords = {
			lat : parseFloat( mapdata.lat ),
			lng : parseFloat( mapdata.lng )
		};
		
		map = new google.maps.Map( document.getElementById( 'gmap' ), {
		 	center      : coords,
		 	zoom        : 15,
		 	mapTypeId   : 'roadmap',
		 	draggable   : true,
		 	scrollwheel : false,
		 	styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#cdcdcd"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#f1ad37"}]}]
		});
		
		var infowindow = new google.maps.InfoWindow();
	    var marker, i;

		var marker = new google.maps.Marker({
         	position : coords,
          	map      : map,
          	icon     : map_marker
        });

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
	        return function() {
	          	infowindow.setContent(mapdata.address);
	          	infowindow.open(map, marker);
	        }
      	})(marker, i));
	}
}

/*
* scroll_to
* scroll to target element
* @param $element (selector)
*------------------------------*/
function scroll_to(element){
	var top = (device.is_desktop) ? 54 : 0;
	 $('html, body').animate({
        scrollTop: $(element).offset().top - top
    }, 400);
}


/*
* magnific popup
*------------------------------*/
$('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1]
    },
    image: {
    	tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return item.el.attr('title') + '<small></small>';
        }
    }
});


});// document ready


(function($) {
  $.fn.countTo = function(options) {
    options = options || {};

    return $(this).each(function() {
      // set options for current element
      var settings = $.extend(
        {},
        $.fn.countTo.defaults,
        {
          from: $(this).data("from"),
          to: $(this).data("to"),
          speed: $(this).data("speed"),
          refreshInterval: $(this).data("refresh-interval"),
          decimals: $(this).data("decimals")
        },
        options
      );

      // how many times to update the value, and how much to increment the value on each update
      var loops = Math.ceil(settings.speed / settings.refreshInterval),
        increment = (settings.to - settings.from) / loops;

      // references & variables that will change with each update
      var self = this,
        $self = $(this),
        loopCount = 0,
        value = settings.from,
        data = $self.data("countTo") || {};

      $self.data("countTo", data);

      // if an existing interval can be found, clear it first
      if (data.interval) {
        clearInterval(data.interval);
      }
      data.interval = setInterval(updateTimer, settings.refreshInterval);

      // initialize the element with the starting value
      render(value);

      function updateTimer() {
        value += increment;
        loopCount++;

        render(value);

        if (typeof settings.onUpdate == "function") {
          settings.onUpdate.call(self, value);
        }

        if (loopCount >= loops) {
          // remove the interval
          $self.removeData("countTo");
          clearInterval(data.interval);
          value = settings.to;

          if (typeof settings.onComplete == "function") {
            settings.onComplete.call(self, value);
          }
        }
      }

      function render(value) {
        var formattedValue = settings.formatter.call(self, value, settings);
        $self.html(formattedValue);
      }
    });
  };

  $.fn.countTo.defaults = {
    from: 0, // the number the element should start at
    to: 0, // the number the element should end at
    speed: 1000, // how long it should take to count between the target numbers
    refreshInterval: 100, // how often the element should be updated
    decimals: 0, // the number of decimal places to show
    formatter: formatter, // handler for formatting the value before rendering
    onUpdate: null, // callback method for every time the element is updated
    onComplete: null // callback method for when the element finishes updating
  };

  function formatter(value, settings) {
    return value.toFixed(settings.decimals);
  }
})(jQuery);

jQuery(function($) {
  // custom formatting example
  $(".count-number").data("countToOptions", {
    formatter: function(value, options) {
      return value
        .toFixed(options.decimals)
        .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
    }
  });

  // start all the timers
  $(".timer").each(count);

  function count(options) {
    var $this = $(this);
    options = $.extend({}, options || {}, $this.data("countToOptions") || {});
    $this.countTo(options);
  }

  /**
  * APPLICATION FORM PLACEHOLDER
  *------------------------------*/

  $('.vfb-item').each(function(index,value){
    var label = $(this).find('label').text();
    $(this).find('input[type=text],input[type=email],textarea,input[type=tel],input[type=url]').attr('placeholder',label);

    if(!$(this).hasClass('vfb-item-radio') && !$(this).hasClass('vfb-item-checkbox'))
    $(this).find('label').remove();
  });


    // open video
  $('.openVideo').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });


  /*
* magnific popup
*------------------------------*/
$('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1]
    },
    image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
});


//gallery page ( gallery )
$('.open-gallery').click(function(){
    $.magnificPopup.open({
      items:$.parseJSON($(this).attr('data-gallery')),
      type: 'image',
       gallery: {
            enabled: true
          },
    }, 0);
});
  
});
