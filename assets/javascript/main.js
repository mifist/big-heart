;
(function($) {
	/*
	 *  new_map
	 *
	 *  This function will render a Google Map onto the selected jQuery element
	 
	 */
	
	function new_map( $el ) {
		
		// var
		var $markers = $el.find('.marker');
		
		
		// vars
		var args = {
			zoom		: 17,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP
		};
		
		
		// create map
		var map = new google.maps.Map( $el[0], args);
		
		
		// add a markers reference
		map.markers = [];
		
		
		// add markers
		$markers.each(function(){
			
			add_marker( $(this), map );
			
		});
		
		
		// center map
		center_map( map );
		
		
		// return
		return map;
		
	}
	
	/*
	 *  add_marker
	 *
	 *  This function will add a marker to the selected Google Map
	 *
	 */
	
	function add_marker( $marker, map ) {
		
		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		
		// create marker
		var marker = new google.maps.Marker({
			position    : latlng,
			map         : map,
			icon: $marker.attr('data-marker-icon') //uncomment if you use custom marker
		});
		
		// add to array
		map.markers.push( marker );
		
		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});
			
			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {
				
				infowindow.open( map, marker );
				
			});
		}
		
	}
	
	/*
	 *  center_map
	 *
	 *  This function will center the map, showing all markers attached to this map
	 *
	 
	 */
	
	function center_map( map ) {
		
		// vars
		var bounds = new google.maps.LatLngBounds();
		
		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){
			
			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			
			bounds.extend( latlng );
			
		});
		
		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
			map.setCenter( bounds.getCenter() );
			map.setZoom( 17 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}
		
	}
	
	/*
	 *  document ready
	 *
	 *  This function will render each map when the document is ready (page has loaded)
	 *
	 */
// global var
	var map = null;
	// init Foundation
	$(document).foundation();
	// flex Video
	$( 'iframe[src*="youtube.com"]').wrap("<div class='flex-video widescreen'/>");
	$( 'iframe[src*="vimeo.com"]').wrap("<div class='flex-video widescreen vimeo'/>");

	$(document).ready(function() {
		//scroll to top and bottom
		/*	   $('a[href="#moveToTop"]').click(function() {
		 $("html, body").animate({ scrollTop: 0 }, 800 );
		 return false;
		 });*/
		
		// MAP
		$('.acf-map').each(function(){
			// create map
			map = new_map( $(this) );
		});
		// Маски ввода в формы
		$(".data").mask("99.99.9999");
		$(".tel").mask("+38 (099) 999 99 99");
		$(".cpf").mask("999.999.999-99");
		$(".cnpj").mask("99.999.999/9999-99");
		
		// Add fancybox to images
		var $img;
		if ($img = $('img[class*="wp-image"]')) {
			$img.parent('a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
				openEffect: 'elastic',
				closeEffect: 'elastic',
				helpers: {
					overlay: {
						locked: false,
						css : {
							'background' : 'rgba(2, 20, 38, 0.6)'
						}
						
					}
				}
			});
		}
		$('a[rel*="album"]').fancybox({
			helpers: {
				overlay: {
					locked: false
				}
			}
		});
		$(".menu-item-object-custom a").fancybox({
			openEffect: 'elastic',
			closeEffect: 'elastic',
			
			helpers: {
				overlay: {
					locked: false,
					css : {
						'background' : 'rgba(2, 20, 38, 0.6)'
					}
					
				}
			}
		});
		
	});
	
	var $footer = $('#footer-container'); // only search once
	
	$(window).bind('load resize orientationChange', function () {
		
		var pos = $footer.position(),
			height = ($(window).height() - pos.top) - ($footer.height() -1);
		
		if (height > 0) {
			$footer.css('margin-top', height);
		}
		
	});

})(jQuery);
